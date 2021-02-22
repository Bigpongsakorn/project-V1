@if($user_status != 1 && $user_status != 2 && $user_status != 3)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')
</script>
@else

{{-- หน้ายืมอุปกรณ์ --}}

{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
    @endif
    {{-- <form method="POST" action="/addborroow" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h1>
                <p>อุปกรณ์ที่ต้องการยืม</p>
                {{$data->equip_name}}
            </h1>
            <input type="hidden" name="equip_id" value="{{$data->equip_id}}">
        </div>
        <input type="hidden" name="user_id" value="{{$id}}">
        <div class="form-group">
            จำนวน
            <input type="number" name="borrow_amount" class="form-control">
            ชิ้น
        </div>
        <div class="form-group">
            รายละเอียด
            <textarea name="borrow_title" id="title" cols="30" rows="10" class="form-control"
                placeholder="รายละเอียด"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="บันทึก" class="btn btn-primary btnSuccess">
            <a href="/warehouse/borrows" class="btn btn-success">กลับ</a>
        </div>
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
                            <h5>ยืมข้อมูลอุปกรณ์ / Borrow Device Information</h5>
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
                            <form method="POST" action="/addborroow" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row">
                                 <h3 class="col-sm-12" > {{$data->equip_name}} </h3>
                                    <input type="hidden" name="equip_id" value="{{$data->equip_id}}">
                                    <input type="hidden" name="staff_id" value="{{$id}}">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">จำนวน :</label>
                                <div class="col-sm-10">
                                    <input type="number" name="borrow_amount" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">รายละเอียด :</label>
                                <div class="col-sm-10">
                                    <textarea name="borrow_detail" id="title" cols="30" rows="10" class="form-control"
                                        placeholder="รายละเอียด"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                class='fa fa-plus'></i>บันทึก</button>
                                        <a href="/warehouse/borrows"><button class="btn btn-secondary btn-form"
                                                type="button"><i
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
@endif
