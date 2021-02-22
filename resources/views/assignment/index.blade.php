{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>มอบหมายงาน</h5>
        </div>
        <div class="card-block">
            <a href="assignment/show">แสดงมอบหมายงานทั้งหมด</a>
            <a href="assignment/create" class="btn btn-primary m-b-20"> + เพิ่มมอบหมายงาน</a>
            <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>งาน</th>
                            <th>วันที่</th>
                            <th>แสดงรายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($assign as $row)
                        <tr>
                            <td>{{ $i }}</td>
    <td>{{ $row->assignment_name }}</td>
    <td>{{ $row->created_at }}</td>
    <td>
        <a href="assignment/detail_assing" class="btn btn-primary">รายละเอียด</a>
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
                <i class="fa fa-sticky-note-o bg-c-blue"></i>
                <div class="d-inline">
                    <h5>ข้อมูลการมอบหมายงาน</h5>
                    <span>System Assignment Information</span>
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
                                <h5>ข้อมูลการมอบหมายงาน / Assignment Information</h5>
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
                            <div class="dt-responsive table-responsive">
                                <div class="card-block">
                                    {{-- <a href="assignment/show">แสดงมอบหมายงานทั้งหมด</a> --}}
                                    <a href="/assignment/create">
                                        <button class="btn btn-success btn-center" type="button"><i
                                                class='fa fa-plus'></i>เพิ่มมอบหมายงาน</button>
                                    </a>
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>งาน</th>
                                                    <th>วันที่</th>
                                                    <th>แสดงรายละเอียด</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach($assign as $row)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        <div class="text-left">
                                                            {{mb_substr($row->assign_name,0,30, 'UTF-8')}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ date('d-m-Y',strtotime($row->assign_date_start)) }}</td>
                                                    <td>
                                                        <a href="assignment/detail_assing/{{$row->assign_id}}" 
                                                            class="btn btn-warning btn-center"><i
                                                                class='fa fa-search'></i>รายละเอียด</a>
                                                    </td>
                                                    <td>
                                                        <a href="assignment/edit/{{$row->assign_id}}"
                                                            class="btn btn-primary">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ url('/assigndestroy',$row->assign_id) }}"
                                                            method="post">
                                                            @csrf
                                                            {{-- <input type="submit" value="ลบ"
                                                                data-name="{{ $row->assign_name }}"
                                                                class="btn btn-danger deleteForm"> --}}
                                                                <button type="submit" class="btn btn-danger deleteForm"
                                                                    data-name="{{ $row->assign_name }}">
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
                                                    <th width="100px">งาน</th>
                                                    <th width="100px">วันที่</th>
                                                    <th width="50px">แสดงรายละเอียด</th>
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
