@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-sticky-note-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลวันลา</h5>
                        <span>System Leave Information</span>
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
                            <h5>แก้ไขข้อมูลวันลา / Edit Leave Information</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                    </li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-block">
                            @if ($errors->all())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            @if (session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                            @endif
                            <form method="POST" action="/updateleave/{{$leave->leave_id}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">หัวข้อ :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="leave_name" id="name" class="form-control"
                                            placeholder="หัวข้อ" value="{{$leave->leave_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">รายละเอียด :</label>
                                    <div class="col-sm-10">
                                        <textarea name="leave_detail" id="detail" cols="30" rows="10"
                                            class="form-control"
                                            placeholder="รายละเอียด">{{$leave->leave_detail}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ประเภทลาหยุด :</label>
                                    <div class="col-sm-10">
                                        <select name="leave_type" class="form-control">
                                            <option value="1" @if($leave->leave_type == 1 ) selected
                                                @endif >ลาป่วย</option>
                                            <option value="2" @if($leave->leave_type == 2 ) selected
                                                @endif>ลาคลอดบุตร</option>
                                            <option value="3" @if($leave->leave_type == 3 ) selected
                                                @endif>ลาไปช่วยเหลือภรรยาที่คลอดบุตร
                                            </option>
                                            <option value="4" @if($leave->leave_type == 4 ) selected
                                                @endif>ลากิจส่วนตัว</option>
                                            <option value="5" @if($leave->leave_type == 5 ) selected
                                                @endif>ลาพักผ่อน</option>
                                            <option value="6" @if($leave->leave_type == 6 ) selected
                                                @endif>ลาอุปสมบท</option>
                                            <option value="7" @if($leave->leave_type == 7 ) selected
                                                @endif>
                                                ลาเข้ารับการคัดเลือกหรือเข้ารับการเตรียมพล</option>
                                            <option value="8" @if($leave->leave_type == 8 ) selected
                                                @endif>ลาไปศึกษา
                                                ฝึกอบรม
                                                ดูงาน หรือปฏิบัตรการวิจัย</option>
                                            <option value="9" @if($leave->leave_type == 9 ) selected
                                                @endif>
                                                ลาไปปฏิบัติงานในองค์การระหว่างประเทศ</option>
                                            <option value="10" @if($leave->leave_type == 10 ) selected
                                                @endif>ลาติดตามคู่สมรส</option>
                                            <option value="11" @if($leave->leave_type == 11 ) selected
                                                @endif>ลาไปฟื้นฟูสมรรถภาพด้านอาชีพ
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">วันลาเริ่มต้น :</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="bithday" name="leave_date_start"
                                            value="{{$leave->leave_date_start}}">
                                    </div>
                                    <label class="col-sm-2 col-form-label">วันลาสิ้นสุด :</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="bithday" name="leave_date_end"
                                            value="{{$leave->leave_date_end}}">
                                    </div>
                                </div>
                                
                                <input type="hidden" name="leave_status" value="{{$leave->leave_status}}">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                    class='fa fa-plus'></i>บันทึก</button>
                                            <a href="/leavement/leave"><button class="btn btn-secondary btn-form"
                                                    type="button"><i class='fa fa-close'></i>ปิด</button></a>
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
