@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-newspaper-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลประชาสัมพันธ์</h5>
                        <span>System News Information</span>
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
                                    <h5>ข้อมูลประชาสัมพันธ์ / News Information</h5>
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
                                        <a href="/blog/create">
                                            <button class="btn btn-success btn-center" type="button"><i
                                                    class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                        </a>
                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>หัวข้อข่าว</th>
                                                        <th>วันที่</th>
                                                        <th>ดูรายละเอียด</th>
                                                        <th>แก้ไข</th>
                                                        <th>ลบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($news as $item )
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td class="text-left">
                                                            {{ mb_substr($item->news_name,0,30, 'UTF-8') }}
                                                        </td>
                                                        <td>{{ date('d-m-Y',strtotime($item->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{url('/blog/show',$item->news_id)}}"
                                                                class="btn btn-warning">
                                                                รายละเอียด
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{url('/blog/edit',$item->news_id)}}"
                                                                class="btn btn-primary">
                                                                <span class="fa fa-edit"></span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('/blogdestroy',$item->news_id) }}"
                                                                method="post">
                                                                @csrf
                                                                {{-- <input type="submit" value="ลบ"
                                                                    data-name="{{ $item->news_name }}"
                                                                    class="btn btn-danger deleteForm"> --}}
                                                                <button type="submit" class="btn btn-danger deleteForm"
                                                                    data-name="{{ $item->news_name }}">
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
                                                        <th width="50px">หัวข้อข่าว</th>
                                                        <th width="50px">วันที่</th>
                                                        <th width="100px">ดูรายละเอียด</th>
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