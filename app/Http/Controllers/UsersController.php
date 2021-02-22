<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // แบบกำหนดสิทธ์การใช้งาน
        $data["admin_status"] = $this->admintype();
        $data['user'] = User::all();
        $data['page'] = '/user';
        // dd($data);
        return view('user.index', $data);

        // แบบเดิม
        // $data = User::all();
        // return view('user.index', compact(['data']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["admin_status"] = $this->admintype();
        $data['data'] = User::all();
        $data['page'] = '/user';
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        // dd($data);
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request); //แสดง Debug

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'staff_email' => 'required|email',
            'staff_fname' => 'required',
            'staff_lname' => 'required',
            'staff_tel' => 'required',
            'staff_type' => 'required',
            'staff_status' => 'required',
            'staff_gender' => 'required',
            'staff_position' => 'required',
            'staff_dob' => 'required',
            'staff_idcard' => 'required',
            'staff_title' => 'required',
            'staff_house_no' => 'required',
            'staff_village_no' => 'required',
            'staff_road' => 'required',
            'subdistrict_id' => 'required',
            // 'staff_pic' => 'required',

            'district' => 'required',
            'province' => 'required',
            'zip_code' => 'required',

        ]);

        // check error
        $data['username'] = DB::table('staffs')->where('username', $request->username)->first();
        $data['id'] = User::where('staff_idcard', $request->staff_idcard)->first();
        $data['email'] = User::where('staff_email', $request->staff_email)->first();

        if ($data['username'] != null) {
            return redirect()->back()->with('alert', 'ชื่อผู้ใช้งานซ้ำ!');
        } elseif ($data['id'] != null) {
            return redirect()->back()->with('alert', 'เลขบัตรประชาชนซ้ำ!');
        } elseif ($data['email'] != null) {
            return redirect()->back()->with('alert', 'ชื่ออีเมล์ซ้ำ!');
        } else {
            // password
            $request['password'] = Hash::make($request->password);
            User::create($request->all());

            return redirect('/user/index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
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
        // $data = User::find($id);
        $data["admin_status"] = $this->admintype();
        $data['data'] = User::find($id);

        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        // dd($data);
        $data['page'] = '/user';
        return view('user.edit', $data);
        // return view('user.edit', compact(['data']));
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
        // dd($request); //แสดง Debug
        $users = User::find($id);

        // OLD
        // $users->user_pic = $request->user_pic;
        // $users->username = $request->username;
        // $users->user_fname = $request->user_fname;
        // $users->user_lname = $request->user_lname;
        // $users->user_email = $request->user_email;
        // $users->user_gender = $request->user_gender;
        // $users->user_dobDATE = $request->user_dobDATE;
        // $users->user_idcard = $request->user_idcard;
        // $users->user_tel = $request->user_tel;
        // $users->soi = $request->soi;
        // $users->moo = $request->moo;
        // $users->road = $request->road;
        // $users->sub_district = $request->sub_district;
        // $users->district = $request->district;
        // $users->province = $request->province;
        // $users->user_type = $request->user_type;
        // $users->zip_code = $request->zip_code;
        // $users->user_prefix = $request->user_prefix;

        // NEW
        $users->staff_email = $request->staff_email;
        $users->staff_fname = $request->staff_fname;
        $users->staff_lname = $request->staff_lname;
        $users->staff_tel = $request->staff_tel;
        $users->staff_type = $request->staff_type;
        $users->staff_status = $request->staff_status;
        $users->staff_gender = $request->staff_gender;
        $users->staff_position = $request->staff_position;
        $users->staff_dob = $request->staff_dob;
        $users->staff_idcard = $request->staff_idcard;
        $users->staff_title = $request->staff_title;
        $users->staff_house_no = $request->staff_house_no;
        $users->staff_village_no = $request->staff_village_no;
        $users->staff_road = $request->staff_road;
        $users->subdistrict_id = $request->subdistrict_id;

        $users->district = $request->district;
        $users->province = $request->province;
        $users->zip_code = $request->zip_code;

        // dd($users);
        if ($request->hasfile('staff_pic')) { // ตรวจสอบว่ามีรูปเข้ามาหรือไม่

            $path = public_path() . '/upload/images/'; // ที่อยู่ ที่เซฟรูป

            //code for remove old file
            if ($users->staff_pic != '') {
                $file_old = $path . $users->staff_pic;
                unlink($file_old);
            }

            // upload new file
            $file = $request->file('staff_pic');
            $extension = $file->getClientOriginalExtension(); // ส่วนขยายรูปภาพ
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
            $users->staff_pic = $filename;
        }

        //  echo "name file =".$locationImage;
        // echo "$users->user_pic";
        // dd($users);
        // check error
        $data['id'] = User::where('staff_idcard', $users->staff_idcard)->where('staff_id', '!=', $id)->first();
        $data['email'] = User::where('staff_email', $users->staff_email)->where('staff_id', '!=', $id)->first();
// dd($data);
        if ($data['email'] != null) {
            return redirect()->back()->with('alert', 'ชื่ออีเมล์ซ้ำ!');
        } elseif ($data['id'] != null) {
            return redirect()->back()->with('alert', 'เลขบัตรประชาชนซ้ำ!');
        } else {
            $users->save();
            // User::find($id)->update($users->all());
            return redirect('/user/index');
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
        $data = User::FindOrFail($id); // ลบไฟล์
        if (file_exists('upload/images/' . $data->staff_pic) and !empty($data->staff_pic)) {
            unlink('upload/images/' . $data->staff_pic);
        }

        User::find($id)->delete();
        return redirect('/user/index');
    }

    // Route หาอำเภอ
    public function findcity(Request $request)
    {

        $id = $request->id;

        $data['data'] = District::where('province_id', $id)->get();

        // dd($data);

        return json_encode($data);

    }
    // Route หาตำบล
    public function findsubdis(Request $request)
    {

        $id = $request->id;

        $data['data'] = Subdistrict::where('district_id', $id)->get();

        // dd($data);

        return json_encode($data);

    }

    // edit profile
    public function editprofile($id)
    {
        $data['page'] = '/home';

        $data['data'] = User::find($id);
        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();

        return view('user.edit_profile', $data);
    }

    // update profile
    public function updateprofile(Request $request, $id)
    {
        // dd($request); //แสดง Debug
        $users = User::find($id);
        // old
        // $users->user_pic = $request->user_pic;
        // $users->username = $request->username;
        // $users->user_fname = $request->user_fname;
        // $users->user_lname = $request->user_lname;
        // $users->user_email = $request->user_email;
        // $users->user_gender = $request->user_gender;
        // $users->user_dobDATE = $request->user_dobDATE;
        // $users->user_idcard = $request->user_idcard;
        // $users->user_tel = $request->user_tel;
        // $users->soi = $request->soi;
        // $users->moo = $request->moo;
        // $users->road = $request->road;
        // $users->sub_district = $request->sub_district;
        // $users->district = $request->district;
        // $users->province = $request->province;
        // // $users->user_type = $request->user_type;
        // $users->zip_code = $request->zip_code;
        // $users->user_prefix = $request->user_prefix;

        // new
        $users->staff_email = $request->staff_email;
        $users->staff_fname = $request->staff_fname;
        $users->staff_lname = $request->staff_lname;
        $users->staff_tel = $request->staff_tel;
        $users->staff_status = $request->staff_status;
        $users->staff_gender = $request->staff_gender;
        $users->staff_position = $request->staff_position;
        $users->staff_dob = $request->staff_dob;
        $users->staff_idcard = $request->staff_idcard;
        $users->staff_title = $request->staff_title;
        $users->staff_house_no = $request->staff_house_no;
        $users->staff_village_no = $request->staff_village_no;
        $users->staff_road = $request->staff_road;
        $users->subdistrict_id = $request->subdistrict_id;

        $users->district = $request->district;
        $users->province = $request->province;
        $users->zip_code = $request->zip_code;

        if ($request->hasfile('staff_pic')) { // ตรวจสอบว่ามีรูปเข้ามาหรือไม่

            $path = public_path() . '/upload/images/'; // ที่อยู่ ที่เซฟรูป

            //code for remove old file
            if ($users->staff_pic != '') {
                $file_old = $path . $users->staff_pic;
                unlink($file_old);
            }

            // upload new file
            $file = $request->file('staff_pic');
            $extension = $file->getClientOriginalExtension(); // ส่วนขยายรูปภาพ
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
            $users->staff_pic = $filename;
        }

//  echo "name file =".$locationImage;
        // echo "$users->user_pic";
        // dd($users);
        // check error
        $data['id'] = User::where('staff_idcard', $users->staff_idcard)->where('staff_id', '!=', $id)->first();
        $data['email'] = User::where('staff_email', $users->staff_email)->where('staff_id', '!=', $id)->first();
// dd($data);
        if ($data['email'] != null) {
            return redirect()->back()->with('alert', 'ชื่ออีเมล์ซ้ำ!');
        } elseif ($data['id'] != null) {
            return redirect()->back()->with('alert', 'เลขบัตรประชาชนซ้ำ!');
        } else {
            $users->save();
// User::find($id)->update($users->all());
            return redirect('/home/index');
        }
    }

    // check profile
    public function checkprofile($id)
    {
        $data['page'] = '/user';
        // $data['user_id'] = Auth::user()->user_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        // $id = $data['user_id'];

        // $data['user'] = User::where('user_id', $id)->first();

        // $data['user'] = User::first();
        $data['user'] = User::find($id);

        $data['city'] = User::JOIN('provinces', 'staffs.province', 'provinces.province_id')
            ->JOIN('districts', 'staffs.district', 'districts.district_id')
            ->JOIN('subdistricts', 'staffs.subdistrict_id', 'subdistricts.subdistrict_id')->where('staff_id', $id)->first();

        // dd($data);
        return view('user.user_check', $data);
    }

}
