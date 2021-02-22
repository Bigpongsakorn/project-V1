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
                                <h5>คำขอหนังสือรับรองกรณีผู้ประสบภัย หรือเจ้าของ
                                    หรือผู้ครอบครองทรัพย์สิน ร้องขอหลักฐานเพื่อรับการสงเคราะห์
                                    หรือบริการอื่นใด</h5>
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
                        
                            <!-- Content Start-->
                            <div class="card-block">
                                <form action="/update_certificate_request/{{$form->guaranty_id}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            <label class="col-form-label tb-ct">(ออกตามระเบียบกระทรวงมหาดไทย
                                                ว่าด้วยหลักเกณฑ์เกี่ยวกับการออกหนังสือรับรอง
                                                กรณีผู้ประสบภัย หรือเจ้าของ
                                                หรือผู้ครอบครองทรัพย์สิน
                                                ร้องขอหลักฐานเพื่อรับการสงเคราะห์
                                                หรือบริการอื่นใด พ.ศ.๒๕๕๒) </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-1">
                                            <label class="col-form-label">เขียนที่ </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="write_at"
                                                value="{{$form->write_at}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-1">
                                            <label class="col-form-label">วันที่ </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="guaranty_to_date"
                                                value="{{$form->guaranty_to_date}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">ข้อ ๑ ข้าพเจ้า
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="user_name"
                                                value="{{$form->user_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">อายุ </label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" name="age"
                                                value="{{$form->age}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">ปี </label>
                                        <label class="col-sm-1 col-form-label">สัญชาติ </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control-sl" value="{{$form->nationality}}">
                                            {{-- <select name="nationality" class="form-control-sl"
                                                value="{{$form->nationality}}">
                                                <option value=" ">เลือกสัญชาติ</option>
                                                <option value="ไทย">ไทย</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">อยู่บ้านเลขที่</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="home_num"
                                                value="{{$form->home_num}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">ตรอก/ซอย</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="home_soil"
                                                value="{{$form->home_soil}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">ถนน</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="home_road"
                                                value="{{$form->home_road}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">จังหวัด</label>
                                        <div class="col-sm-4">
                                            <select name="province" class="form-control-sl" id="province">
                                                <option value="">เลือกจังหวัด</option>
                                                @foreach ($pro as $item)
                                                <option value="{{$item->province_id}}" @if($item->province_id ==
                                                    $form->province) {{"selected"}} @endif>
                                                    {{$item->province_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">อำเภอ</label>
                                        <div class="col-sm-3">
                                            <select name="district" class="form-control-sl" id="district">
                                                <option value="">เลือกอำเภอ</option>
                                                @foreach ($dis as $item)
                                                <option value="{{$item->district_id}}" @if($item->district_id ==
                                                    $form->district) {{"selected"}} @endif >
                                                    {{$item->district_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label">ตำบล</label>
                                        <div class="col-sm-4">
                                            <select name="sub_district" class="form-control-sl"
                                                id="subdistrict">
                                                <option value="">เลือกตำบล</option>
                                                @foreach ($sub as $item)
                                                <option value="{{$item->subdistrict_id}}" @if($item->subdistrict_id ==
                                                    $form->sub_district) {{"selected"}} @endif >
                                                    {{$item->subdistrict_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">ในฐานะ</label>
                                        <div class="col-sm-8 checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="radio" value="1" name="position" class="posti"
                                                    {{$form->position == '1' ? "checked" : ""}}>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                            </label>
                                            <label class="col-sm-3 col-form-label">ผู้ประสบภัย</label>
                                            <label>
                                                <input type="radio" value="2" name="position" class="posti"
                                                    {{$form->position == '2' ? "checked" : ""}}>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                            </label>
                                            <label class="col-sm-3 col-form-label">เจ้าของทรัพย์สิน</label>
                                            <label>
                                                <input type="radio" value="3" name="position" class="posti"
                                                    {{$form->position == '3' ? "checked" : ""}}>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                            </label>
                                            <label class="col-sm-3 col-form-label">ผู้ครอบครองทรัพย์สิน</label>
                                            <div class="col-sm-1"></div>
                                            <label>
                                                <input type="radio" value="4" name="position" class="posti1 posti"
                                                    {{$form->position == '4' ? "checked" : ""}}>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                            </label>
                                            <label
                                                class="col-sm-8 col-form-label">ทายาทโดยธรรมของผู้ประสบภัย/เจ้าของทรัพย์สิน/ผู้ครอบครองทรัพย์สิน</label>
                                            <input class="col-sm-12 form-text-checkbox other 
                                                                        tposti1 posti" type="text" name="position_text"
                                                placeholder="ชื่อทายาทโดยธรรมของผู้ประสบภัย/เจ้าของทรัพย์สิน/ผู้ครอบครองทรัพย์สิน"
                                                value="{{$form->position_text}}">
                                            <div class="col-sm-1"></div>
                                            <label>
                                                <input type="radio" value="5" name="position" class="posti2 posti"
                                                    {{$form->position == '5' ? "checked" : ""}}>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            </label>
                                            <label
                                                class="col-sm-8 col-form-label">ผู้รับมอบอำนาจของผู้ประสบภัย/เจ้าของทรัพย์สิน/ผู้ครอบครองทรัพย์สิน</label>
                                            <input class="col-sm-12 form-text-checkbox other
                                                                        tposti2 posti" type="text" name="position_text"
                                                placeholder="ชื่อผู้รับมอบอำนาจของผู้ประสบภัย/เจ้าของทรัพย์สิน/ผู้ครอบครองทรัพย์สิน"
                                                value="{{$form->position_text2}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 col-form-label">ได้รับผลกระทบจากเหตุการณ์</label>
                                        <div class="col-sm-3">
                                            <select name="risk_id" class="form-control-sl" value="{{$form->risk_id}}">
                                                <option value="">เลือกประเภทสาธารณภัย</option>
                                                @foreach ($risk as $item)
                                                <option value="{{$item->risk_id}}" @if($item->risk_id ==
                                                    $form->risk_id) {{"selected"}} @endif >
                                                    {{$item->risk_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label"> อื่น ๆ </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="risk_name"
                                                placeholder="หากเลือกอื่น ๆ (โปรดระบุ)" value="{{$form->risk_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">เมื่อวันที่
                                            (ที่เกิดสาธารณภัย)</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="guaranty_event_date"
                                                value="{{$form->guaranty_event_date}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">เวลา </label>
                                        <div class="col-sm-3">
                                            <input type="Time" class="form-control" name="guaranty_event_time"
                                                value="{{$form->guaranty_event_time}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">ได้รับความเสียหาย
                                            ดังนี้</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <label class="col-sm-1 col-form-label">(๑)</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="risk_detail1"
                                                value="{{$form->risk_detail1}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <label class="col-sm-1 col-form-label">(๒)</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="risk_detail2"
                                                value="{{$form->risk_detail2}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <label class="col-sm-1 col-form-label">(๓)</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="risk_detail3"
                                                value="{{$form->risk_detail3}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-3 col-form-label">ข้อ 2
                                            ข้าพเจ้าขอยื่นคำขอต่อ</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="request_at"
                                                value="{{$form->request_at}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label
                                            class="col-sm-3 col-form-label">ขอให้ออกหนังสือรับรองไว้เป็นหลักฐานเพื่อ</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="evidence"
                                                value="{{$form->evidence}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-8 col-form-label">โดยได้แนบเอกสารหลักฐานประกอบการพิจารณา
                                            ปรากฏดังนี้ (ใส่เครื่องหมาย <i class="fa fa-check"></i> ใน
                                            <i class="fa fa-square-o"> </i>
                                            หน้าข้อความที่ต้องการ)</label>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10 checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="1" name="status" {{$form->status == '1' ? "checked" : ""}}>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            </label>
                                            <label class="col-sm-11 col-form-label">
                                                ๑. หลักฐานแสดงสถานภาพความเป็นบุคคลธรรมดา
                                                หรือนิติบุคคล</label>
                                            <!-- **** -->
                                            <div class="form-group row">
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-10 checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="radio" value="1" class="chk" name="person"
                                                            {{$form->person == '1' ? "checked" : ""}}>
                                                        <span class="cr"><i
                                                                class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    </label>
                                                    <label class="col-sm-11 col-form-label">บุคคลธรรมดา</label>
                                                    <!-- ---- -->
                                                    <div class="form-group row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-9 checkbox-fade fade-in-primary">
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch1"
                                                                    name="natural_person1" {{$form->natural_person1 == '1' ? "checked" : ""}}>
                                                                <span class="cr">
                                                                    <i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                </span>
                                                            </label>
                                                            <label class="col-sm-11 col-form-label">สำเนาบัตรประชาชน
                                                                หรือสำเนาทะเบียนบ้าน
                                                                หรือเอกสารอื่นใดที่ทางราชการออกให้</label>
                                                            <div class="col-sm-1"></div>
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch1"
                                                                    name="natural_person2"
                                                                    {{$form->natural_person2 == '1' ? "checked" : ""}}>
                                                                <span class="cr"><i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                            </label>
                                                            <label class="col-sm-11 col-form-label">สำเนาทะเบียนพาณิชยน์
                                                                (ถ้ามี)</label>
                                                            <div class="col-sm-1"></div>
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch1"
                                                                    name="natural_person3"
                                                                    {{$form->natural_person3 == '1' ? "checked" : ""}}>
                                                                <span class="cr"><i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                            </label>
                                                            <label class="col-sm-2 col-form-label">
                                                                อื่น ๆ</label>
                                                            <input class="col-sm-7 form-text-checkbox other"
                                                                type="text" name="natural_person_text"
                                                                placeholder="อื่น ๆ (โปรดระบุ)"
                                                                value="{{$form->natural_person_text}}">
                                                        </div>
                                                    </div>
                                                    <!-- ---- -->
                                                    <label>
                                                        <input type="radio" value="2" class="chk" name="person"
                                                            {{$form->person == '2' ? "checked" : ""}}>
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                    </label>
                                                    <label class="col-sm-11 col-form-label">นิติบุคคล</label>
                                                    <!-- ---- -->
                                                    <div class="form-group row">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-9 checkbox-fade fade-in-primary">
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch2"
                                                                    name="juristic_person1"
                                                                    {{$form->juristic_person1 == '1' ? "checked" : ""}}>
                                                                <span class="cr"><i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                            </label>
                                                            <label
                                                                class="col-sm-11 col-form-label">สำเนาหนังสือรับรองนิติบุคคล</label>
                                                            <div class="col-sm-1"></div>
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch2"
                                                                    name="juristic_person2"
                                                                    {{$form->juristic_person2 == '1' ? "checked" : ""}}>
                                                                <span class="cr"><i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                            </label>
                                                            <label
                                                                class="col-sm-11 col-form-label">สำเนาหนังสือบริคณห์สนธิ
                                                                (ถ้ามี)</label>
                                                            <div class="col-sm-1"></div>
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch2"
                                                                    name="juristic_person3"
                                                                    {{$form->juristic_person3 == '1' ? "checked" : ""}}>
                                                                <span class="cr"><i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                            </label>
                                                            <label
                                                                class="col-sm-11 col-form-label">สำเนาวัตถุประสงค์ของห้างหุ้นส่วน
                                                                (ถ้ามี)</label>
                                                            <div class="col-sm-1"></div>
                                                            <label>
                                                                <input type="checkbox" value="1" class="ch2"
                                                                    name="juristic_person4"
                                                                    {{$form->juristic_person4 == '1' ? "checked" : ""}}>
                                                                <span class="cr"><i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                            </label>
                                                            <label class="col-sm-2 col-form-label">
                                                                อื่น ๆ</label>
                                                            <input class="col-sm-7 form-text-checkbox other" type="text"
                                                                name="juristic_text" placeholder="อื่น ๆ (โปรดระบุ)"
                                                                value="{{$form->juristic_text}}">
                                                        </div>
                                                    </div>
                                                    <!-- ---- -->
                                                </div>
                                            </div>
                                            <!-- **** -->
                                            <label>
                                                <input type="checkbox" value="1" name="evidence_in"
                                                    {{$form->evidence_in == '1' ? "checked" : ""}}>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            </label>
                                            <label class="col-sm-11 col-form-label">๒.
                                                หลักฐานเอกสารแสดงสิทธิ</label>
                                            <div class="col-sm-1"></div>
                                            <label>
                                                <input type="checkbox" value="1" name="authorize"
                                                    {{$form->authorize == '1' ? "checked" : ""}}>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            </label>
                                            <label class="col-sm-11 col-form-label">๓.
                                                หนังสือมอบอำนาจ (ถ้ามี)</label>
                                            <div class="col-sm-1"></div>
                                            <label>
                                                <input type="checkbox" value="1" name="witnesses"
                                                    {{$form->witnesses == '1' ? "checked" : ""}}>
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            </label>
                                            <label class="col-sm-11 col-form-label">๔.
                                                เอกสารการสอบสวนพยาน (ถ้ามี)</label>
                                            <div class="col-sm-1"></div>
                                            <label>
                                                <input type="checkbox" value="1" name="other" class="other5"
                                                    {{$form->other == '1' ? "checked" : ""}}>
                                                <span class="cr">
                                                    <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                </span>
                                            </label>
                                            <label class="col-sm-2 col-form-label">๕. อื่น
                                                ๆ</label>
                                            <input class="col-sm-8 form-text-checkbox other" name="other_text"
                                                type="text" placeholder="อื่น ๆ (โปรดระบุ)"
                                                value="{{$form->other_text}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <label class="col-sm-1 col-form-label">รวม</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total"
                                                value="{{$form->total}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">ฉบับ</label>
                                    </div><br>
                                    <hr><br>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label
                                            class="col-sm-5 col-form-label">ข้าพเจ้าขอรับรองว่าข้อความดังกล่าวข้างต้นเป็นความจริงทุกประการ</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5"></div>
                                        <label class="col-sm-1 col-form-label">(ลงชื่อ)</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="name_confirm"
                                                value="{{$form->name_confirm}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">ผู้ยื่นคำขอ</label>
                                    </div><br>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-11 col-form-label"><b>คำเตือน</b>
                                            ผู้ใดแจ้งความอันเป็นเท็จ
                                            แก่เจ้าพนักงานมีความผิดมาตราประมวลผลกฎหมายอาญา มาตรา
                                            ๑๓๗ มาตรา ๒๖๗ และมาตรา ๒๖๘</label>
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-10 col-form-label"><u>หมายเหตุ</u>
                                            ในกรณีผู้ประสบภัย หรือเจ้าของทรัพย์สิน
                                            หรือผู้ครอบครองทรัพย์สิน ถึงแก่ความตาย
                                            หรือไม่สามารถยื่นคำขอได้ด้วยตนเอง
                                            ให้ทายาทโดยธรรมผู้จัดการมรดก
                                            หรือผู้รับมอบอำนาจของผู้นั้น
                                            แล้วแต่กรณีเป้นผู้ยื่นคำขอ
                                            พร้อมแสดงหลักฐานการเป็นทายาท ผู้จัดการมรดก
                                            และการมอบอำนาจดังกล่าวด้วย</label>
                                    </div><br>
                                    <hr><br>

                                    <div class="form-group row">
                                        <div class="col-sm-11">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button class="btn btn-info me-md-2 btn-form" type="submit"><i
                                                        class='fa fa-save'></i>บันทึก</button>
                                                <a href="/request/certificate_request"><button
                                                        class="btn btn-secondary btn-form" type="button"><i
                                                            class='fa fa-close'></i>ปิด</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Content End-->
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
