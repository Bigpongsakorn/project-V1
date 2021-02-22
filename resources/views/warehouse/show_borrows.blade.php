@if($user_status != 1 && $user_status != 2 && $user_status != 3)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')

</script>
@else
{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
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
                                    <h5>ยืม/คืน อุปกรณ์ / Borrow/Return Information</h5>
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
                                        <h5>{{$warehouse->equip_name}}</h5>
                                        <div class="dt-responsive table-responsive">
                                            <table id="multi-colum-dt"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>วันที่ยืม</th>
                                                        <th>จำนวนที่ยืม</th>
                                                        <th>หน่วย</th>
                                                        <th>ชื่อ</th>
                                                        <th>นามสกุล</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($sum as $row)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>
                                                            {{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                                        <td class="td-right">{{ $row->amount }} </td>
                                                        <td class="text-left">
                                                            @if ($row->equip_unit == 1)
                                                            ชิ้น
                                                            @elseif($row->equip_unit == 2)
                                                            อัน
                                                            @elseif($row->equip_unit == 3)
                                                            ชุด
                                                            @else
                                                            เครื่อง
                                                            @endif
                                                        </td>
                                                        <td class="text-left">{{ $row->staff_fname }}</td>
                                                        <td class="text-left">{{ $row->staff_lname }}</td>
                                                    </tr>
                                                    @php $i++ @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="30px">ลำดับ</th>
                                                        <th width="100px">วันที่ยืม</th>
                                                        <th width="20px">จำนวนที่ยืม</th>
                                                        <th width="20px">หน่วย</th>
                                                        <th width="100px">ชื่อ</th>
                                                        <th width="100px">นามสกุล</th>
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
    </div
    @endsection
    @endauth
