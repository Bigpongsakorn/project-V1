@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-newspaper-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลประชาสัมพันธ์</h5>
                        <span>System News Information</span>
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
                            <h5>เพิ่มข้อมูลข้อมูลประชาสัมพันธ์ / Add News Information</h5>
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
                            @if (session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                            @endif
                            <form action="/updatenews/{{$blog->news_id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">หัวข้อ :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="news_name" class="form-control"
                                            value="{{$blog->news_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">รายละเอียด :</label>
                                    <div class="col-sm-10">
                                        <textarea name="news_detail" cols="30" rows="10"
                                            class="form-control">{{$blog->news_detail}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">รูปภาพ :</label>
                                    <div class="col-sm-10">
                                            <img src="../../upload/news/{{$blog->news_pic}}"
                                                style="width:50%">
                                        <input type="file" class="form-control" name="news_pic" >
                                    </div>
                                </div>
                                <input type="hidden" value="{{$staff_id}}" name="staff_id">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                    class='fa fa-plus'></i>บันทึก</button>
                                            <a href="/blog/index">
                                                <button class="btn btn-secondary btn-form" type="button">
                                                    <i class='fa fa-close'></i>ปิด
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
