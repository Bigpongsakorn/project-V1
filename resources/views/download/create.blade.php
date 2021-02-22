@if($user_status == 1 || $user_status == 3)
@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file-text bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>เอกสารดาวน์โหลด</h5>
                        <span>Download Documents</span>
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
                                    <h5>เพิ่มข้อมูลเอกสาร / Add Documents</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt">
                                                <i class="feather icon-chevron-left open-card-option"></i>
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
                                            <form action="/downloadupload" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-6">
                                                    <input type="file" name="file_name" class="form-control">
                                                    <input type="hidden" name="file_size">
                                                    <input type="hidden" name="staff_id" value="{{$id}}">
                                                </div>
                                                {{-- <div class="col-md-6" class="form-control">
                                                    <button type="submit" class="btn btn-success btnSuccess">บันทึก</button>
                                                </div> --}}
                                                    <div class="col-sm-12">
                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                            <button class="btn btn-info me-md-2 btn-form btnSuccess"
                                                                type="submit">
                                                                <i class='fa fa-plus'></i>เพิ่ม</button>
                                                            <a href="/download/detail"><button
                                                                    class="btn btn-secondary btn-form" type="button"><i
                                                                        class='fa fa-close'></i>ปิด</button>
                                                            </a>
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
            </div>
        </div>
    </div>
</div>
@endsection
@else
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')
</script>
@endif