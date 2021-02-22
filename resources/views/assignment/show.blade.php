@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-sticky-note-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลการมอบหมายงาน</h5>
                        <span>System Assignment Information</span>
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
                                    <h5>ข้อมูลการมอบหมายงาน / Assignment Information</h5>
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
                                            <label class="col-sm-2 col-form-label-user">
                                                หัวข้องาน : 
                                            </label>
                                            <label class="col-sm-8 col-form-label-head">
                                                {{$assign->assign_name}}
                                            </label>
                                            <label class="col-sm-2 col-form-label-head">
                                                รายละเอียดงาน : 
                                            </label>
                                            <label class="col-sm-8 col-form-label">
                                                {{$assign->assign_detail}}
                                            </label>
                                            <label class="col-sm-2 col-form-label-head">
                                                วันที่เริ่ม :
                                            </label>
                                            <label class="col-sm-8 col-form-label">
                                                {{ date('d-m-Y',strtotime($assign->assign_date_start)) }}
                                            </label>
                                            <label class="col-sm-2 col-form-label-head">
                                                วันที่สิ้นสุด :
                                            </label>
                                            <label class="col-sm-8 col-form-label">
                                                {{ date('d-m-Y',strtotime($assign->assign_date_end)) }}
                                            </label>
                                            {{-- <label class="col-sm-2 col-form-label-head">
                                                สามาชิกทีม :
                                            </label>
                                            <label class="col-sm-8 col-form-label">
                                                นาย A นาย B
                                            </label> --}}
                                            <label class="col-sm-2 col-form-label">
                                                <button class="btn btn-warning">ออกรายงาน</button>
                                            </label>
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
