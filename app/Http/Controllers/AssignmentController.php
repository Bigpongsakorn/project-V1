<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Leave;
use App\Models\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // แบบกำหนดสิทธ์การใช้งาน
        $data['page'] = '/assignment';
        $data["admin_status"] = $this->testuser();
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // $data['user'] = User::all();
        // $data['assign'] = Assignment::all();
        $data['assign'] = Assignment::groupBy('assign_group')
            ->select('assign_id', 'assign_name', 'assign_detail', 'staff_id', 'assign_date_start')->get();

        // dd($data);
        return view('assignment.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page'] = '/assignment';
        $data['user'] = User::all();
        // dd($data);

        return view('assignment.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if (strtotime($request->assign_date_start) <= strtotime($request->assign_date_end)) {
            $id = null;
            try {
                foreach ($request->staff_id as $key => $value) {
                    // $data = [
                    //     'assign_name' => $request->A,
                    //     'assign_detail' => $request->B,
                    //     'staff_id' => $value,
                    //     'created_at' => date('Y-m-d h:i'),
                    //     'assign_status' => $request->assign_status,
                    //     'assign_date_start' => $request->assign_date_start,
                    //     'assign_date_end' => $request->assign_date_end,
                    // ];
                    // dd($key);

                    if (!$key) {
                        $data = [
                            'assign_name' => $request->A,
                            'assign_detail' => $request->B,
                            'staff_id' => $value,
                            'created_at' => date('Y-m-d h:i'),
                            'assign_status' => $request->assign_status,
                            'assign_date_start' => $request->assign_date_start,
                            'assign_date_end' => $request->assign_date_end,
                        ];
                        Assignment::insertGetId($data);

                        $id = Assignment::orderby('assign_id', 'desc')->first();
                        $id = $id->assign_id;
                        Assignment::where('assign_id', $id)
                            ->update(['assign_group' => $id]);

                    } else {
                        $data = [
                            'assign_name' => $request->A,
                            'assign_detail' => $request->B,
                            'staff_id' => $value,
                            'created_at' => date('Y-m-d h:i'),
                            'assign_status' => $request->assign_status,
                            'assign_date_start' => $request->assign_date_start,
                            'assign_date_end' => $request->assign_date_end,
                            'assign_group' => $id,
                        ];
                        Assignment::insert($data);
                    }
                }
            } catch (\Throwable $th) {
                // echo "ERROR" . $th;
                // dd($th);
                return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ถูกต้อง!');
            }
            return redirect('/assignment');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page'] = '/assignment';
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['assign'] = Assignment::where('assign_id', $id)->first();
        // dd($data);

        return view('assignment.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page'] = '/assignment';
        $data['assign'] = Assignment::where('assign_id', $id)->first();

        $data['users'] = User::select('assignment.staff_id')
            ->JOIN('assignment', 'staffs.staff_id', 'assignment.staff_id')
            ->where('assign_group', $id)->get();

        $data['user'] = User::get();
        // dd($data);
        return view('assignment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        if (strtotime($request->assign_date_start) <= strtotime($request->assign_date_end)) {

            try {
                $ar = $request->staff_id; //นับจำนวน staff ที่โดนเรียก
                $data = [
                    'assign_name' => $request->assign_name,
                    'assign_detail' => $request->assign_detail,
                    'assign_status' => $request->assign_status,
                    'assign_date_start' => $request->assign_date_start,
                    'assign_date_end' => $request->assign_date_end,
                    // 'staff_id' => $request->staff_id,
                ];
                if ($request->staff_id) {
                    Assignment::where('assign_group', $id)->delete();
                    $idas = null;
                    foreach ($request->staff_id as $key => $value) {
                        $data['staff_id'] = $value;

                        if ($idas) {
                            Assignment::insert($data);
                        } else {
                            Assignment::insert($data);
                            $idas = Assignment::orderBy('assign_id', 'desc')->first();

                            $data['assign_group'] = $idas->assign_id;
                            $assign_id = $idas->assign_id;
                            Assignment::where('assign_id', $assign_id)->update(['assign_group' => $assign_id]);
                        }

                    }
                } else {
                    return redirect()->back()->with('alert', 'กรุณากรอกชื่อพนักงานอย่างน้อย 1 คน!');
                }

            } catch (\Throwable $th) {
                // echo "ERROR" . $th;
                // dd($th);
                return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ถูกต้อง!');
            }
            return redirect('/assignment');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assignment::where('assign_group', $id)->delete();
        return redirect('/assignment');
    }

    // show any someuser
    public function someuser()
    {
        $data['page'] = '/assignment';
        $data["admin_status"] = $this->testuser();
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $sf_id = $data['id'];
        $data['assign'] = Assignment::groupBy('assign_group')
            ->select('assign_id', 'assign_name', 'assign_detail', 'staff_id', 'assign_date_start')
            ->where('staff_id', $sf_id)
            ->get();
        // dd($data);
        return view('assignment.someuser', $data);

    }

    // index leave
    public function leave()
    {
        $data['page'] = '/leave';
        $data["admin_status"] = $this->admintype();
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $sf_id = $data['id'];
        $data['leav'] = Leave::leftJOIN('staffs', 'leave.staff_id', 'staffs.staff_id')
        ->where('leave.staff_id',$sf_id)
        ->get();

        // dd($data);
        return view('assignment.leave', $data);

    }

    // index admin leave
    public function leavead()
    {
        $data['page'] = '/leave';
        $data["admin_status"] = $this->admintype();
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['leav'] = Leave::leftJOIN('staffs', 'leave.staff_id', 'staffs.staff_id')
        ->get();
        return view('assignment.leave', $data);
    }

    // create leave
    public function createleave()
    {
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['page'] = '/leave';

        return view('assignment.create_leave', $data);
    }

    // create leave
    public function leave_create(Request $request)
    {
        // dd($request);
        if (strtotime($request->leave_date_start) <= strtotime($request->leave_date_end)) {
            $table = [
                'leave_name' => $request->leave_name,
                'leave_detail' => $request->leave_detail,
                'leave_type' => $request->leave_type,
                'leave_date_start' => $request->leave_date_start,
                'leave_date_end' => $request->leave_date_end,
                'staff_id' => $request->staff_id,
                'work_id' => $request->work_id,
                'leave_status' => $request->leave_status,
            ];
// dd($table);
            Leave::insert($table);
            return redirect('/assignment/leave');

        } else {
            return redirect()->back()->with('alert', 'กรอกข้อมูลวันที่ไม่ถูกต้อง!');
        }

    }

    // edit leave
    public function editleave($id)
    {

        $data['page'] = '/leave';
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['leave'] = Leave::first();
        // dd($data);
        return view('assignment.edit_leave', $data);

    }
    //update leave
    public function leaveupdate(Request $request, $id)
    {
        // dd($request);
        if (strtotime($request->leave_date_start) <= strtotime($request->leave_date_end)) {
            $table = [
                'leave_name' => $request->leave_name,
                'leave_detail' => $request->leave_detail,
                'leave_type' => $request->leave_type,
                'leave_date_start' => $request->leave_date_start,
                'leave_date_end' => $request->leave_date_end,
                'leave_status' => $request->leave_status,
            ];
            // dd($table);
            Leave::where('leave_id', $id)->update($table);
            return redirect('/assignment/leave');
        } else {
            return redirect()->back()->with('alert', 'กรอกข้อมูลวันที่ไม่ถูกต้อง!');

        }
    }
    //delete leave
    public function deleteleave($id)
    {
        Leave::where('leave_id', $id)->delete();
        return redirect('/assignment/leave');

    }

    // approve leave อนุมิตืวันลา
    public function approve(Request $request, $id)
    {
        // dd($request);
        $table = [
            'leave_status' => $request->leave_status,
            'leave_reason' => $request->leave_reason,
        ];
        // dd($table);
        Leave::where('leave_id', $id)->update($table);
        // dd($test);
        return redirect('/assignment/leavead');

    }

    // detail leacve
    public function deleave($id)
    {
        $data['page'] = '/leave';
        $data['leave'] = Leave::find($id);
        // dd($data);
        return view('assignment.detail_leave', $data);
    }

    // show schedule
    public function schedule()
    {
        $data['sche'] = Schedule::all();
        $data['page'] = '/schedule';
        return view('assignment.schedule', $data);
    }

    // show create schedule
    public function schedulecreate()
    {
        $data['page'] = '/schedule';

        return view('assignment.create_schedule', $data);
    }

    // add schedule
    public function schedule_create(Request $request)
    {
        // dd($request);

        $table = [
            'schedule_name' => $request->schedule_name,
            'schedule_detail' => $request->schedule_detail,
        ];

        Schedule::create($table);
        return redirect('/assignment/schedule');

    }

    public function detailAS($id)
    {

        $data['page'] = '/assignment';
        $data['assign'] = Assignment::JOIN('staffs', 'assignment.staff_id', 'staffs.staff_id')
            ->where('assignment.assign_group', $id)
            ->get();

        // dd($data);

        return view('assignment.detail_assing', $data);
    }

    // Work
    public function work()
    {
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['page'] = '/work';
        // เรียกงานมอบหมายทั้งหมด
        $data['tasks'] = Assignment::get();
        // เรียกงานตามพนักงาน
        $data['tasks'] = Assignment::JOIN('staffs', 'assignment.staff_id', 'staffs.staff_id')->where('staffs.staff_id', $data['id'])->get();
        // เรียกงานตามพนักงาน + JOIN Leave
        // $data['work'] = WorkSchedule::JOIN('assignment','work_schedules.assign_id','assignment.assign_id')
        // ->where('work_schedules.work_id', '1')->get();

        // dd($data);
        return view('/assignment.work', $data);

    }

}
