@if($user_status != 1)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')

</script>
@else
{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- @if ($errors->all())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
    @endif --}}
    
    {{-- <form> --}}
    {{-- {!! Form::open(['action' => 'WarehouseController@store','method'=>'POST']) !!}
    <div class="form-row">
        <div class="col">
            ชื่ออุปกรณ์
            <input type="text" class="form-control" name="equip_name" placeholder="Name">
        </div>
        <div class="col">
            ราคา
            <input type="text" class="form-control" name="equip_price" placeholder="price">
        </div>
        <div class="col">
            จำนวน
            <input type="text" class="form-control" name="equip_amount" placeholder="amount">
            ชิ้น
        </div>
        <div class="col">
            ประเภทอุปกรณ์
            <input type="text" class="form-control" name="equip_status" placeholder="status">
            <select class="form-control js-example-tokenizer" name="categoryw_id" >
                @foreach ($category as $item)
                <option value="{{$item->categoryw_id}}" >{{$item->categoryw_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
                สถานะ
                <input type="text" class="form-control" name="equip_status" placeholder="status">
            </div>
    </div>
    <br>
    <div>
        <input type="submit" value="บันทึก" class="btn btn-primary btnSuccess">
        <input type="reset" value="ยกเลิก" class="btn btn-success">
    </div>
    {!! Form::close() !!}
    </form> --}}

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="fa fa-fire-extinguisher bg-c-blue"></i>
                <div class="d-inline">
                    <h5>ข้อมูลอุปกรณ์</h5>
                    <span>System Device Information</span>
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
                        <h5>เพิ่มข้อมูลอุปกรณ์ / Add Device Information</h5>
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
                        {!! Form::open(['action' => 'WarehouseController@store','method'=>'POST']) !!}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ชื่ออุปกรณ์ :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="equip_name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ราคา :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="equip_price" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">จำนวน :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="equip_amount" placeholder="Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">หน่วยของอุปกรณ์ :</label>
                            <div class="col-sm-10">
                                <select class="form-control js-example-tokenizer" name="equip_unit">
                                    <option value="1">ชิ้น</option>
                                    <option value="2">อัน</option>
                                    <option value="3">ชุด</option>
                                    <option value="4">เครื่อง</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ประเภทอุปกรณ์ :</label>
                            <div class="col-sm-10">
                                <select class="form-control js-example-tokenizer" name="equip_type">
                                    <option value="1">วัสดุคงทน</option>
                                    <option value="2">วัสดุสิ้นเปลื้อง</option>
                                    <option value="3">วัสดุอุปกรณ์ประกอบและอะไหล่</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                            class='fa fa-plus'></i>เพิ่ม</button>
                                    <a href="{{url('/warehouse/index')}}"><button class="btn btn-secondary btn-form" type="button"><i
                                                class='fa fa-close'></i>ปิด</button></a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="staff_id" value="{{$user_id}}">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
@endauth
