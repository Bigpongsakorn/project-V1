@extends('layouts.file.file-layout')
@section('content')

<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">

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
                                                    <h5>แบบรายงานเหตุด่วนสาธารณภัย / Emergency Report Form</h5>
                                                    <div class="card-header-right">
                                                        <ul class="list-unstyled card-option">
                                                            <li class="first-opt"><i
                                                                    class="feather icon-chevron-left open-card-option"></i>
                                                            </li>
                                                            <li><i class="feather icon-maximize full-card"></i></li>
                                                            <li><i class="feather icon-minus minimize-card"></i>
                                                            </li>
                                                            <li><i class="feather icon-refresh-cw reload-card"></i>
                                                            </li>
                                                            <li><i class="feather icon-trash close-card"></i></li>
                                                            <li><i
                                                                    class="feather icon-chevron-left open-card-option"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-block p-b-0">
                                                    <form action="/insert_ems_online" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">ด่วนที่สุด ที่
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="เลขหนังสือ" name="disaster_no">
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <label class="col-form-label">วันที่ </label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="date" class="form-control"
                                                                    name="disaster_date">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">จาก </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    placeholder="นายก อบต..../นายกเทศมนตรี...."
                                                                    name="disaster_form">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">ถึง </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    placeholder="นายอำเภอ...." name="disaster_to">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">1. ชนิดของภัย
                                                            </label>
                                                            <div class="col-sm-3">
                                                                <select name="select" class="form-control-sl"
                                                                    name="risk_id">
                                                                    <option value="opt1">ชนิดของภัย</option>
                                                                    <option value="opt2">Type 2</option>
                                                                    <option value="opt3">Type 3</option>
                                                                    <option value="opt4">Type 4</option>
                                                                    <option value="opt5">Type 5</option>
                                                                </select>
                                                                <!-- <input type="text" class="form-control"> -->
                                                            </div>
                                                            <label class="col-sm-1 col-form-label"> อื่น ๆ </label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control"
                                                                    placeholder="หากเลือกอื่น ๆ (โปรดระบุ)"
                                                                    name="disaster_risk">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label
                                                                class="col-sm-3 col-form-label">ความรุนแรงและลักษณะของภัย
                                                            </label>
                                                            <div class="col-sm-5 col-form-label">
                                                                <div class="form-radio">
                                                                        <div class="radio radio-inline">
                                                                            <label><input type="radio"
                                                                                    name="disaster_severity"
                                                                                    checked="checked"><i
                                                                                    class="helper"></i>เล็กน้อย</label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <label><input type="radio"
                                                                                    name="disaster_severity"><i
                                                                                    class="helper"></i>ปานกลาง</label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <label><input type="radio"
                                                                                    name="disaster_severity"><i
                                                                                    class="helper"></i>รุนเเรง</label>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">ลักษณะของภัย </label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    name="disaster_look">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">2. ภัยเกิดวันที่
                                                            </label>
                                                            <div class="col-sm-4">
                                                                <input type="date" class="form-control"
                                                                    name="disaster_date_start">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">เวลา </label>
                                                            <div class="col-sm-3">
                                                                <input type="Time" class="form-control"
                                                                    name="disaster_time_start">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">ภัยสิ้นสุดวันที่
                                                            </label>
                                                            <div class="col-sm-4">
                                                                <input type="date" class="form-control"
                                                                    name="disaster_date_end">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">เวลา </label>
                                                            <div class="col-sm-3">
                                                                <input type="Time" class="form-control"
                                                                    name="disaster_time_end">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-2 col-form-label">3. สถานที่เกิดภัย
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control"
                                                                    name="disaster_location">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-10 col-form-label">4.
                                                                ราษฎรที่ประสบภัย</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">4.1
                                                                ราษฎรได้รับความเดือดร้อน</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_people">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คน</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_home">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ครัวเรือน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">4.2 บาดเจ็บ</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_injured">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">4.3 เสียชีวิต</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_die">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">4.4 สูญหาย</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_lost">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">4.5
                                                                อพยพไปยังพื้นที่ปลอดภัย</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_migrate">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คน</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_move">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ครัวเรือน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-10 col-form-label">5.
                                                                พื้นที่ประสบภัยและความเสียหาย</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-9 col-form-label">5.1
                                                                อาคารสิ่งก่อสร้าง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label"> บ้านพักอาศัย</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_home_num">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">หลัง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">อาคารสูงตั้งแต่ 23
                                                                เมตรขึ้นไป</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_building">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">อาคาร</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">โรงงาน</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_factory">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">แห่ง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">วัด</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_temple">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">แห่ง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">สถานที่ราชการ</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_gover">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">แห่ง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">อื่น ๆ</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="อื่น ๆ (โปรดระบุ)"
                                                                    name="disaster_damaged">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label
                                                                class="col-sm-3 col-form-label">ความเสียหายประมาณ</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_damage_price">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">บาท</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-9 col-form-label">5.2
                                                                พื้นที่และทรัพย์สินทางการเกษตร</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">พืชไร่</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_plants">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ไร่</label>
                                                            <label class="col-sm-1 col-form-label">นา</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_field">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ไร่</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">สวน</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_garden">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ไร่</label>
                                                            <label class="col-sm-1 col-form-label">บ่อปลา</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_fish">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">บ่อ</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">บ่อกุ้ง</label>
                                                            <div class="col-sm-6">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_shrimp">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">บ่อ</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-9 col-form-label">สัตว์เลี้ยง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">โค</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_cow">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ตัว</label>
                                                            <label class="col-sm-1 col-form-label">สุกร</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_pig">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ตัว</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">เป็ด/ไก่</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_duck">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ตัว</label>
                                                            <label class="col-sm-1 col-form-label">อื่น ๆ</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"
                                                                    placeholder="อื่น ๆ (โปรดระบุ)"
                                                                    name="disaster_animal">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label
                                                                class="col-sm-3 col-form-label">ความเสียหายประมาณ</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_animal_price">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">บาท</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-9 col-form-label">5.3
                                                                สิ่งสาธารณประโยชน์</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">ถนน</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_road">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">สาย</label>
                                                            <label class="col-sm-1 col-form-label">สะพาน</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_bridge">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">แห่ง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">คอสะพาน</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_bridgehead">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">แห่ง</label>
                                                            <label class="col-sm-1 col-form-label">ฝาย</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_weir">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">แห่ง</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">อื่น ๆ</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="อื่น ๆ (โปรดระบุ)"
                                                                    name="disaster_other">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label
                                                                class="col-sm-3 col-form-label">ความเสียหายประมาณ</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_public_price">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">บาท</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-2"></div>
                                                            <label
                                                                class="lb-b col-sm-3 col-form-label">รวมความเสียหายเบื้องต้นประมาณ</label>
                                                            <div class="col-sm-4">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_total_price">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">บาท</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-9 col-form-label">6.
                                                                การบรรเทาภัย</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">เทศบาล/อบต.</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ชื่อหน่วยงาน"
                                                                    name="disaster_municipality">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label
                                                                class="col-sm-6 col-form-label">ได้ดำเนินการสำรวจและตรวจสอบความเสียหายเพื่อให้ความช่วยเหลือราษฎรในเบื้องต้นแล้ว</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-9 col-form-label">7.
                                                                เครื่องมือ/อุปกรณ์ที่ใช้</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">รถดับเพลิง</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_firecar">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คัน</label>
                                                            <label class="col-sm-2 col-form-label">รถบรรทุกน้ำ</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_watercar">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คัน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">รถกู้ภัย</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_rescue">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คัน</label>
                                                            <label class="col-sm-2 col-form-label">รถบรรทุก</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_truck">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">คัน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">เรือ</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_boat">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ลำ</label>
                                                            <label class="col-sm-2 col-form-label">เครื่องสูบน้ำ</label>
                                                            <div class="col-sm-1">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_waterpump">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">เครื่องมือ</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-1 col-form-label">อื่น ๆ</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="อื่น ๆ (โปรดระบุ)"
                                                                    name="disaster_tool">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">7.1
                                                                ส่วนราชการ</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_govern_total">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">หน่วยงาน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-2 col-form-label">7.2
                                                                เอกชน/ประชาชน</label>
                                                            <div class="col-sm-5">
                                                                <input type="number" class="form-control"
                                                                    name="disaster_volunteer">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">กลุ่ม/คน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-1"></div>
                                                            <label class="col-sm-9 col-form-label">8.
                                                                การดำเนินงานของส่วนราชการ</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <label class="col-sm-3 col-form-label">หน่วยอาสาสมัคร
                                                                มูลนิธิในพื้นที่</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-8 checkbox-fade fade-in-primary">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr"><i
                                                                            class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                </label>
                                                                <label class="col-sm-3 col-form-label">ส่วนราชการอื่น
                                                                    (ชื่อ)</label>
                                                                <input class="col-sm-8 form-control" type="text"
                                                                    naem="disaster_government">
                                                                <div class="col-sm-1"></div>
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr"><i
                                                                            class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                </label>
                                                                <label class="col-sm-3 col-form-label">ภาคเอกชน
                                                                    (ชื่อ)</label>
                                                                <input class="col-sm-8 form-text-checkbox" type="text"
                                                                    name="disaster_private">
                                                            </div>
                                                        </div><br>
                                                        <hr><br>
                                                        <div class="form-group row">
                                                            <div class="col-sm-5"></div>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control"
                                                                    name="user_name">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">ผู้รายงาน</label>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-5"></div>
                                                            <label class="col-sm-2 col-form-label">นายกเทศมนตรี/นายก
                                                                อบต.</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" class="form-control"
                                                                    name="user_name_type"
                                                                    placeholder="ตำแหน่งผู้รายงาน พร้อมชื่อหน่วยงาน">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-7"></div>
                                                            <label
                                                                class="col-sm-2 col-form-label">ผู้อำนวยการท้องถิ่น</label>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-11">
                                                                <div
                                                                    class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                                    <button class="btn btn-info me-md-2 btn-form"
                                                                        type="submit"><i
                                                                            class='fa fa-save'></i>บันทึก</button>
                                                                    <a href="/download/fill"><button
                                                                            class="btn btn-secondary btn-form"
                                                                            type="button"><i
                                                                                class='fa fa-arrow-circle-left'></i>กลับหน้าก่อนหน้า</button></a>
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
                </div>

                <div id="styleSelector">
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
