{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <h1>เพิ่มข้อมูลประเภทความเสี่ยงภัย</h1>

    <form action="/updaterisk/{{$risk->risk_id}}" method="post">
        @csrf
        ประเภทความเสี่ยง
        <input type="text" name="risk_name" value="{{$risk->risk_name}}">
        <input type="submit" value="ตกลง" class="btn btn-primary btnSuccess">
        <input type="reset" value="ยกเลิก">
    </form> --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-asterisk bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลประเภทความเสี่ยงภัย</h5>
                        <span>System Risk Type Information</span>
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
                            <h5>แก้ไขข้อมูลประเภทความเสี่ยงภัย / Edit Risk Type Information</h5>
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
                            <form action="/updaterisk/{{$risk->risk_id}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ชื่อประเภทความเสี่ยง :</label>
                                    <div class="col-sm-10">
                                        {{-- <input type="hidden" name="user_id" value="{{$id}}"> --}}
                                        <input type="text" name="risk_name" class="form-control"
                                            value="{{$risk->risk_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                    class='fa fa-plus'></i>ตกลง</button>
                                            <a href="/risk"><button class="btn btn-secondary btn-form" type="button"><i
                                                        class='fa fa-close'></i>ปิด</button></a>
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