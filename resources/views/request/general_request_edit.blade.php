@extends('layouts.main-layout')
@section('content')

<!-- content Head Start-->
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
<!-- content Head End-->

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <!-- Header Start-->
                            <div class="card-header">
                                <h5>แก้ไข แบบคำร้องทั่วไป / Edit General Request Form</h5>
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
                            <!-- Header End-->

                            <!-- Content Start-->
                            <div class="card-block">
                                <form method="POST" action="/update_general/{{$request->general_id}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-1">
                                            <label class="col-form-label">เขียนที่ </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="write_at"
                                                value="{{$request->write_at}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-1">
                                            <label class="col-form-label">วันที่ </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="general_date"
                                                value="{{$request->general_date}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">เรื่อง </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="general_title"
                                                value="{{$request->general_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">เรียน </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="mention"
                                                value="{{$request->mention}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">ข้าพเจ้า </label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" placeholder="ชื่อ - นามสกุล"
                                                name="user_name" value="{{$request->user_name}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">อายุ </label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="age"
                                                value="{{$request->age}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">ปี </label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">อยู่บ้านเลขที่</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="home_num"
                                                value="{{$request->home_num}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">หมู่บ้าน</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="moo"
                                                value="{{$request->moo}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">หมู่ที่</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" name="moo_num"
                                                value="{{$request->moo_num}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">ถนน</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="road"
                                                value="{{$request->road}}">
                                        </div>
                                        <label class="col-sm-1 col-form-label">จังหวัด</label>
                                        <div class="col-sm-4">
                                            <select name="province" class="form-control-sl" id="province">
                                                @foreach ($pro as $item)
                                                <option value="{{$item->province_id}}" @if($item->province_id ==
                                                    $request->province) {{"selected"}} @endif>
                                                    {{$item->province_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-1 col-form-label">อำเภอ</label>
                                        <div class="col-sm-4">
                                            <select name="district" class="form-control-sl" id="district">
                                                @foreach ($dis as $item)
                                                <option value="{{$item->district_id}}" @if($item->district_id ==
                                                    $request->district) {{"selected"}} @endif >
                                                    {{$item->district_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="col-sm-1 col-form-label">ตำบล</label>
                                        <div class="col-sm-4">
                                            <select name="sub_district" class="form-control-sl" id="subdistrict">
                                                @foreach ($sub as $item)
                                                <option value="{{$item->subdistrict_id}}" @if($item->subdistrict_id ==
                                                    $request->sub_district) {{"selected"}} @endif >
                                                    {{$item->subdistrict_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์ที่ติดต่อได้</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tel"
                                                value="{{$request->tel}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 col-form-label">มีความประสงค์</label>
                                        <div class="col-sm-8">
                                            <textarea rows="5" class="form-control"
                                                name="wish">{{$request->wish}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <label class="col-sm-3 col-form-label">จึงเรียนมาเพื่อโปรดพิจารณา</label>
                                    </div>
                                    <br>
                                    <hr><br>
                                    <div class="form-group row">
                                        <div class="col-sm-5"></div>
                                        <label class="col-sm-1 col-form-label">(ลงชื่อ)</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="sign"
                                                value="{{$request->sign}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5"></div>
                                        <label class="col-sm-1 col-form-label">ตำแหน่ง</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" placeholder="ถ้ามี" name="position"
                                                value="{{$request->position}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-11">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button class="btn btn-info me-md-2 btn-form" type="submit">
                                                    <i class='fa fa-save'></i>บันทึก</button>
                                                <a href="/request/general_request"><button
                                                        class="btn btn-secondary btn-form"
                                                        type="button"><i
                                                            class='fa fa-arrow-circle-left'></i>กลับหน้าก่อนหน้า</button></a>
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
@endsection
