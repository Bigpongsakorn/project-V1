{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div>
        <h3>แจ้งกำนดการ</h3>
    </div>
    <form method="POST" action="/createschedule" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            หัวข้อ
            <input type="text" name="schedule_name" id="name" class="form-control" placeholder="หัวข้อ">
        </div>
        <div class="form-group">
            รายละเอียด
            <textarea name="schedule_detail" id="detail" cols="30" rows="10" class="form-control"
                placeholder="รายละเอียด"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="บันทึก" class="btn btn-primary btnSuccess">
            <a href="/assignment/schedule" class="btn btn-success">กลับ</a>
        </div>
    </form> --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-sticky-note-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลกำหนดการ</h5>
                        <span>System Schedule Information</span>
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
                            <h5>เพิ่มข้อมูลกำหนดการ / Add Schedule Information</h5>
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
                            <form method="POST" action="/createschedule" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">หัวข้อ :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="schedule_name" id="name" class="form-control"
                                            placeholder="หัวข้อ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">รายละเอียด :</label>
                                    <div class="col-sm-10">
                                        <textarea name="schedule_detail" id="detail" cols="30" rows="10"
                                            class="form-control" placeholder="รายละเอียด"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                    class='fa fa-plus'></i>บันทึก</button>
                                            <a href="/assignment/schedule"><button class="btn btn-secondary btn-form"
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
