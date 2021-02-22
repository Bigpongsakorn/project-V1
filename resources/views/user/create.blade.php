@if($admin_status != 1)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')

</script>
@else
{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- @if ($errors->all())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
    </li>
    @endforeach
    </ul>
    @endif --}}
    {{-- {!! Form::open(['action' => 'UsersController@store','method'=>'POST']) !!}
    <div class="col-md-6">
        <div class="form-group">
            <p>ชื่อผู้ใช้งาน</p>
            {!! Form::text('username',null,["class"=>"form-control",'placeholder' => 'username'])!!}
        </div>
        <div class="form-group">
            <p>รหัสผ่าน</p>
            {!! Form::text('password',null,["class"=>"form-control",'placeholder' => 'password'])!!}
        </div>
        <div class="form-group">
            <p>อีเมล์</p>
            {!! Form::text('user_email',null,["class"=>"form-control",'placeholder' => 'test@email.com'])!!}
        </div>
        <div class="form-group">
            <p>เพศ</p>
            {{ Form::radio('user_gender', 'mr' , true) }}
    นาย
    {{ Form::radio('user_gender', 'mrs' , false) }}
    นาง
    {{ Form::radio('user_gender', 'ms' , false) }}
    นางสาว
</div>
<div class="form-group">
    <p>ชื่อจริง</p>
    {!! Form::text('user_fname',null,["class"=>"form-control",'placeholder' => 'ทดสอบ'])!!}
</div>
<div class="form-group">
    <p>นามสกุล</p>
    {!! Form::text('user_lname',null,["class"=>"form-control",'placeholder' => 'ทดสอบ'])!!}
</div>
<div class="form-group">
    <p>อายุ</p>
    {!! Form::text('user_age',null,["class"=>"form-control",'placeholder' => '18'])!!}
</div>
<div class="form-group">
    <p>วันเกิด</p>
    {!! Form::text('user_dobDATE',null,["class"=>"form-control",'placeholder' => '1/1/2020'])!!}
</div>
<div class="form-group">
    <p>เลขบัตรประชาชน</p>
    {!! Form::text('user_idcard',null,["class"=>"form-control",'placeholder' => '1234567891234'])!!}
</div>
<div class="form-group">
    <p>เบอร์โทร</p>
    {!! Form::text('user_tel',null,["class"=>"form-control",'placeholder' => '0123456789'])!!}
</div>
<p>ที่อยู่</p>
<div class="form-group">
    <p>ซอย</p>
    {!! Form::text('soi',null,["class"=>"form-control",'placeholder' => '1'])!!}
</div>
<div class="form-group">
    <p>หมู่</p>
    {!! Form::text('moo',null,["class"=>"form-control",'placeholder' => '1'])!!}
</div>
<div class="form-group">
    <p>ถนน</p>
    {!! Form::text('road',null,["class"=>"form-control",'placeholder' => '1'])!!}
</div>
<div class="form-group">
    <p>ตำบล</p>
    {!! Form::text('sub_district',null,["class"=>"form-control",'placeholder' => '1'])!!}
</div>
<div class="form-group">
    <p>อำเภอ</p>
    {!! Form::text('district',null,["class"=>"form-control",'placeholder' => '1'])!!}
</div>
<div class="form-group">
    <p>จังหวัด</p>
    {!! Form::text('province',null,["class"=>"form-control",'placeholder' => 'ลำปาง'])!!}
</div>
<div class="form-group">
    <p>ประเภทผู้ใช้</p>
    {{ Form::select('user_type', ['1' => 'หัวหน้างาน', '2' => 'เจ้าหน้าที่พนักงาน',
                '3' => 'เจ้าหน้าที่ศูนย์'], ["class"=>"form-control"]) }}
</div>
Add image
<div class="form-group">
    <label class="form-label" for="customFile">รูปภาพพนักงาน</label>
    {!! Form::file('user_pic',["class"=>"form-control"])!!}
</div>
<input type="hidden" name="user_pic" value="">

<input type="submit" value="บันทึก" class="btn btn-primary btnSuccess">
<a href="/user" class="btn btn-success">กลับ</a>
</div>
{!! Form::close() !!} --}}


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

