@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>คลังอุปกรณ์</h5>
        </div>
        <div class="card-block">
            @if($user_status == 1)
            <a href="/warehouse/create_category" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</a>
            @endif
            <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อประเภทอุปกรณ์</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($category as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->categoryw_name}}</td>
                            <td>
                                <a href="/warehouse/edit_category/{{$row->categoryw_id}}"
                                    class="btn btn-primary">แก้ไข</a>
                                
                            </td>
                            <td>
                                <form action="/deletecategory/{{$row->categoryw_id}}" method="post">
                                    @csrf 
                                    <input type="submit" value="ลบ" data-name="{{ $row->categoryw_name }}"
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
                    <i class="fa fa-fire-extinguisher bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลอุปกรณ์</h5>
                        <span>System Device Information</span>
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
                                    <h5>ข้อมูลประเภทอุปกรณ์ / Device Type Information</h5>
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
                                <div class="card-block">
                                    <a href="/warehouse/create_category">
                                        <button class="btn btn-success btn-center" type="button"><i
                                                class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                    </a>

                                    <div class="dt-responsive table-responsive">
                                        <table id="multi-colum-dt"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อประเภทอุปกรณ์</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @php $i = 1 @endphp
                                                 @foreach ($category as $row)
                                                 <tr>
                                                     <td>{{$i}}</td>
                                                     <td>{{$row->categoryw_name}}</td>
                                                     <td>
                                                         <a href="/warehouse/edit_category/{{$row->categoryw_id}}"
                                                             class="btn btn-primary">แก้ไข</a>

                                                     </td>
                                                     <td>
                                                         <form action="/deletecategory/{{$row->categoryw_id}}"
                                                             method="post">
                                                             @csrf
                                                             <input type="submit" value="ลบ"
                                                                 data-name="{{ $row->categoryw_name }}"
                                                                 class="btn btn-danger deleteForm">
                                                         </form>
                                                     </td>
                                                 </tr>
                                                 @php $i++ @endphp
                                                 @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="30px">ลำดับ</th>
                                                    <th width="100px">ชื่อประเภทอุปกรณ์</th>
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