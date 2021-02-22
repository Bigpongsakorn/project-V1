@extends('layouts.main-layout')
@section('content')
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="fa fa-desktop bg-c-blue"></i>
                <div class="d-inline">
                    <h5>กรอกข้อมูลแบบฟอร์มออนไลน์</h5>
                    <span>Fill The Online Form</span>
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
                    <div class="col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>หนังสือรับรองผู้ประสบภัยประเภทบุคคลธรรมดา</h5>
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
                            <div class="card-block p-b-0">
                                <form action="/insert_certificate" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1">
                                            <label class="col-form-label">เลขที่</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="เลขหนังสือ/(พ.ศ.)"
                                                name="sufferer_no">
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-form-label">ส่วนราชการ </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                placeholder="ส่วนราชการเจ้าของหนังสือ" name="sufferer_gover">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 col-form-label">หนังสือฉบับนี้ให้ไว้เพื่อรับรองว่า
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="sufferer_confirm">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">เกิดวันที่ </label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="sufferer_user_birte">
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="col-form-label">เลขประจำตัวประชาชน</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน/หนังสือเดินทางเลขที่/อื่น
                                                                    ๆ (ถ้ามี)" name="sufferer_userid" maxlength="13">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 col-form-label">ที่อยู่ที่ประสบสาธารณภัย
                                            บ้านเลขที่</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="sufferer_home_num">
                                        </div>
                                        <label class="col-sm-1 col-form-label">หมู่ที่</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="sufferer_home_no">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">ถนน</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="sufferer_road">
                                        </div>
                                        <label class="col-sm-1 col-form-label">จังหวัด</label>
                                        <div class="col-sm-4">
                                            <select name="province" class="form-control-sl" id="province">
                                                <option value="opt1">เลือกจังหวัด</option>
                                                @foreach ($pro as $item)
                                                <option value="{{$item->province_id}}">
                                                    {{$item->province_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">อำเภอ</label>
                                        <div class="col-sm-4">
                                            <select name="district" class="form-control-sl" id="district">
                                                <option value="opt1">เลือกอำเภอ</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label">ตำบล</label>
                                        <div class="col-sm-4">
                                            <select name="subdistrict" class="form-control-sl" id="subdistrict">
                                                <option value="opt1">เลือกตำบล</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">รหัสไปรษณีย์</label>
                                        <div class="col-sm-3">
                                            <select name="zip_code" class="form-control-sl" id="zipcode">
                                                <option value="opt1">เลือกรหัสไปรษณีย์</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label">โทรศัพท์</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="sufferer_user_tel">
                                        </div>
                                    </div><br>
                                    <hr><br>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label
                                            class="col-sm-4 col-form-label">ที่อยู่ตามทะเบียนบ้านหรือที่อยู่ที่ติดต่อได้
                                            บ้านเลขที่</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="home_num">
                                        </div>
                                        <label class="col-sm-1 col-form-label">หมู่ที่</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="home_moo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">ถนน</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="home_road">
                                        </div>
                                        <label class="col-sm-1 col-form-label">จังหวัด</label>
                                        <div class="col-sm-4">
                                            <select name="home_province" class="form-control-sl" id="province1">
                                                <option value="">เลือกจังหวัด</option>
                                                @foreach ($pro as $item)
                                                <option value="{{$item->province_id}}">
                                                    {{$item->province_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">อำเภอ</label>
                                        <div class="col-sm-4">
                                            <select name="home_district" class="form-control-sl" id="district1">
                                                <option value="">เลือกอำเภอ</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label">ตำบล</label>
                                        <div class="col-sm-4">
                                            <select name="home_subdistrict" class="form-control-sl" id="subdistrict1">
                                                <option value="">เลือกตำบล</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">รหัสไปรษณีย์</label>
                                        <div class="col-sm-3">
                                            <select name="home_zipcode" class="form-control-sl" id="zipcode1">
                                                <option value="opt1">เลือกรหัสไปรษณีย์</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label">โทรศัพท์</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="home_tel">
                                        </div>
                                    </div><br>
                                    <hr><br>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label
                                            class="col-sm-4 col-form-label">เป็นผู้ประสบภัยหรือได้รับผลกระทบจากเหตุการณ์</label>
                                        <div class="col-sm-6">
                                            <select name="risk_id" class="form-control-sl">
                                                <option value="">เลือกประเภทของสาธารณภัย
                                                </option>
                                                @foreach ($risk as $item)
                                                <option value="{{$item->risk_id}}">
                                                    {{$item->risk_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">สถานที่เกิดภัย</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="sufferer_loaction">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">เมื่อ</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="sufferer_start_date">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="sufferer_start_time">
                                        </div>
                                        <label class="col-sm-2 col-form-label">(วัน เดือน ปี เวลา
                                            ที่เกิดภัย)</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-8 col-form-label"><b>ความเสียหายของผู้ประสบภัย</b>
                                            ตามบัญชีความเสียหายแนบท้ายหนังสือรับรองผู้ประสบภัยประเภทบุคคลธรรมดาฉบับนี้</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label
                                            class="col-sm-10 col-form-label">ผู้ประสบภัยมีสิทธิที่จะได้รับการสงเคราะห์และการฟื้นฟูจากหน่วยงานของทางราชการ
                                            ด้านใดด้านหนึ่ง หรือหลายด้านตามเงื่อนไข หลักเกณฑ์
                                            และแนวทางที่หน่วยงานนั้นกำหนด
                                            รายละเอียดตารางแสดงสิทธิที่จะได้รับจากทางราชการปรากกฏตามแนบท้าย</label>
                                    </div>
                                    <br>
                                    <hr><br>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <label class="col-sm-2 col-form-label">(ลงชื่อ)</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sufferer_user_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <label class="col-sm-2 col-form-label">ตำแหน่ง</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sufferer_user_position">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <label class="col-sm-2 col-form-label">ผู้อำนวยการ</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sufferer_user_director">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-11">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button class="btn btn-info me-md-2 btn-form" type="submit">
                                                    <i class='fa fa-save'></i>บันทึก</button>
                                                <a href="/request/certificate">
                                                    <button class="btn btn-secondary btn-form" type="button">
                                                        <i class='fa fa-close'></i>ปิด</button></a>
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
</div>







@endsection
