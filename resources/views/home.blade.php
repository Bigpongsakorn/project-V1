@extends('layouts.main-layout')
@section('content')
<div class="container">

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

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>ข้อมูลส่วนตัว / Profile</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    {{-- <form> --}}

                                    <div class="form-group row">
                                        <div class="container emp-profile">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="profile-img">
                                                        @if ($user->staff_pic=='')
                                                        <img src="../upload/photo_profile.png" width="200px"
                                                            class="profile">
                                                        @else
                                                        <img src="../upload/images/{{ $user->staff_pic }}"
                                                            width="200px" class="profile">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="profile-head">
                                                        <label class="col-sm-8 col-form-label-user">
                                                            ชื่อผู้ใช้งานระบบ : 
                                                            {{$user->username}}
                                                        </label>
                                                        <label class="col-sm-4 col-form-label-head">รหัสพนักงาน
                                                            :</label>
                                                        <label
                                                            class="col-sm-4 col-form-label">{{sprintf('%05d',$user->staff_id)}}</label>
                                                        <label class="col-sm-4 col-form-label-head">ประเภทผู้ใช้งานระบบ
                                                            :</label>
                                                        <label class="col-sm-4 col-form-label">
                                                            {{-- {{$user->staff_type}} --}}
                                                            @if($user->staff_type == '0')
                                                            admin
                                                            @elseif($user->staff_type == '1')
                                                            หัวหน้างาน
                                                            @elseif($user->staff_type == '2')
                                                            เจ้าหน้าที่พนักงาน
                                                            @elseif($user->staff_type == '3')
                                                            เจ้าหน้าที่ศูนย์
                                                            @else($row->levels == '5')
                                                            <td> ผู้ใช้ทั่วไป</td>
                                                            @endif
                                                        </label>
                                                        <label class="col-sm-4 col-form-label-head">ตำแหน่ง
                                                            :</label>
                                                        <label class="col-sm-4 col-form-label">
                                                            @if($user->staff_position == '1')
                                                            เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย
                                                            @elseif($user->staff_position == '2')
                                                            พนักงานดับเพลิง
                                                            @elseif($user->staff_position == '3')
                                                            พนักงานขับรถยนต์
                                                            @elseif($user->staff_position == '4')
                                                            พนักงานขับเครื่องจักรกลขนาดเบา
                                                            @elseif($user->staff_position == '5')
                                                            พนักงานสูบน้ำ
                                                            @elseif($user->staff_position == '6')
                                                            คนงานป้องกันและบรรเทาสาธารณภัย
                                                            @else
                                                            <td> ไม่มี</td>
                                                            @endif
                                                        </label>
                                                        <label class="col-sm-4 col-form-label-head">สถานะการใช้งาน
                                                            :</label>
                                                        <label class="col-sm-4 col-form-label">
                                                            @if($user->staff_status == '1')
                                                            ใช้งานปกติ
                                                            @elseif($user->staff_status == '2')
                                                            ลาออก
                                                            @elseif($user->staff_status == '3')
                                                            พักงาน
                                                            @else
                                                            <td> พ้นสภาพ</td>
                                                            @endif
                                                        </label>
                                                        <div class="d-grid gap-2 d-md-block">
                                                            <!-- Button to Open the Modal -->
                                                            <button type="button" class="btn btn-success btn-form"
                                                                data-toggle="modal" data-target="#myModal"><i
                                                                    class='fa fa-key'></i> เปลี่ยนรหัสผ่าน</button>
                                                            <a href="{{url('user/edit_profile',$user->staff_id)}}">
                                                                <button class="btn btn-primary btn-form"
                                                                    type="button"><i
                                                                        class='fa fa-edit'></i>แก้ไขข้อมูลส่วนตัว</button>
                                                            </a>
                                                        </div>
                                                        <!-- The Modal -->
                                                        <div class="modal fade" id="myModal">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"><i
                                                                                class='fa fa-key'></i>เปลี่ยนรหัสผ่าน
                                                                        </h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="modal-con">
                                                                            <!-- <div class="card-block"> -->
                                                                            <form>
                                                                                <div class="row form-group">
                                                                                    <div class="col-sm-5"><label
                                                                                            class="col-form-label">รหัสผ่านปัจจุบัน
                                                                                            :</label></div>
                                                                                    <div class="col-sm-7"><input
                                                                                            type="password"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-sm-5"><label
                                                                                            class="col-form-label">รหัสผ่านใหม่
                                                                                            :</label></div>
                                                                                    <div class="col-sm-7"><input
                                                                                            type="password"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-5"><label
                                                                                            class="col-form-label">รหัสผ่านใหม่
                                                                                            (อีกครั้ง) :</label>
                                                                                    </div>
                                                                                    <div class="col-sm-7"><input
                                                                                            type="password"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-info"
                                                                            data-dismiss="modal">
                                                                            <i class="fa fa-save"></i>
                                                                            บันทึก
                                                                        </button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">
                                                                            <i class="fa fa-close"></i>
                                                                            ปิด
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <label class="col-sm-3 col-form-label-head">คำนำหน้า : </label>
                                            <label class="col-sm-8 col-form-label">
                                                @if($user->staff_title == '1')
                                                นาย
                                                @elseif($user->staff_title == '2')
                                                นาง
                                                @else
                                                นางสาว
                                                @endif
                                            </label>
                                            <label class="col-sm-3 col-form-label-head">ชื่อ - สกุล : </label>
                                            <label class="col-sm-8 col-form-label">
                                                {{$user->staff_fname}}
                                                {{$user->staff_lname}}
                                            </label>
                                            <label class="col-sm-3 col-form-label-head">อีเมล์ :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->staff_email}}</label>
                                            <label class="col-sm-3 col-form-label-head">เบอร์โทร :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->staff_tel}}</label>
                                            <label class="col-sm-3 col-form-label-head">เพศ :</label>
                                            <label class="col-sm-8 col-form-label">
                                                @if($user->staff_gender == '1')
                                                ชาย
                                                @else
                                                หญิง
                                                @endif
                                            </label>
                                            <label class="col-sm-3 col-form-label-head">วันเกิด :</label>
                                            <label
                                                class="col-sm-8 col-form-label">{{ date('d-m-Y',strtotime($user->staff_dob)) }}</label>
                                            <label class="col-sm-3 col-form-label-head">เลขบัตรประชาชน :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->staff_idcard}}</label>
                                            <label class="col-sm-3 col-form-label-head">บ้านเลขที่ :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->staff_house_no}}</label>
                                            <label class="col-sm-3 col-form-label-head">หมู่ :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->staff_village_no}}</label>
                                            <label class="col-sm-3 col-form-label-head">ถนน / ซอย :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->staff_road}}</label>
                                            <label class="col-sm-3 col-form-label-head">ตำบล :</label>
                                            <label class="col-sm-8 col-form-label">{{$city->subdistrict_name}}</label>
                                            
                                            <label class="col-sm-3 col-form-label-head">อำเภอ :</label>
                                            <label class="col-sm-8 col-form-label">{{$city->district_name}}</label>
                                            <label class="col-sm-3 col-form-label-head">จังหวัด :</label>
                                            <label class="col-sm-8 col-form-label">{{$city->province_name}}</label>
                                            <label class="col-sm-3 col-form-label-head">รหัสไปรษณีย์ :</label>
                                            <label class="col-sm-8 col-form-label">{{$user->zip_code}}</label>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <a href="user.html">
                                                    <button class="btn btn-secondary btn-form" type="button">
                                                        <i class='fa fa-close'></i>
                                                        ปิด
                                                    </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> --}}

                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
