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
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>ข้อมูลวันลา / Leave Information</h5>
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
                                            <li><i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dt-responsive table-responsive">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <div class="col-sm-12">
                                                <label class="col-sm-3 col-form-label-head">หัวข้อ : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{$leave->leave_name}}
                                                </label>
                                                <label class="col-sm-3 col-form-label-head">รายละเอียด : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{$leave->leave_detail}}
                                                </label>
                                                <label class="col-sm-3 col-form-label-head">ประเภทการลา : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    @if ($leave->leave_type == 1)
                                                    ลาป่วย
                                                    @elseif ($leave->leave_type == 2)
                                                    ลาคลอดบุตร
                                                    @elseif ($leave->leave_type == 3)
                                                    ลาไปช่วยเหลือภรรยาที่คลอดบุตร
                                                    @elseif ($leave->leave_type == 4)
                                                    ลากิจส่วนตัว
                                                    @elseif ($leave->leave_type == 5)
                                                    ลาพักผ่อน
                                                    @elseif ($leave->leave_type == 6)
                                                    ลาอุปสมบท
                                                    @elseif ($leave->leave_type == 7)
                                                    ลาเข้ารับการคัดเลือกหรือเข้ารับการเตรียมพล
                                                    @elseif ($leave->leave_type == 8)
                                                    ลาไปศึกษา ฝึกอบรม ดูงาน หรือปฏิบัตรการวิจัย
                                                    @elseif ($leave->leave_type == 9)
                                                    ลาไปปฏิบัติงานในองค์การระหว่างประเทศ
                                                    @elseif ($leave->leave_type == 10)
                                                    ลาติดตามคู่สมรส
                                                    @else
                                                    ลาไปฟื้นฟูสมรรถภาพด้านอาชีพ
                                                    @endif
                                                </label>
                                                <label class="col-sm-3 col-form-label-head">วันลาเริ่มต้น : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{date('d-m-Y',strtotime($leave->leave_date_start))}}
                                                </label>
                                                <label class="col-sm-3 col-form-label-head">วันลาสิ้นสุด : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{date('d-m-Y',strtotime($leave->leave_date_end))}}
                                                </label>
                                                <label class="col-sm-3 col-form-label-head">สถานะ : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    @if( $leave->leave_status == 0 )
                                                    <div>
                                                        รออนุมัติ
                                                    </div>
                                                    @elseif( $leave->leave_status == 1 )
                                                    <div>
                                                        อนุมัติ
                                                    </div>
                                                    @else
                                                    <div>
                                                        ไม่อนุมัติ เนื่องจาก {{$leave->leave_reason}}
                                                    </div>
                                                    @endif
                                                </label>
                                                 @if( $leave->leave_status == 1 )
                                                <label class="col-sm-3 col-form-label">
                                                <a href="{{url('PDF/leave',$leave->leave_id)}}"
                                                    class="btn btn-primary">พิมพ์เอกสาร</a>
                                                </label>
                                                @endif
                                            </div>
                                        </div>
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
