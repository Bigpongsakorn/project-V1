@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-bell bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>แจ้งเหตุฉุกเฉิน</h5>
                        <span>System Notification Information</span>
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
                                    <h5>ข้อมูลแจ้งเหตุฉุกเฉิน / Notification Information</h5>
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
                                        <div class="dt-responsive table-responsive">
                                            <table id="order-table"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ประเภทภัย</th>
                                                        <th>รายละเอียด</th>
                                                        <th>เบอร์โทร</th>
                                                        <td>วันที่</td>
                                                        <th>รายละเอียด</th>
                                                        <th>สถานะ</th>
                                                        <th>ลบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($notifiy as $item)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td class="text-left">
                                                            {{$item->risk_name}}
                                                        </td>
                                                        <td class="text-left">{{$item->ems_detail}}</td>
                                                        <td class="text-left">{{$item->general_tel}}</td>
                                                        <td>{{ date('d-m-Y',strtotime($item->created_at)) }}</td>
                                                        <td>
                                                            <a href="/notification/detail/{{$item->ems_id}}"
                                                                class="btn btn-warning">รายละเอียด</a>
                                                        </td>
                                                        <td>
                                                            @if ($item->confirm == 1)
                                                            <div
                                                                style="background-color:#2ed8b6;padding:5px;color:#fff">
                                                                ตรวจสอบแล้ว
                                                            </div>
                                                            @elseif($item->confirm == 2)
                                                            <div
                                                                style="background-color:#ffb64d;padding:5px;color:#fff">
                                                                กำลังตรวจสอบ
                                                            </div>
                                                            @else
                                                            <div
                                                                style="background-color:#ff5370;padding:5px;color:#fff">
                                                                ยังไม่ได้ตรวจสอบ
                                                            </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form action="/destroy/{{$item->ems_id}}" method="post">
                                                                @csrf
                                                                {{-- @method('DELETE') --}}
                                                                {{-- <input type="submit" value="ลบ"
                                                                    data-name="{{ $item->risk_id }}"
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
                                                        <th width="100px">ประเภทภัย</th>
                                                        <th width="100px">รายละเอียด</th>
                                                        <th width="50px">เบอร์โทร</th>
                                                        <th width="20px">วันที่</th>
                                                        <th width="20px">รายละเอียด</th>
                                                        <th width="20px">สถานะ</th>
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
