@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-asterisk bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลการปฏิบัติงาน</h5>
                        <span>System Operation Type Information</span>
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
                            <h5>เพิ่มข้อมูลการปฏิบัติงาน / Add Operation Information</h5>
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
                            @if ($errors->all())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            <form action="/#" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ชื่อการปฏิบัติการ :</label>
                                    <div class="col-sm-10">
                                        {{-- <input type="hidden" name="staff_id" value="{{$id}}"> --}}
                                        <input type="text" name="operation_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">รายละเอียดปฏิบัติการ :</label>
                                    <div class="col-sm-10">
                                        <textarea name="operation_detail" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ประเภทเหตุ :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="operation_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ยืมอุปกรณ์ :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="borrow_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">รูปภาพ :</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="operation_pic" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                    class='fa fa-plus'></i>เพิ่ม</button>
                                            <a href="/risk"><button class="btn btn-secondary btn-form" type="button"><i
                                                        class='fa fa-close'></i>ปิด</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="/nextuser" method="post">
                                @csrf
                                {{-- <input type="text" value="{{$staff_id}}" name="staff_id"> --}}
                                {{-- <input type="text" value="{{$no->ems_id}}" name="ems_id"> --}}
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">ส่งรายงาน</button>
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
