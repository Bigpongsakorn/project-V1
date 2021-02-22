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
                                <h5>ข้อมูลเอกสาร / Documents</h5>
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
                                    <a href="/download/create">
                                        <button class="btn btn-success btn-center" type="button"><i
                                                class='feather icon-file-plus'></i>เพิ่มข้อมูลเอกสาร</button>
                                    </a>
                                    <div class="dt-responsive table-responsive">
                                        <table id="multi-colum-dt"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อเอกสาร</th>
                                                    <th>ขนาดเอกสาร</th>
                                                    <th>วันที่อัปโหลดข้อมูล</th>
                                                    <th>โหลดเอกสาร</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach ($data as $item )
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td class="text-left">{{ $item->file_name }}</td>
                                                    <td class="text-right">{{ $item->file_size / 1000 }} KB</td>
                                                    <td>{{ date('d-m-Y',strtotime($item->created_at)) }}</td>
                                                    <td>
                                                        <a href="/upload/file/{{ $item->file_name }}"
                                                            class="btn btn-primary" download>
                                                            <i class="feather icon-download"></i>
                                                            ดาวน์โหลด
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('download.destroy',$item->file_id) }}"
                                                            method="post">
                                                            @csrf @method('DELETE')
                                                            {{-- <input type="submit" value="ลบ"
                                                                data-name="{{ $item->file_name }}"
                                                                class="btn btn-danger deleteForm"> --}}
                                                            <button type="submit" class="btn btn-danger deleteForm"
                                                                data-name="{{ $item->file_name }}">
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
                                                    <th width="100px">ชื่อเอกสาร</th>
                                                    <th width="100px">ขนาดเอกสาร</th>
                                                    <th width="50px">วันที่ใส่เอกสาร</th>
                                                    <th width="20px">โหลดเอกสาร</th>
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