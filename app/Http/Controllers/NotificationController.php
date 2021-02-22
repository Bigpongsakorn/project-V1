<?php

namespace App\Http\Controllers;

use App\Models\Bell_Notify;
use App\Models\Bell_Notify_Next;
use App\Models\EmergencyForm;
use App\Models\Risk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['risk'] = Risk::all();
        // dd($data);
        return view('notification.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        try {

            $table = [
                'general_name' => $request->general_name,
                'ems_detail' => $request->ems_detail,
                'general_tel' => $request->general_tel,
                'created_at' => date('Y-m-d h:i:s'),
                'lon' => $request->lon,
                'lat' => $request->lat,
                'risk_id' => $request->risk_id,
            ];
// dd($table);
            $id = EmergencyForm::insertGetId($table);

// dd($id);

            $data = User::SELECT('staff_id')->WHERE('staff_type', '3')->get();
// dd($data);

            $request->ems_id = $id;
            $request->status = "0";

            foreach ($data as $key => $value) {
                print_r($value['staff_id']);

                $table2 = [
                    'status' => $request->status,
                    'ems_id' => $request->ems_id,
                    'staff_id' => $value['staff_id'],
                    'created_at' => date('Y-m-d h:i:s'),
                ];

                Bell_Notify::insert($table2);

// dd($table2);

            }

        } catch (\Throwable $th) {

            // dd($th);
            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ถูกต้อง!');

        }

        return redirect('/notification');
        // dd($table);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmergencyForm::find($id)->delete();
        return redirect('/notification/show_notifiy');
    }

    // show notifiy
    public function shownotifiy()
    {
        $data['page'] = '/notification';
        // $data['notifiy'] = EmergencyForm::all();
        // $data['notifiy'] = EmergencyForm::leftJOIN('risks','emergency_form.risk_id','risks.risk_id')->get();

        // $data['next'] = Bell_Notify_Next::JOIN('emergency_form','bell_notify_next.ems_id','emergency_form.ems_id')
        // ->get();
        $data['notifiy'] = Risk::rightJOIN('emergency_form', 'risks.risk_id', 'emergency_form.risk_id')->get();
        // dd($data);

        return view('notification.show_notifiy', $data);
    }

    // bell notify
    public function notify()
    {
        $data['staff_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $id = $data['staff_id'];
        $data['user'] = User::where('staff_id', $id)->first();

        $data['bell'] = Bell_Notify::leftJOIN('emergency_form', 'bell_notify.ems_id', 'emergency_form.ems_id')
            ->WHERE('bell_notify.staff_id', '=', $id)
            ->WHERE('bell_notify.status', '0')
            ->get();

        $data['bell2'] = Bell_Notify_Next::leftJOIN('emergency_form', 'bell_notify_next.ems_id', 'emergency_form.ems_id')
            ->WHERE('bell_notify_next.staff_id', '=', $id)
            ->WHERE('bell_notify_next.status', '0')
            ->get();
        // $data['bell'] = array_merge($data['bell1'],$data['bell2']);

        return json_encode($data);
    }
    // bell Next notify
    public function noyifynext()
    {
        // $data['staff_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // $id = $data['staff_id'];
        // $data['user'] = User::where('staff_id', $id)->first();

        // $data['bell2'] = Bell_Notify_Next::leftJOIN('emergency_form', 'bell_notify_next.ems_id', 'emergency_form.ems_id')
        //     ->WHERE('bell_notify_next.staff_id', '=', $id)
        //     ->WHERE('bell_notify_next.status', '0')
        //     ->get();
        // // dd($data);
        // return json_encode($data);
    }

    //detail notify
    public function detailnotify($id)
    {
        $data['page'] = '/notification';
        $data['staff_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['user'] = User::where('staff_id', $data['staff_id'])->first();
        $data['no'] = EmergencyForm::JOIN('risks', 'emergency_form.risk_id', 'risks.risk_id')->find($id);
        // dd($data);
        return view('notification.detail', $data);
    }

    //succeess
    public function success(Request $request, $id)
    {
        // dd($request);
        $table = [
            'confirm' => $request->confirm,
        ];
        // dd($table);
        EmergencyForm::where('ems_id', $id)->update($table);
        $table2 = [
            'status' => '1',
        ];
        // dd($table2);
        Bell_Notify::where('ems_id', $id)->update($table2);

        // เรียก table พนักงาน ที่เป็น type = 2 ออกมา
        $data = User::SELECT('staff_id')->WHERE('staff_type', '2')->get();
        $request->status = "0";
        foreach ($data as $key => $value) {
            print_r($value['staff_id']);
            $table = [
                'status' => $request->status,
                'ems_id' => $request->ems_id,
                'staff_id' => $value['staff_id'],
                'created_at' => date('Y-m-d h:i:s'),
            ];
            Bell_Notify_Next::insert($table);
        }

        return redirect('/notification/show_notifiy');
    }

    //next user
    public function nextuser(Request $request)
    {

        // dd($request);

    }

    //update notify
    public function unotify()
    {
        // $staff_id = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // // dd($id);
        // try {
        //     Bell_Notify::where('staff_id', $staff_id)
        //     // ->where('ems_id',$ems_id)
        //     ->update(['status' => '1']);
        //     $data['status'] = 1;
        // } catch (\Throwable $th) {
        //     $data['status'] = 0;
        //     $data['datail'] = $th;
        // }
        // // return json_encode($data);
    }
    // update next notify
    public function unoyifynext()
    {
        $id = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // dd("$id");
        try {
            Bell_Notify_Next::where('staff_id', $id)->update(['status' => '1']);
            $data['status'] = 1;
        } catch (\Throwable $th) {
            $data['status'] = 0;
            $data['datail'] = $th;
        }
        return json_encode($data);

    }
}
