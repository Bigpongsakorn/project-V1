@if($admin_status != 1)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')

</script>
@else
{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <form action="/updateuser/{{ $data->user_id }}" method="post" class="form-horizontal"
    enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="col-md-6">
        <div class="form-group">
            <input type="file" name="user_pic" id="user_pic" value="{{ $data->user_pic }}">
        </div>
        <div class="form-group">
            <label>ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
        </div>
        <div class="form-group">
            <label>อีเมล</label>
            <input type="text" class="form-control" id="email" name="user_email" value="{{ $data->user_email }}">
        </div>
        <div class="form-group">
            <p>เพศ</p>
            <input type="radio" id="mr" name="user_gender" value="mr" {{$data->user_gender == 'mr' ? "checked" : ""}}>
            นาย
            <input type="radio" id="mrs" name="user_gender" value="mrs"
                {{$data->user_gender == 'mrs' ? "checked" : ""}}> นาง
            <input type="radio" id="ms" name="user_gender" value="ms" {{$data->user_gender == 'ms' ? "checked" : ""}}>
            นางสาว
        </div>
        <div class="form-group">
            <label>ชื่อจริง</label>
            <input type="text" class="form-control" id="fname" name="user_fname" value="{{ $data->user_fname }}">
        </div>
        <div class="form-group">
            <label>นามสกุล</label>
            <input type="text" class="form-control" id="lname" name="user_lname" value="{{ $data->user_lname }}">
        </div>
        <div class="form-group">
            <label>วันเกิด</label>
            <input type="text" class="form-control" id="bithday" name="user_dobDATE" value="{{ $data->user_dobDATE }}">
        </div>
        <div class="form-group">
            <label>เลขบัตรประชาชน</label>
            <input type="text" class="form-control" id="id" name="user_idcard" value="{{ $data->user_idcard }}">
        </div>
        <div class="form-group">
            <label>เบอร์โทร</label>
            <input type="text" class="form-control" id="tel" name="user_tel" value="{{ $data->user_tel }}">
        </div>
        <p>ที่อยู่</p>
        <div class="form-group">
            <label>ซอย</label>
            <input type="text" class="form-control" name="soi" value="{{ $data->soi }}">
        </div>
        <div class="form-group">
            <label>หมู่</label>
            <input type="text" class="form-control" name="moo" value="{{ $data->moo }}">
        </div>
        <div class="form-group">
            <label>ถนน</label>
            <input type="text" class="form-control" name="road" value="{{ $data->road }}">
        </div>
        <div class="form-group">
            <label>ตำบล</label>
            <input type="text" class="form-control" name="sub_district" value="{{ $data->sub_district }}">
        </div>
        <div class="form-group">
            <label>อำเภอ</label>
            <input type="text" class="form-control" name="district" value="{{ $data->district }}">
        </div>
        <div class="form-group">
            <label>จังหวัด</label>
            <input type="text" class="form-control" name="province" value="{{ $data->province }}">
        </div>
        <div class="form-group">
            <label>ประเภทผู้ใช้</label>
            {{ Form::select('user_type', ['1' => 'หัวหน้างาน', '2' => 'เจ้าหน้าที่พนักงาน',
                '3' => 'เจ้าหน้าที่ศูนย์'], $data->user_type, ["class"=>"form-control"]) }}
        </div>
        <div class="form-group">
            <input type="submit" value="อัพเดท" class="btn btn-primary btnSuccess">
            <a href="/user" class="btn btn-success">กลับ</a>
        </div>
    </div>
    </form> --}}
    {{-- -------------------------------------------------------------- --}}
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-clipboard bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลผู้ใช้งานระบบ</h5>
                        <span>System User Information</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <div class="page-wrapper">
        <div class="page-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>แก้ไขข้อมูลเจ้าหน้าที่ / Edit Officer Information</h5>
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
                            <form action="/updateuser/{{ $data->staff_id }}" method="post" class="form-horizontal"
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
                                                    <div class="file btn btn-lg btn-primary">
                                                        Change Photo
                                                        <input type="file" name="staff_pic" id="staff_pic"
                                                            value="{{ $data->staff_pic }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="profile-head">
                                                        <label class="col-sm-12 col-form-label-head">รหัสพนักงาน
                                                            :</label>
                                                        <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                            <input type="text" class="form-control"
                                                                value="{{sprintf('%05d',$data->staff_id)}}" readonly>
                                                        </div>
                                                        <label class="col-sm-12 col-form-label-head">รหัสผ่าน
                                                            :</label>
                                                        <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left"
                                                                placeholder="รหัสผ่าน">
                                                            <span class="fa fa-key form-control-feedback left"
                                                                aria-hidden="true"></span>
                                                        </div>
                                                        <label class="col-sm-12 col-form-label-head">ประเภทผู้ใช้งานระบบ
                                                            :</label>
                                                        <div class="col-sm-12">
                                                            {{ Form::select('staff_type', ['1' => 'หัวหน้างาน', '2' => 'เจ้าหน้าที่พนักงาน',
                                                            '3' => 'เจ้าหน้าที่ศูนย์'], $data->staff_type,
                                                            ["class"=>"form-control-select"]) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="profile-head">
                                                        <label class="col-sm-12 col-form-label-head">ชื่อผู้ใช้งานระบบ
                                                            :</label>
                                                        <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left"
                                                                id="username" name="username"
                                                                value="{{ $data->username }}" readonly>
                                                            <span class="fa fa-user form-control-feedback left"
                                                                aria-hidden="true"></span>
                                                        </div>
                                                        <label class="col-sm-12 col-form-label-head">รหัสผ่าน
                                                            (อีกครั้ง) :</label>
                                                        <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                            <input type="text" class="form-control has-feedback-left"
                                                                placeholder="รหัสผ่าน (อีกครั้ง)">
                                                            <span class="fa fa-key form-control-feedback left"
                                                                aria-hidden="true"></span>
                                                        </div>
                                                        <label class="col-sm-12 col-form-label-head">สถานะของผู้ใช้งาน : </label>
                                                            <div class="col-sm-12">
                                                                {{ Form::select('staff_status', ['1' => 'ใช้งานปกติ', '2' => 'ลาออก',
                                                            '3' => 'พักงาน', '4' => 'พ้นสภาพ'], $data->staff_status,
                                                            ["class"=>"form-control-select"]) }}
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">คำนำหน้า :</label>
                                    <div class="col-sm-10 col-form-label">
                                        <div class="form-radio">
                                            <div class="radio radio-inline">
                                                <label><input type="radio" id="mr" name="staff_title" value="1"
                                                    class="titles"
                                                        {{$data->staff_title == '1' ? "checked" : ""}}><i
                                                        class="helper"></i>นาย</label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label><input type="radio" id="mrs" name="staff_title" value="2"
                                                    class="titles"
                                                        {{$data->staff_title == '2' ? "checked" : ""}}><i
                                                        class="helper"></i>นาง</label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label><input type="radio" id="ms" name="staff_title" value="3"
                                                    class="titles"
                                                        {{$data->staff_title == '3' ? "checked" : ""}}><i
                                                        class="helper"></i>นางสาว</label>
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
                                                    class="male"
                                                        {{$data->staff_gender == '1' ? "checked" : ""}}><i
                                                        class="helper"></i>ชาย</label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label><input type="radio" name="staff_gender" value="2"
                                                    class="female"
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
                                        <input type="date" class="form-control" name="staff_dob"
                                            value="{{ $data->staff_dob }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="col-form-label">ตำแหน่ง :</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="staff_position" class="form-control-select" >
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
                                    <label class="col-sm-2 col-form-label">ที่อยู่ -
                                        บ้านเลขที่
                                        :</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="staff_house_no"
                                            value="{{ $data->staff_house_no }}">
                                    </div>
                                    <label class="col-sm-2 col-form-label">หมู่ที่ :</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="staff_village_no"
                                            value="{{ $data->staff_village_no }}">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">ถนน / ซอย
                                        :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="staff_road"
                                            value="{{ $data->staff_road }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">จังหวัด :</label>
                                    <div class="col-sm-4">
                                        <select name="province" class="form-control-select" id="province">
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
                                            @foreach ($sub as $item)
                                            <option value="{{$item->subdistrict_id}}" @if($item->subdistrict_id ==
                                                $data->subdistrict_id) {{"selected"}} @endif >
                                                {{$item->subdistrict_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">รหัสไปรษณีย์ :</label>
                                    <div class="col-sm-4">
                                        <select name="zip_code" class="form-control-select" id="zipcode">
                                            @foreach ($sub as $item)
                                            <option value="{{$item->zip_code}}" @if($item->zip_code ==
                                                $data->zip_code) {{"selected"}} @endif>
                                                {{$item->zip_code}}</option>
                                                @break
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                    class='fa fa-save'></i>บันทึก</button>
                                            <a href="{{url('/user/index')}}"><button class="btn btn-secondary btn-form"
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
@endauth
