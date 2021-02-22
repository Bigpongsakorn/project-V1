@if($user_status != 1)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')

</script>
@else
{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- @if($errors->all())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
    </li>
    @endforeach
    </ul>
    @endif --}}
    {{-- <h1>เพิ่มอุปกรณ์</h1>
    {!! Form::open(['action'=>[ 'WarehouseController@update',$data->equip_id],'method'=>'PUT']) !!}
    <div class="col-md-6">
        <h3>แก้ไขข้อมูล</h3>
        <div>
            ชื่ออุปกรณ์
            {!! Form::text('equip_name',$data->equip_name,["class"=>""]) !!}
        </div>
        <div>
            ราคา
            {!! Form::number('equip_price',$data->equip_price,["class"=>""]) !!}
        </div>
        <div>
            จำนวน
            {!! Form::number('equip_amount',$data->equip_amount,["class"=>""]) !!}
            ชิ้น
        </div>
        <div>
            ซ้อมแซม
            {!! Form::number('equip_status',$data->equip_status,["class"=>""]) !!}
        </div>
        <br>
        <input type="submit" value="อัพเดต" class="btn btn-primary btnSuccess">
        <a href="/warehouse" class="btn btn-success">กลับ</a>
    </div>
    {!! Form::close() !!} --}}

    {{-- -------------------------------------------------------------- --}}

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
                            <h5>แก้ไขข้อมูลอุปกรณ์ / Edit Device Information</h5>
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
                            {!! Form::open(['action'=>[
                            'WarehouseController@update',$data->equip_id],'method'=>'PUT'])!!}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ชื่ออุปกรณ์ :</label>
                                <div class="col-sm-10">
                                    {!! Form::text('equip_name',$data->equip_name,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ราคา :</label>
                                <div class="col-sm-10">
                                    {!! Form::number('equip_price',$data->equip_price,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">จำนวน :</label>
                                <div class="col-sm-10">
                                    {!! Form::number('equip_amount',$data->equip_amount,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">หน่วย :</label>
                                <div class="col-sm-10">
                                    <select class="form-control js-example-tokenizer" name="equip_unit">
                                        {{-- old --}}
                                        {{-- <option value="{{$data->equip_unit}}" @if($data->equip_unit ==
                                            $data->equip_unit) {{"selected"}} @endif >{{$data->equip_unit}}
                                        </option>
                                        <option value="1">ชิ้น</option>
                                        <option value="2">อัน</option>
                                        <option value="3">ชุด</option>
                                        <option value="4">เครื่อง</option> --}}
                                        {{-- new --}}
                                        <option value="1" @if($data->equip_unit == 1 ) selected @endif>ชิ้น</option>
                                        <option value="2" @if($data->equip_unit == 2 ) selected @endif>อัน</option>
                                        <option value="3" @if($data->equip_unit == 3 ) selected @endif>ชุด</option>
                                        <option value="4" @if($data->equip_unit == 4 ) selected @endif>เครื่อง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ซ้อมแซม :</label>
                                <div class="col-sm-10">
                                    {!! Form::number('equip_fix',$data->equip_fix,["class"=>"form-control"]) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ประเภทอุปกรณ์ :</label>
                                <div class="col-sm-10">
                                    <select class="form-control js-example-tokenizer" name="equip_type">
                                        {{-- old --}}
                                        {{-- @foreach ($category as $item)
                                        <option value="{{$item->categoryw_id}}" @if($item->categoryw_id ==
                                            $data->categoryw_id) {{"selected"}} @endif >
                                            {{$item->categoryw_name}}
                                        </option>
                                        @endforeach --}}
                                        {{-- new --}}
                                        <option value="1" @if($data->equip_type == 1 ) selected @endif>วัสดุคงทน
                                        </option>
                                        <option value="2" @if($data->equip_type == 2 ) selected @endif>วัสดุสิ้นเปลื้อง
                                        </option>
                                        <option value="3" @if($data->equip_type == 3 ) selected
                                            @endif>วัสดุอุปกรณ์ประกอบและอะไหล่</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                class='fa fa-plus'></i>บันทึก</button>
                                        <a href="{{url('/warehouse/index')}}"><button class="btn btn-secondary btn-form" type="button"><i
                                                    class='fa fa-close'></i>ปิด</button></a>
                                    </div>
                                </div>
                            </div>
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
