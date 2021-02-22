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
            <h5>คลังอุปกรณ์</h5>
        </div>
        <div class="card-block">
            @if($user_status == 1)
            <a href="/warehouse/create" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</a>
            <button type="button" id="addRow" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</button>
            @endif
            <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่ออุปกรณ์</th>
                            <th>ประเภทอุปกรณ์</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>วันที่</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td>{{$i}}</td>
    <td>{{ $row->equip_name }}</td>
    <td>{{ $row->categoryw_name }}</td>
    <td>{{ number_format($row->equip_price,2) }}</td>
    <td>{{ $row->equip_amount }} ชิ้น</td>
    <td>{{ $row->created_at }}</td>
    @if($user_status == 1)
    <td>
        <a href="/warehouse/edit/{{$row->equip_id }}" class="btn btn-success">แก้ไข</a>
    </td>
    <td>
        <form action="/destroyw/{{$row->equip_id}}" method="post">
            @csrf
            <input type="submit" value="ลบ" data-name="{{ $row->equip_name }}" class="btn btn-danger deleteForm">
        </form>
    </td>
    @endif
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
                                <h5>ข้อมูลอุปกรณ์ / Device Information</h5>
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
                            <div class="card-block">
                                <a href="{{url('/warehouse/create')}}">
                                    <button class="btn btn-success btn-center" type="button"><i
                                            class='fa fa-plus'></i>เพิ่มข้อมูลอุปกรณ์</button>
                                </a>

                                <div class="dt-responsive table-responsive">
                                    <table id="multi-colum-dt"
                                        class="table table-striped table-bordered nowrap td-center">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่ออุปกรณ์</th>
                                                <th>ประเภทอุปกรณ์</th>
                                                <th>ราคา</th>
                                                <th>จำนวน</th>
                                                <th>ส่งซ่อม</th>
                                                <th>คงเหลือ</th>
                                                <th>หน่วย</th>
                                                @if($user_status == 1)
                                                <th>แก้ไข</th>
                                                <th>ลบ</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach ($data as $row)
                                            <tr>
                                                <td>{{$i}}</td>
                                                {{-- <th scope="row">{{ $row->equip_id }}</th> --}}
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
                                                <td class="td-right">{{ number_format($row->equip_price,2) }}</td>
                                                <td class="td-right">{{ $row->equip_amount }}</td>
                                                <td class="td-right">{{ $row->equip_fix }}</td>
                                                <td class="td-right">
                                                    {{ $row->equip_amount - $row->equip_fix  }}
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
                                                @if($user_status == 1)
                                                <td>
                                                    <a href="{{url('/warehouse/edit',$row->equip_id) }}"
                                                        class="btn btn-primary">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{url('/destroyw',$row->equip_id)}}" method="post">
                                                        @csrf
                                                        {{-- @method('DELETE') --}}
                                                        {{-- <input type="submit" value="ลบ"
                                                            data-name="{{ $row->equip_name }}"
                                                            class="btn btn-danger deleteForm"> --}}
                                                        <button type="submit" class="btn btn-danger deleteForm"
                                                            data-name="{{ $row->equip_name }}">
                                                            <span class="fa fa-trash"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                            @php $i++ @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="30px">ลำดับ</th>
                                                <th width="100px">ชื่ออุปกรณ์</th>
                                                <th width="100px">ประเภทอุปกรณ์</th>
                                                <th width="50px">ราคา</th>
                                                <th width="30px">จำนวน</th>
                                                <th width="30px">ส่งซ่อม</th>
                                                <th width="30px">คงเหลือ</th>
                                                <th width="30px">หน่วย</th>
                                                @if($user_status == 1)
                                                <th width="20px">แก้ไข</th>
                                                <th width="20px">ลบ</th>
                                                @endif
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
@endauth
