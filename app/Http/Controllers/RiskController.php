<?php

namespace App\Http\Controllers;

use App\Models\location_danger;
use App\Models\Risk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['risk'] = Risk::all();
        // $data['user'] = User::all();

        $data['risk'] = Risk::JOIN('staffs', 'risks.staff_id', 'staffs.staff_id')->get();
        $data['page'] = '/risk';
        // dd($data);
        return view('risk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['page'] = '/risk';
        // dd($data);
        return view('risk.create_risk', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['risk'] = Risk::find($id);
        $data['page'] = '/risk';
        // dd($data);
        return view('risk.edit_risk', $data);
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
        $table = [
            'risk_name' => $request->risk_name,
        ];

        Risk::find($id)->update($table);

        return redirect('/risk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Risk::find($id)->delete();
        return redirect('/risk');

    }

    public function insertrisk(Request $request)
    {
        // dd($request);
        $table = [
            'risk_name' => $request->risk_name,
            'staff_id' => $request->staff_id,
        ];
        // dd($table);
        
        Risk::create($table);

        return redirect('/risk');

    }

    // ------------------------------------------ Location Danger ------------------------------------------
    // หน้าแรก
    public function index_lo()
    {
        // $data['location'] = location_danger::all();
        $data['page'] = '/risk/index_locat';

// dd($data);
        return view('risk.index_locat', $data);
    }

    // เพิ่มข้อมูล
    public function create_locat()
    {
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data['page'] = '/risk/index_locat';
        // dd($data);
        return view('risk.create_locat', $data);
    }

    // insert ข้อมูลตำแหน่ง_d
    public function insertlocat(Request $request)
    {
        // dd($request);
        $table = [
            'location_name' => $request->location_name,
            'location_detail' => $request->location_detail,
            'risk_id' => $request->risk_id,
            'vaillage_id' => $request->vaillage,
            'staff_id' => $request->staff_id,
        ];
// dd($table);
        location_danger::create($table);

        return redirect('risk/index_locat');
    }

    // edit location_d
    public function editlocat($id)
    {

        $data['locat'] = location_danger::find($id);
        $data['page'] = '/risk/index_locat';
// dd($data);
        return view('risk.edit_locat', $data);

    }

    // update location_d
    public function updatelocat(Request $request, $id)
    {
        // dd($request);

        $table = [
            'location_name' => $request->location_name,
            'location_detail' => $request->location_detail,
        ];
// dd($table);
        location_danger::find($id)->update($table);

        return redirect('risk/index_locat');

    }

    // delete location_d
    public function deletelocat($id)
    {
        location_danger::find($id)->delete();
        return redirect('/risk/index_locat');

    }
}
