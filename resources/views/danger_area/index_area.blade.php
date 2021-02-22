@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-asterisk bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลตำแหน่งพื้นที่เสี่ยงภัย</h5>
                        <span>System Location Risk Information</span>
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
                                    <h5>ข้อมูลตำแหน่งพื้นที่เสี่ยงภัย / Location Risk Information</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt">
                                                <i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dt-responsive table-responsive">
                                    <div class="card-block">
                                        <a href="/danger_area/create">
                                            <button class="btn btn-success btn-center" type="button">
                                                <i class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                        </a>
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ตำแหน่ง</th>
                                                        <th>รายละเอียด</th>
                                                        <th>ประเภทภัย</th>
                                                        <th>เขต</th>
                                                        <th>แก้ไข</th>
                                                        <th>ลบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                @foreach ($area as $item)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$item->area_name}}</td>
                                                    <td>{{$item->area_detail}}</td>
                                                    <td>{{$item->risk_name}}</td>
                                                    <td>{{$item->village_name}}</td>
                                                    {{-- <td>ดูรายละเอียด</td> --}}
                                                    <td>
                                                        <a href="/danger_area/edit_area/{{$item->area_id}}"
                                                            class="btn btn-primary m-b-20">
                                                            <span class="fa fa-edit"></span></a>
                                                    </td>
                                                    <td>
                                                        <form action="/deletearea/{{$item->area_id}}" method="post">
                                                            @csrf
                                                            {{-- <input type="submit" value="ลบ"
                                                                data-name="{{ $item->area_name }}"
                                                                class="btn btn-danger deleteForm"> --}}
                                                            <button type="submit" class="btn btn-danger deleteForm"
                                                                data-name="{{ $item->area_name }}">
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
                                                        <th width="100px">ตำแหน่ง</th>
                                                        <th width="100px">รายละเอียด</th>
                                                        <th width="50x">ประเภทภัย</th>
                                                        <th width="50x">เขต</th>
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
