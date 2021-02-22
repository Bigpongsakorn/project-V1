@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>งานที่มอบหมายแล้ว</h5>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>หัวข้องาน</th>
                            <th>รายละเอียดงาน</th>
                            <th>วันที่</th>
                            <th>เจ้าหน้าที่ที่รับผิดชอบ</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($assign as $row)
                        <tr>
                            <td>{{$i}}</td>
    <td>{{$row->assignment_name}}</td>
    <td>
        <div style="width:200px;white-space: normal;">
            {{nl2br(e($row->assignment_detail))}}
        </div>
    </td>
    <td>{{$row->created_at}}</td>
    <td>{{$row->user_fname}} {{$row->user_lname}}</td>
    <td>
        @if($row->assignment_status != 1 )
        <div class="bg-danger p-10">
            ยังไม่ได้ทำ
        </div>
        @else
        <div class="bg-success p-10">
            ทำเสร็จแล้ว
        </div>
        @endif
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
                                    <div class="dt-responsive table-responsive">
                                        <table id="multi-colum-dt"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>หัวข้องาน</th>
                                                    <th>รายละเอียดงาน</th>
                                                    <th>วันที่</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach($assign as $row)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td class="text-left">
                                                        {{mb_substr($row->assign_name,0,20, 'UTF-8')}}
                                                    </td>
                                                    <td class="text-left">
                                                        {{mb_substr($row->assign_detail,0,20, 'UTF-8')}}
                                                    </td>
                                                    <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                                    <td class="text-left">{{$row->staff_fname}}</td>
                                                    <td class="text-left">{{$row->staff_lname}}</td>
                                                    <td>
                                                        @if($row->assign_status != 1 )
                                                        <div class="bg-danger p-10">
                                                            ยังไม่ได้ทำ
                                                        </div>
                                                        @else
                                                        <div class="bg-success p-10">
                                                            ทำเสร็จแล้ว
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php $i++ @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="30px">ลำดับ</th>
                                                    <th width="100px">หัวข้องาน</th>
                                                    <th width="150px">รายละเอียดงาน</th>
                                                    <th width="50px">วันที่</th>
                                                    <th width="20px">ชื่อ</th>
                                                    <th width="20px">นามสกุล</th>
                                                    <th width="20px">สถานะ</th>
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
