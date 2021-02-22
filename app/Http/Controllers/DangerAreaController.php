<?php

namespace App\Http\Controllers;

use App\Models\DangerArea;
use App\Models\Risk;
use App\Models\Villages;
use Illuminate\Http\Request;

class DangerAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('danger_area.index');
    }

    public function index_area()
    {
        $data['page'] = '/danger_area/index_area';
        // $data['area'] = DangerArea::get();
        $data['area'] = DangerArea::JOIN('risks', 'area_danger.risk_id', 'risks.risk_id')
            ->JOIN('villages', 'area_danger.village_id', 'villages.village_id')->get();
        return view('danger_area.index_area', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page'] = '/danger_area/index_area';
        $data['risk'] = Risk::get();
        $data['vill'] = Villages::get();

        return view('danger_area.create', $data);
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
                'area_name' => $request->area_name,
                'area_detail' => $request->area_detail,
                'village_id' => $request->village_id,
                'risk_id' => $request->risk_id,
            ];
            // dd($table);
            DangerArea::insert($table);

        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ครบถ้วน!');

        }

        return redirect('/danger_area/index_area');

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
        $data['page'] = '/danger_area/index_area';
        $data['area'] = DangerArea::JOIN('risks', 'area_danger.risk_id', 'risks.risk_id')
            ->JOIN('villages', 'area_danger.village_id', 'villages.village_id')
            ->where('area_danger.area_id', $id)->first();
        $data['risk'] = Risk::get();
        $data['vill'] = Villages::get();

        // dd($data);
        return view('danger_area.edit_area', $data);

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
        try {
            $table = [
                'area_name' => $request->area_name,
                'area_detail' => $request->area_detail,
                'village_id' => $request->village_id,
                'risk_id' => $request->risk_id,
            ];
            DangerArea::where('area_id', $id)->update($table);
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'กรอกข้อมูลไม่ครบถ้วน!');
        }
        return redirect('/danger_area/index_area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DangerArea::find($id)->delete();
        return redirect('/danger_area/index_area');
    }
}
