{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>รายละเอียด กำนดการ</h5>
        </div>
        <div class="card-block"> --}}
            {{-- @if($user_status == 1) --}}
            {{-- <a href="/assignment/schedule/create_schedule" class="btn btn-primary m-b-20"> เพิ่มข้อมูล</a> --}}
            {{-- <button type="button" id="addRow" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</button> --}}
            {{-- @endif --}}
            {{-- <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อหัวข้อ</th>
                            <th>รายละเอียด</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($sche as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->schedule_name}}</td>
                            <td>{{$row->schedule_detail}}</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
    
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
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>ข้อมูลกำหนดการ / Schedule Information</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
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
                                        <a href="/assignment/schedule/create_schedule">
                                            <button class="btn btn-success btn-center" type="button"><i
                                                    class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                        </a>
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อหัวข้อ</th>
                                                        <th>รายละเอียด</th>
                                                        <th>วันที่</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach($sche as $row)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$row->schedule_name}}</td>
                                                        <td>{{$row->schedule_detail}}</td>
                                                        <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                                    </tr>
                                                    @php $i++ @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="30px">ลำดับ</th>
                                                        <th width="100px">ชื่อหัวข้อ</th>
                                                        <th width="100px">รายละเอียด</th>
                                                        <th width="50px">วันที่</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
