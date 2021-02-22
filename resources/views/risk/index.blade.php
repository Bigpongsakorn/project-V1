{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>ประเภทความเสี่ยงภัย</h5>
        </div>
        <div class="card-block"> --}}
            {{-- @if($user_status == 1) --}}
            {{-- <a href="/risk/create_risk" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</a> --}}
            {{-- @endif --}}
            {{-- <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ประเภทความเสี่ยง</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>วันที่</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($risk as $item )
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->risk_name}}</td>
                            <td>{{$item->user_fname}} {{$item->user_lname}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="/risk/edit_risk/{{$item->risk_id}}" class="btn btn-primary m-b-20">แก้ไข</a>
                            </td>
                            <td>
                                <form action="/destroy/{{$item->risk_id}}" method="post">
                                    @csrf
                                    <input type="submit" value="ลบ" data-name="{{ $item->risk_name }}"
                                        class="btn btn-danger deleteForm">
                                </form>
                            </td>
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
                    <i class="fa fa-asterisk bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลประเภทความเสี่ยงภัย</h5>
                        <span>System Risk Information</span>
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
                                    <h5>ข้อมูลประเภทความเสี่ยงภัย / Risk Information</h5>
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
                                        <a href="/risk/create_risk">
                                            <button class="btn btn-success btn-center" type="button"><i
                                                    class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                        </a>
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ประเภทความเสี่ยง</th>
                                                        {{-- <th>ชื่อ</th>
                                                        <th>นามสกุล</th> --}}
                                                        <th>วันที่</th>
                                                        <th>แก้ไข</th>
                                                        <th>ลบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($risk as $item )
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td class="text-left">{{$item->risk_name}}</td>
                                                        {{-- <td class="text-left">{{$item->staff_fname}}</td>
                                                        <td class="text-left">{{$item->staff_lname}}</td> --}}
                                                        <td>{{ date('d-m-Y',strtotime($item->created_at)) }}</td>
                                                        <td>
                                                            <a href="/risk/edit_risk/{{$item->risk_id}}"
                                                                class="btn btn-primary m-b-20"><span
                                                                    class="fa fa-edit"></span></a>
                                                        </td>
                                                        <td>
                                                            <form action="/destroyriks/{{$item->risk_id}}" method="post">
                                                                @csrf
                                                                {{-- @method('DELETE') --}}
                                                                {{-- <input type="submit" value="ลบ"
                                                                    data-name="{{ $item->risk_name }}"
                                                                    class="btn btn-danger deleteForm"> --}}
                                                                <button type="submit"
                                                                    class="btn btn-danger deleteForm"
                                                                    data-name="{{ $item->risk_name }}">
                                                                    <span class="fa fa-trash"></span>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @php $i++ @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="30px">ลำดับ</th>
                                                        <th width="100px">ประเภทความเสี่ยง</th>
                                                        {{-- <th width="100px">ชื่อ</th>
                                                        <th width="100px">นามสกุล</th> --}}
                                                        <th width="50px">วันที่</th>
                                                        <th width="20px">แก้ไข</th>
                                                        <th width="20px">ลบ</th>
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
