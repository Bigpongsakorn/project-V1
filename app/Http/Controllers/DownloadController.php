<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data["user_status"] = $this->usertype();
        $data['data'] = Download::all();

        return view('download.index', $data);

        // $data = Download::all();
        // return view('download.index', compact(['data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page'] = '/dowload';
        $data['id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        $data["user_status"] = $this->usertype();
        $data['data'] = Download::all();
// dd($data);

        return view('download.create', $data);
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
        $download = new Download();

        $sizefile = $request->file('file_name')->getSize();

        // $request->validate([
        //     'file_name' => 'required|mimes:pdf,xlx,csv,docx|max:2048',
        // ]);

        $file = $request->file('file_name');

        $fileName = $file->getClientOriginalName();
        $request->file_name->move(public_path('upload/file'), $fileName);
        $download->file_name = $fileName;

        $table = [
            'file_name' => $download->file_name,
            'staff_id' => $request->staff_id,
            'file_size' => $sizefile,
            'created_at' => date('Y-m-d h:i:s'),
        ];

        // dd($table);

        Download::insert($table);
        return redirect('/download/detail');

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
        Download::find($id)->delete();
        return redirect('/download/detail');
    }

    //detail download
    public function detail()
    {
        $data['page'] = '/dowload';
        $data['data'] = Download::all();

        return view('/download/detail', $data);
    }

    // Fill
    public function fill()
    {
        return view('/download/fill');
    }

}
