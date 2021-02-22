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
                            <div class="card-header">
                                <h5>แบบคำร้องทั่วไป / General Request Form</h5>
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
                                    <a href="/request/general_request_insert">
                                        <button class="btn btn-success btn-center" type="button"><i
                                                class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                    </a>
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>หัวเรื่อง</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>วันที่</th>
                                                    <th>พิมพ์เอกสาร</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach ($form as $item )
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td class="text-left">{{$item->general_title}}</td>
                                                    <td class="text-left">{{$item->user_name}}</td>
                                                    <td>{{ date('d-m-Y',strtotime($item->general_date)) }}</td>
                                                    <td>
                                                        <a href="{{url('PDF/general',$item->general_id)}}"
                                                            class="btn btn-warning">
                                                            <span class="fa fa-print"></span> พิมพ์เอกสาร</a>
                                                    </td>
                                                    <td>
                                                        <a href="/request/general_request_edit/{{$item->general_id}}"
                                                            class="btn btn-primary m-b-20"><span
                                                                class="fa fa-edit"></span> แก้ไข</a>
                                                    </td>
                                                    <td>
                                                        <form action="/destroygenral/{{$item->general_id}}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger deleteForm"
                                                                data-name="{{ $item->general_title }}">
                                                                <span class="fa fa-trash"></span> ลบ
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
                                                    <th width="100px">หัวเรื่อง</th>
                                                    <th width="50px">ชื่อผู้แจ้ง</th>
                                                    <th width="50px">วันที่</th>
                                                    <th width="50px">พิมพ์เอกสาร</th>
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

@endsection
