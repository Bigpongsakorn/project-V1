<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\General_form;
use App\Models\Bell_Notify;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $data['user'] = User::all();
        $data['page'] = '/home';
        $data["user_status"] = $this->usertype(); // เช็คว่ามีการ login อยู่หรือไม่
        $data['staff_id'] = Auth::user()->staff_id; // เก็บตัวแปล id ของผู้ใช้งานที่ Login อยู่
        
        $id = $data['staff_id'];
        $data['user'] = User::where('staff_id', $id)->first();


        $data['bell'] = Bell_Notify::leftJOIN('emergency_form', 'bell_notify.ems_id', 'emergency_form.ems_id')
            ->WHERE('bell_notify.staff_id','=', $id)
            ->get();

        // dd($data['bell']);
        // dd($data);

        $data['pro'] = Province::get();
        $data['dis'] = District::get();
        $data['sub'] = Subdistrict::get();
        // $data['city'] = Province::JOIN('districts','provinces.province_id','districts.province_id')
        // ->JOIN('subdistricts','districts.district_id','subdistricts.district_id')->where('user_id', $id)->first();
        $data['city'] = User::JOIN('provinces', 'staffs.province', 'provinces.province_id')
            ->JOIN('districts', 'staffs.district', 'districts.district_id')
            ->JOIN('subdistricts', 'staffs.subdistrict_id', 'subdistricts.subdistrict_id')->where('staff_id', $id)->first();

        // dd($data);
        if (auth()->user()->isAdmin()) {
            // return view('admin/dashboard');
            return view('home', $data);
        } else {
            return view('home', $data);
        }

    }

    public function welcome()
    {
        $type["usertype"] = $this->typeuser();
        $type['type'] = User::all();
        return view('index');
    }

    public function welcomeindex()
    {
        $data['news'] = Blog::orderBy('news_id', 'desc')->get();
        return view('index',$data);
    }

}
