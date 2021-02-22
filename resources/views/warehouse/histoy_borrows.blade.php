@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>ประวัติการยืม {{$warehouse->equip_name}}</h5>
</div>
<div class="card-block">
    <div class="dt-responsive table-responsive">
        <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>วันที่</th>
                    <th>รายละเอียด</th>
                    <th>จำนวน</th>
                    <th>ชื่อ - นามสกุล</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1 @endphp
                @foreach ($user as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->borrow_title}}</td>
                    <td>{{$item->borrow_amount}} ชิ้น</td>
                    <td>{{$item->user_fname}} {{$item->user_lname}}</td>
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
                                <h5 class="text-borrow">ประวัติการยืม {{$warehouse->equip_name}} / Borrowing History
                                    Information</h5>
                                <h5 class="text-return">ประวัติการคืน {{$warehouse->equip_name}} / Return History
                                    Information</h5>
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
                                    <div>
                                        <button class="btn btn-primary borrow-btn">ยืม</button>
                                        <button class="btn btn-danger return-btn">คืน</button>
                                    </div>
                                    <div class="dt-responsive table-responsive">
                                        <div class="table-return">
                                            <table id="multi-colum-dt"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>วันที่</th>
                                                        <th>รายละเอียด</th>
                                                        <th>จำนวน</th>
                                                        <th>หน่วย</th>
                                                        <th>ชื่อ</th>
                                                        <th>นามสกุล</th>
                                                        <th>ตำแหน่ง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1 @endphp
                                                    @foreach ($borrow as $item)
                                                    <tr class="borrow">
                                                        <td>{{$i}}</td>
                                                        <td>{{date('d-m-Y',strtotime($item->borrow_date))}}</td>
                                                        <td class="text-left">{{$item->borrow_detail}}</td>
                                                        <td class="text-right">{{$item->borrow_amount}}</td>
                                                        <td class="text-left">
                                                            @if ($item->equip_unit == 1)
                                                            ชิ้น
                                                            @elseif($item->equip_unit == 2)
                                                            อัน
                                                            @elseif($item->equip_unit == 3)
                                                            ชุด
                                                            @else
                                                            เครื่อง
                                                            @endif
                                                        </td>
                                                        <td class="text-left">{{$item->staff_fname}}</td>
                                                        <td class="text-left">{{$item->staff_lname}}</td>
                                                        <td class="text-left">
                                                            @if($item->staff_position == '1')
                                                            เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย
                                                            @elseif($item->staff_position == '2')
                                                            พนักงานดับเพลิง
                                                            @elseif($item->staff_position == '3')
                                                            พนักงานขับรถยนต์
                                                            @elseif($item->staff_position == '4')
                                                            พนักงานขับเครื่องจักรกลขนาดเบา
                                                            @elseif($item->staff_position == '5')
                                                            พนักงานสูบน้ำ
                                                            @else
                                                            คนงานป้องกันและบรรเทาสาธารณภัย
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php $i++ @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="30px">ลำดับ</th>
                                                        <th width="100px">วันที่</th>
                                                        <th width="100px">รายละเอียด</th>
                                                        <th width="50px">จำนวน</th>
                                                        <th width="50px">หน่วย</th>
                                                        <th width="20px">ชื่อ</th>
                                                        <th width="20px">นามสกุล</th>
                                                        <th width="20px">ตำแหน่ง</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="table-return2">
                                            <table id="multi-colum-dt2"
                                                class="table table-striped table-bordered nowrap td-center">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>วันที่</th>
                                                        <th>รายละเอียด</th>
                                                        <th>จำนวน</th>
                                                        <th>หน่วย</th>
                                                        <th>ชื่อ</th>
                                                        <th>นามสกุล</th>
                                                        <th>ตำแหน่ง</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $j = 1 @endphp
                                                    @foreach ($return as $item)
                                                    <tr>
                                                        <td>{{$j}}</td>
                                                        <td>{{date('d-m-Y',strtotime($item->return_date))}}</td>
                                                        <td class="text-left">{{$item->return_detail}}</td>
                                                        <td class="text-right">{{$item->return_amount}}</td>
                                                        <td class="text-left">
                                                            @if ($item->equip_unit == 1)
                                                            ชิ้น
                                                            @elseif($item->equip_unit == 2)
                                                            อัน
                                                            @elseif($item->equip_unit == 3)
                                                            ชุด
                                                            @else
                                                            เครื่อง
                                                            @endif
                                                        </td>
                                                        <td class="text-left">{{$item->staff_fname}} </td>
                                                        <td class="text-left">{{$item->staff_lname}}</td>
                                                        <td class="text-left">
                                                            @if($item->staff_position == '1')
                                                            เจ้าพนักงานป้องกันและบรรเทาสาธารณภัย
                                                            @elseif($item->staff_position == '2')
                                                            พนักงานดับเพลิง
                                                            @elseif($item->staff_position == '3')
                                                            พนักงานขับรถยนต์
                                                            @elseif($item->staff_position == '4')
                                                            พนักงานขับเครื่องจักรกลขนาดเบา
                                                            @elseif($item->staff_position == '5')
                                                            พนักงานสูบน้ำ
                                                            @else
                                                            คนงานป้องกันและบรรเทาสาธารณภัย
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php $j++ @endphp
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th width="30px">ลำดับ</th>
                                                        <th width="100px">วันที่</th>
                                                        <th width="100px">รายละเอียด</th>
                                                        <th width="50px">จำนวน</th>
                                                        <th width="50px">หน่วย</th>
                                                        <th width="20px">ชื่อ</th>
                                                        <th width="20px">นามสกุล</th>
                                                        <th width="20px">ตำแหน่ง</th>
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
</div>
@endsection