@if ($errors->all())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
</ul>
@endif
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
                        <h5>เพิ่มข้อมูลเจ้าหน้าที่ / Add Officer Information</h5>
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
                        {{-- <form> --}}
                        {!! Form::open(['action' => 'UsersController@store','method'=>'POST']) !!}
                        <div class="form-group row">
                            <div class="container emp-profile">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-img">
                                            <img src="../upload/photo_profile.png" alt="" width="200px" class="profile">
                                            <div class="file btn btn-lg btn-primary">Change Photo
                                                <input type="file" name="staff_pic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                <label class="col-sm-12 col-form-label-head">รหัสพนักงาน
                                                    :</label>
                                                <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <!-- <label class="col-sm-8 col-form-label-user">ชื่อผู้ใช้งานระบบ</label> -->
                                                <label class="col-sm-12 col-form-label-head">ตำแหน่ง
                                                    :</label>
                                                <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                    <select name="staff_type" class="form-control-select">
                                                        <option value=" ">เลือกประเภทผู้ใช้งาน</option>
                                                        <option value="1">หัวหน้างาน</option>
                                                        <option value="2">เจ้าหน้าที่พนักงาน</option>
                                                        <option value="3">เจ้าหน้าที่ศูนย์</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                <label class="col-sm-12 col-form-label-head">ชื่อผู้ใช้งานระบบ
                                                    :</label>
                                                <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                    {!!
                                                    Form::text('username',null,["class"=>"form-control
                                                    has-feedback-left",'placeholder'
                                                    => 'ชื่อผู้ใช้งานระบบ'])!!}
                                                    <span class="fa fa-user form-control-feedback left"
                                                        aria-hidden="true"></span>
                                                </div>
                                                <label class="col-sm-12 col-form-label-head">รหัสผ่าน
                                                    :</label>
                                                <div class="col-md-12 col-sm-6  form-group has-feedback">
                                                    {{-- {!!
                                                         Form::text('username',null,["class"=>"form-control
                                                         has-feedback-left",'placeholder'
                                                         => 'รหัสผ่าน'])!!} --}}
                                                    <input type="password" name="password"
                                                        class="form-control has-feedback-left" placeholder="รหัสผ่าน">
                                                    <span class="fa fa-key form-control-feedback left"
                                                        aria-hidden="true"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">คำนำหน้า :</label>
                            <div class="col-sm-9 col-form-label">
                                <div class="form-radio">
                                    <div class="radio radio-inline">
                                        <label>{{ Form::radio('staff_title', '1' , true,["class"=>"titles"]) }}
                                            <i class="helper"></i>นาย</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label> {{ Form::radio('staff_title', '2' , false,["class"=>"titles"]) }}
                                            <i class="helper"></i>นาง</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label> {{ Form::radio('staff_title', '3' , false,["class"=>"titles"]) }}
                                            <i class="helper"></i>นางสาว</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                {{-- <input type="text" class="form-control has-feedback-left"
                                            placeholder="First Name"> --}}
                                {!! Form::text('staff_fname',null,["class"=>"form-control
                                has-feedback-left",'placeholder' =>
                                'ชื่อจริง'])!!}
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                {{-- <input type="text" class="form-control" placeholder="Last Name"> --}}
                                {!! Form::text('staff_lname',null,["class"=>"form-control",'placeholder' =>
                                'นามสกุล'])!!}
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                {{-- <input type="text" class="form-control has-feedback-left"
                                            placeholder="First Name"> --}}
                                {!! Form::text('staff_email',null,["class"=>"form-control
                                has-feedback-left",'placeholder' =>
                                'อีเมล์'])!!}
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                {{-- <input type="text" class="form-control" placeholder="Last Name"> --}}
                                {!! Form::text('staff_tel',null,["class"=>"form-control",'placeholder' =>
                                'เบอร์โทรศัพท์'])!!}
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เพศ :</label>
                            <div class="col-sm-9 col-form-label">
                                <div class="form-radio">
                                    <div class="radio radio-inline">
                                        <label>
                                            {{ Form::radio('staff_gender', '1' , true ,["class"=>"male"]) }}
                                            <i class="helper"></i>ชาย
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <label> {{ Form::radio('staff_gender', '2' , false,["class"=>"female"]) }}<i
                                                class="helper"></i>หญิง</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">วันเกิด :</label>
                            </div>
                            <div class="col-sm-3">
                                {!! Form::date('staff_dob',null,["class"=>"form-control",])!!}
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">ตำแหน่ง :</label>
                            </div>
                            <div class="col-sm-4">
                                <select name="staff_position" class="form-control-select">
                                    <option value=" ">เลือกตำแหน่ง</option>
                                    <option value="1">เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย </option>
                                    <option value="2">พนักงานดับเพลิง </option>
                                    <option value="3">พนักงานขับรถยนต์ </option>
                                    <option value="4">พนักงานขับเครื่องจักรกลขนาดเบา </option>
                                    <option value="5">พนักงานสูบน้ำ </option>
                                    <option value="6">คนงานป้องกันและบรรเทาสาธารณภัย </option>
                                </select>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="staff_status" value="1"> --}}
                        {!! Form::hidden('staff_status','1')!!}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">หมายเลขบัตรประชาชน  </label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control"
                                            placeholder="หมายเลขบัตรประชาชน 13 หลัก"> --}}
                                {!! Form::text('staff_idcard',null,["class"=>"form-control",'placeholder' =>
                                'หมายเลขบัตรประชาชน 13 หลัก','maxlength'=>'13'])!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ที่อยู่ - บ้านเลขที่ :</label>
                            <div class="col-sm-3">
                                {{-- <input type="text" class="form-control"> --}}
                                {!! Form::text('staff_house_no',null,["class"=>"form-control"])!!}
                            </div>
                            <label class="col-sm-2 col-form-label">หมู่ที่ :</label>
                            <div class="col-sm-4">
                                {{-- <input type="number" class="form-control"> --}}
                                {!! Form::number('staff_village_no',null,["class"=>"form-control"])!!}
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">ถนน / ซอย :</label>
                            <div class="col-sm-9">
                                {{-- <input type="text" class="form-control"> --}}
                                {!! Form::text('staff_road',null,["class"=>"form-control"])!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">จังหวัด :</label>
                            <div class="col-sm-3">
                                <select name="province" id="province" class="form-control-select">
                                    <option value="province">เลือกจังหวัด</option>
                                    {{-- <option value="opt2">Type 2</option>
                                        <option value="opt3">Type 3</option>
                                        <option value="opt4">Type 4</option>
                                        <option value="opt5">Type 5</option> --}}
                                    @foreach ($pro as $item)
                                    <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control"> -->
                            </div>
                            <label class="col-sm-2 col-form-label">อำเภอ :</label>
                            <div class="col-sm-3">
                                <select name="district" class="form-control-select" id="district">
                                    <option value="district">เลือกอำเภอ</option>
                                    {{-- <option value="opt2">Type 2</option>
                                        <option value="opt3">Type 3</option>
                                        <option value="opt4">Type 4</option>
                                        <option value="opt5">Type 5</option> --}}
                                    {{-- @foreach ($dis as $item)
                                        <option value="{{$item->district_id}}">{{$item->district_name}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ตำบล :</label>
                            <div class="col-sm-3">
                                <select name="subdistrict_id" class="form-control-select" id="subdistrict">
                                    <option value="subdistrict_id">เลือกตำบล</option>
                                    {{-- <option value="opt2">Type 2</option>
                                        <option value="opt3">Type 3</option>
                                        <option value="opt4">Type 4</option>
                                        <option value="opt5">Type 5</option> --}}
                                    {{-- @foreach ($sub as $item)
                                        <option value="{{$item->subdistrict_id}}">{{$item->subdistrict_name}}</option>
                                    @endforeach --}}
                                </select>
                                <!-- <input type="text" class="form-control"> -->
                            </div>
                            <label class="col-sm-2 col-form-label">รหัสไปรษณีย์ :</label>
                            <div class="col-sm-3">
                                <select name="zip_code" class="form-control-select" id="zipcode">
                                    <option value="zip_code">เลือกรหัสไปรษณีย์</option>
                                    {{-- <option value="opt2">Type 2</option>
                                        <option value="opt3">Type 3</option>
                                        <option value="opt4">Type 4</option>
                                        <option value="opt5">Type 5</option> --}}
                                    {{-- @foreach ($sub as $item)
                                        <option value="{{$item->zip_code}}">{{$item->zip_code}}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                            class='fa fa-user-plus'></i>เพิ่ม</button>
                                    <a href="{{url('/user/index')}}"><button class="btn btn-secondary btn-form"
                                            type="button"><i class='fa fa-close'></i>ปิด</button></a>
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
@endauth
