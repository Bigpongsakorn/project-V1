{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <h1>เพิ่มพื้นที่เสียงภัย</h1>

    <form action="/insertlocat" method="post">
        @csrf
        <div>
            <p>ตำแหน่งพื้นที่เสี่ยง(ปักหมุด)</p>
            <input type="text" name="user_id" value="{{$id}}">
    <input type="text" name="location_name" placeholder="ปักหมุด">
</div>
<div>
    <p>รายละเอียด</p>
    <textarea name="location_detail" id="" cols="30" rows="5"></textarea>
</div>
<div>
    <input type="submit" value="ตกลง" class="btn btn-primary btnSuccess">
    <input type="reset" value="ยกเลิก">
</div>
</form>
<a href="/risk/index_locat">กลับ</a> --}}

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="fa fa-asterisk bg-c-blue"></i>
                <div class="d-inline">
                    <h5>ข้อมูลตำแหน่งพื้นที่เสี่ยงภัย</h5>
                    <span>System Location Risk Information</span>
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
                        <h5>เพิ่มข้อมูลตำแหน่งพื้นที่เสี่ยงภัย / Add Location Risk Information</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                </li>
                                <li><i class="feather icon-maximize full-card"></i></li>
                                <li><i class="feather icon-minus minimize-card"></i></li>
                                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                <li><i class="feather icon-trash close-card"></i></li>
                                <li><i class="feather icon-chevron-left open-card-option"></i>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-block">
                        @if (session('alert'))
                        <div class="alert alert-danger">
                            {{ session('alert') }}
                        </div>
                        @endif
                        <form action="/insertarea" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ตำแหน่งพื้นที่เสี่ยง(ปักหมุด) :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="area_name" class="form-control" placeholder="ปักหมุด">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">รายละเอียด :</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" name="location_name" class="form-control"
                                            placeholder="ปักหมุด"> --}}
                                    <textarea name="area_detail" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ประเภท :</label>
                                <div class="col-sm-3">
                                    <select name="risk_id" class="form-control-select">
                                        <option value=" ">ประเภทภัย</option>
                                        @foreach ($risk as $item)
                                        <option value="{{$item->risk_id}}">{{$item->risk_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">หมู่บ้าน :</label>
                                <div class="col-sm-3">
                                    <select name="village_id" class="form-control-select">
                                        <option value=" ">เลือกหมู่บ้าน</option>
                                        @foreach ($vill as $item)
                                        <option value="{{$item->village_id}}">{{$item->village_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit">
                                            <i class='fa fa-plus'></i>เพิ่ม</button>
                                        <a href="/danger_area/index_area"><button class="btn btn-secondary btn-form"
                                                type="button"><i class='fa fa-close'></i>ปิด</button>
                                        </a>
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
