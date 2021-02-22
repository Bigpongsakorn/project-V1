{{-- list อุปกรณ์ --}}
@if($user_status != 1 && $user_status != 2 && $user_status != 3)
<script>
    alert('คุณไม่มีสิทธิ์ใช้งานในหน้านี้')

</script>
@else
{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>ยืม / คืน อุปกรณ์</h5>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
</div>
@endif
<table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>อันดับ</th>
            <th>ชื่ออุปกรณ์</th>
            <th>ประเภทอุปกรณ์</th>
            <th>จำนวนคงเหลือ</th>
            <th>รายละเอียด</th>
            <th>ยืม</th>
            <th>คืน</th>
            <th>ประวัติการยืม</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @foreach ($wareho as $row)
        <tr>
            <td>{{$i}}</td>
            <td>{{ $row->equip_name }}</td>
            <td>{{ $row->categoryw_name }}</td>
            <td>{{ $row->equip_amount }} ชิ้น</td>
            <td>
                <a href="/warehouse/show_borrows/{{$row->equip_id}}" class="btn btn-primary">รายละเอียด</a>
            </td>
            <td>
                @if ( $row->equip_amount <= 0) ของหมด @else <a href="/warehouse/borrows_eqip/{{$row->equip_id}}"
                    class="btn btn-success">ยืม</a>
                    @endif

            </td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModalCenter{{ $row->equip_id }}">
                    คืน
                </button>
            </td>
            <td>
                <a href="/warehouse/histoy_borrows/{{$row->equip_id}}" class="btn btn-primary">ประวัติ</a>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter{{ $row->equip_id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">คืน {{ $row->equip_name }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/savereturn/{{ $row->equip_id }}" method="post" id="from1">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="equip_id" value="{{$row->equip_id}}">
                            @php
                            $tools['tool'] = App\Models\Borrow::selectRaw('sum(borrows.borrow_amount)as
                            amount')
                            ->where('borrows.equip_id' , $row->equip_id)
                            ->where('borrows.user_id', $user_id)
                            ->get()
                            @endphp
                            @foreach ($tools['tool'] as $item)
                            <div class="form-group">
                                <label for="amount">จำนวน</label>
                                <input type="number" name="equip_amount" value="{{$item->amount}}" min="0"
                                    max="{{$item->amount}}" class="form-control">
                            </div>
                            @endforeach
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <input type="submit" class="btn btn-success" value="ตกลง">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                                <h5>ยืม/คืน อุปกรณ์ / Borrow/Return Information</h5>
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
                                    @if (session('alert'))
                                    <div class="alert alert-danger">
                                        {{ session('alert') }}
                                    </div>
                                    @endif
                                    <div class="dt-responsive table-responsive">
                                        <table id="multi-colum-dt"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>อันดับ</th>
                                                    <th>ชื่ออุปกรณ์</th>
                                                    <th>ประเภทอุปกรณ์</th>
                                                    <th>คงเหลือ</th>
                                                    <th>หน่วย</th>
                                                    <th>รายละเอียด</th>
                                                    <th>ยืม</th>
                                                    <th>คืน</th>
                                                    <th>ประวัติ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach ($wareho as $row)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td class="text-left">{{ $row->equip_name }}</td>
                                                    <td class="text-left">
                                                        @if($row->equip_type == 1)
                                                        วัสดุคงทน
                                                        @elseif($row->equip_type == 2)
                                                        วัสดุสิ้นเปลื้อง
                                                        @else
                                                        วัสดุอุปกรณ์ประกอบและอะไหล่
                                                        @endif
                                                    </td>
                                                    <td class="td-right">{{ $row->equip_amount - $row->equip_fix }}
                                                    </td>
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
                                                    <td>
                                                        <a href="/warehouse/show_borrows/{{$row->equip_id}}"
                                                            class="btn btn-warning btn-center">
                                                            <span class='fa fa-search'></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if ( $row->equip_amount - $row->equip_fix <= 0) ของหมด @else 
                                                        <a href="/warehouse/borrows_eqip/{{$row->equip_id}}"
                                                            class="btn btn-success">ยืม</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModalCenter{{ $row->equip_id }}">
                                                            คืน
                                                        </button>
                                                        {{-- <a href="/warehouse/return/{{$row->equip_id}}">Return</a> --}}
                                                    </td>
                                                    <td>
                                                        <a href="/warehouse/histoy_borrows/{{$row->equip_id}}"
                                                            class="btn btn-primary">ประวัติ</a>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter{{ $row->equip_id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">คืน
                                                                    {{ $row->equip_name }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/savereturn/{{ $row->equip_id }}"
                                                                    method="post" id="from1">
                                                                    @csrf
                                                                    <input type="hidden" name="staff_id"
                                                                        value="{{$user_id}}">
                                                                    <input type="hidden" name="equip_id"
                                                                        value="{{$row->equip_id}}">
                                                                    @php
                                                                    $tools['tool'] =
                                                                    App\Models\Borrow_bk::selectRaw('sum(borrow_bks.borrow_amount)as
                                                                    amount')
                                                                    ->where('borrow_bks.equip_id' , $row->equip_id)
                                                                    ->where('borrow_bks.staff_id', $user_id)
                                                                    ->get()
                                                                    @endphp
                                                                    @foreach ($tools['tool'] as $item)
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">จำนวน :
                                                                        </label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" name="equip_amount"
                                                                                value="{{$item->amount}}" min="0"
                                                                                max="{{$item->amount}}"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <input type="submit" class="btn btn-success"
                                                                            value="ตกลง">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php $i++ @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="30px">ลำดับ</th>
                                                    <th width="100px">ชื่ออุปกรณ์</th>
                                                    <th width="100px">ประเภทอุปกรณ์</th>
                                                    <th width="20px">คงเหลือ</th>
                                                    <th width="20px">หน่วย</th>
                                                    <th width="30px">รายละเอียด</th>
                                                    <th width="20px">ยืม</th>
                                                    <th width="20px">คืน</th>
                                                    <th width="20px">ประวัติ</th>
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
<script>
    document.querySelector('#from1').addEventListener('submit', function (e) {
        var form = this;
        e.preventDefault();
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            buttons: "OK",
        }).then(function (value) {
            if (value) {
                form.submit();
            }
        });
    });

</script>
@endsection
@endauth
