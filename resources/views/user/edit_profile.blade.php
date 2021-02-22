{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    @if($errors->all())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
    @endif
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลเจ้าหน้าที่</h5>
                        <span>Officer Information</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="page-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>แก้ไขข้อมูลส่วนตัว / Edit Profile</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                    </li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i>
                                    </li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i>
                                    </li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <form action="/updateprofile/{{ $data->staff_id }}" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group row">
                                    <div class="container emp-profile">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="profile-img">
                                                    @if ($data->staff_pic=='')
                                                    <img src="../../upload/photo_profile.png" width="200px"
                                                        class="profile">
                                                    @else
                                                    <img src="../../upload/images/{{ $data->staff_pic }}" width="200px"
                                                        class="profile">
                                                    @endif
                                                    <div class="file btn btn-lg btn-primary">Change Photo
                                                        <input type="file" name="staff_pic"
                                                            value="{{ $data->staff_pic }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="profile-head">
                                                    <label class="col-sm-8 col-form-label-user">ชื่อผู้ใช้งานระบบ :
                                                        {{$data->username}}</label>
                                                    <label class="col-sm-4 col-form-label-head">รหัสพนักงาน :</label>
                                                    <label
                                                        class="col-sm-4  col-form-label">{{sprintf('%05d',$data->staff_id)}}</label>
                                                    <label class="col-sm-4 col-form-label-head">ประเภทผู้ใช้งานระบบ
                                                        :</label>
                                                    <label class="col-sm-4 col-form-label">
                                                        {{-- {{$user->staff_type}} --}}
                                                        @if($data->staff_type == '0')
                                                        admin
                                                        @elseif($data->staff_type == '1')
                                                        หัวหน้างาน
                                                        @elseif($data->staff_type == '2')
                                                        เจ้าหน้าที่พนักงาน
                                                        @elseif($data->staff_type == '3')
                                                        เจ้าหน้าที่ศูนย์
                                                        @else($row->levels == '5')
                                                        <td> ผู้ใช้ทั่วไป</td>
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">คำนำหน้า :</label>
                                    <input type="hidden" value="{{$data->staff_status}}">
                                    <div class="col-sm-10 col-form-label">
                                        <div class="form-radio">
                                            <div class="form-radio">
                                                <div class="radio radio-inline">
                                                    <label><input type="radio" name="staff_title" value="1"
                                                            class="titles"
                                                            {{$data->staff_title == '1' ? "checked" : ""}}><i
                                                            class="helper"></i>นาย</label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <label><input type="radio" name="staff_title" value="2"
                                                            class="titles"
                                                            {{$data->staff_title == '2' ? "checked" : ""}}><i
                                                            class="helper"></i>นาง</label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <label><input type="radio" name="staff_title" value="3"
                                                            class="titles"
                                                            {{$data->staff_title == '3' ? "checked" : ""}}><i
                                                            class="helper"></i>นางสาว</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="fname"
                                            name="staff_fname" value="{{ $data->staff_fname }}">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control" id="lname" name="staff_lname"
                                            value="{{ $data->staff_lname }}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="email"
                                            name="staff_email" value="{{ $data->staff_email }}">
                                        <span class="fa fa-envelope form-control-feedback left"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control" id="tel" name="staff_tel"
                                            value="{{ $data->staff_tel }}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">เพศ :</label>
                                    <div class="col-sm-10 col-form-label">
                                        <div class="form-radio">
                                            <div class="radio radio-inline">
                                                <label><input type="radio" name="staff_gender" value="1"
                                                        class="male staff_gender"
                                                        {{$data->staff_gender == '1' ? "checked" : ""}}><i
                                                        class="helper"></i>ชาย</label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label><input type="radio" name="staff_gender" value="2"
                                                        class="female staff_gender"
                                                        {{$data->staff_gender == '2' ? "checked" : ""}}><i
                                                        class="helper"></i>หญิง</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label class="col-form-label">วันเกิด :</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="bithday" name="staff_dob"
                                            value="{{ $data->staff_dob }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="col-form-label">ตำแหน่ง :</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="staff_position" class="form-control-select">
                                            <option value=" ">เลือกตำแหน่ง</option>
                                            <option value="1" @if($data->staff_position == 1 ) selected
                                                @endif >เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย </option>
                                            <option value="2" @if($data->staff_position == 2 ) selected
                                                @endif >พนักงานดับเพลิง </option>
                                            <option value="3" @if($data->staff_position == 3 ) selected
                                                @endif >พนักงานขับรถยนต์ </option>
                                            <option value="4" @if($data->staff_position == 4 ) selected
                                                @endif >พนักงานขับเครื่องจักรกลขนาดเบา </option>
                                            <option value="5" @if($data->staff_position == 5 ) selected
                                                @endif >พนักงานสูบน้ำ </option>
                                            <option value="6" @if($data->staff_position == 6 ) selected
                                                @endif >คนงานป้องกันและบรรเทาสาธารณภัย </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">เลขบัตรประชาชน :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id" name="staff_idcard"
                                            value="{{ $data->staff_idcard }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ที่อยู่ - บ้านเลขที่ :</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="staff_house_no" value="{{ $data->staff_house_no }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label">หมู่ที่ :</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="staff_village_no" value="{{ $data->staff_village_no }}">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">ถนน / ซอย
                                        :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="staff_road" value="{{ $data->staff_road }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">จังหวัด :</label>
                                    <div class="col-sm-4">
                                        <select name="province" class="form-control-select" id="province">
                                            {{-- <option value="{{ $data->province }}">{{ $data->province }}</option>
                                            --}}
                                            @foreach ($pro as $item)
                                            <option value="{{$item->province_id}}" @if($item->province_id ==
                                                $data->province) {{"selected"}} @endif>
                                                {{$item->province_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">อำเภอ :</label>
                                    <div class="col-sm-4">
                                        <select name="district" class="form-control-select" id="district">
                                            {{-- <option value="{{ $data->district }}">{{ $data->district }}</option>
                                            --}}
                                            @foreach ($dis as $item)
                                            <option value="{{$item->district_id}}" @if($item->district_id ==
                                                $data->district) {{"selected"}} @endif >
                                                {{$item->district_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ตำบล :</label>
                                    <div class="col-sm-4">
                                        <select name="subdistrict_id" class="form-control-select" id="subdistrict">
                                            {{-- <option value="{{ $data->sub_district }}">{{ $data->sub_district }}
                                            </option> --}}
                                            @foreach ($sub as $item)
                                            <option value="{{$item->subdistrict_id}}" @if($item->subdistrict_id ==
                                                $data->subdistrict_id) {{"selected"}} @endif >
                                                {{$item->subdistrict_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">รหัสไปรษณีย์
                                        :</label>
                                    <div class="col-sm-4">
                                        <select name="zip_code" class="form-control-select" id="zipcode">
                                            {{-- <option value="{{$data->zip_code}}">{{$data->zip_code}}</option>
                                            --}}
                                            @foreach ($sub as $item)
                                            <option value="{{$item->zip_code}}" @if($item->zip_code ==
                                                $data->zip_code) {{"selected"}} @endif>
                                                {{$item->zip_code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit">
                                                <i class='fa fa-save'></i>บันทึก</button>
                                            <a href="{{url('/home/index')}}"><button class="btn btn-secondary btn-form"
                                                    type="button"><i
                                                        class='fa fa-close'></i>ปิด</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
