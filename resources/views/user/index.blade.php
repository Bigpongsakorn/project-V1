@if($admin_status != 1)
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
            <h5>ข้อมูลผู้ใช้งาน</h5>
        </div>
        <div class="card-block">
            @if($admin_status)
            <a href="/user/create" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</a>
            @endif
            <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th >รูป</th>
                            <th >ชื่อผู้ใช้งาน</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อจริง</th>
                            <th>นามสกุล</th>
                            <th >อายุ</th>
                            <th >วันเกิด</th>
                            <th >เลขบัตรประชาชน</th>
                            <th>เบอร์โทร</th>
                            <th >อีเมล</th>
                            <th >ซอย</th>
                            <th >หมู่</th>
                            <th >ถนน</th>
                            <th >ตำบล</th>
                            <th >อำเภอ</th>
                            <th >จังหวัด</th>
                            <th>ประเภทผู้ใช้</th>
                            <th>รายละเอียด</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0 @endphp
                        @foreach($user as $row)
                        @if($row->username == "admin" )
                        <tr>
                            @else
                            <td>{{$i}}</td>
    <td>
        @if ($row->user_pic=='')
        <img src="upload/user.png" height="100" width="100">
        @else
        <img src="upload/images/{{ $row->user_pic }}" height="100" width="100">
        @endif
    </td>
    <td>{{ $row->username }}</td>
    <td>{{ $row->user_gender }}</td>
    <td>{{ $row->user_fname }}</td>
    <td>{{ $row->user_lname }}</td>
    <td>{{ $row->user_age }}</td>
    <td>{{ $row->user_dobDATE }}</td>
    <td>{{ $row->user_idcard }}</td>
    <td>{{ $row->user_tel }}</td>
    <td>{{ $row->user_email }}</td>
    <td>{{ $row->soi }}</td>
    <td>{{ $row->moo }}</td>
    <td>{{ $row->road }}</td>
    <td>{{ $row->sub_district }}</td>
    <td>{{ $row->district }}</td>
    <td>{{ $row->province }}</td>
    @if($row->user_type == '0')
    <td>admin</td>
    @elseif($row->user_type == '1')
    <td>หัวหน้างาน</td>
    @elseif($row->user_type == '2')
    <td>เจ้าหน้าที่พนักงาน</td>
    @elseif($row->user_type == '3')
    <td>เจ้าหน้าที่ศูนย์</td>
    @else()
    <td> ผู้ใช้ทั่วไป</td>
    @endif
    <td>
        <button type="button" class="btn btn-primary m-b-20" data-toggle="modal"
            data-target=".bd-example-modal-lg{{ $row->user_id }}">
            รายละเอียด
        </button>
    </td>
    <td>
        ส่งข้อมูลแก้ไข
        <a href="{{ route('user.edit',$row->user_id) }}" class="btn btn-success">แก้ไข</a>
        <a href="/edit2/{{ $row->user_id }}" class="btn btn-success">แก้ไข</a>
    </td>
    <td>
        ส่งข้อมูลลบ
        <form action="{{ route('user.destroy',$row->user_id) }}" method="post">
            @csrf @method('DELETE')
            ลบแบบปกติ
            <input type="submit" value="ลบ" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูล {{$row->name }}
                                    หรือไม่')">
            ลบแบบใช้ popup jqrey
            <input type="submit" value="ลบ" data-name="{{ $row->user_fname }}" class="btn btn-danger deleteForm">
        </form>
    </td>
    </tr>
    @endif
    <div class="modal fade bd-example-modal-lg{{ $row->user_id }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div>
                    @if ($row->user_pic=='')
                    <img src="upload/user.png" height="100" width="100">
                    @else
                    <img src="upload/images/{{ $row->user_pic }}" height="100" width="100">
                    @endif
                    {{ $row->user_fname }} {{ $row->user_lname }}
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
                <i class="feather icon-users bg-c-blue"></i>
                <div class="d-inline">
                    <h5>ข้อมูลผู้ใช้งานระบบ</h5>
                    <span>System User Information</span>
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
                                <h5>ข้อมูลผู้ใช้งาน / User Information</h5>
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
                                <a href="{{url('/user/create')}}">
                                    <button class="btn btn-success btn-center" type="button">
                                        <i class='fa fa-user-plus'></i>เพิ่มข้อมูลผู้ใช้งาน
                                    </button>
                                </a>
                                <div class="dt-responsive table-responsive">
                                    <table id="multi-colum-dt"
                                        class="table table-striped table-bordered nowrap td-center">
                                        <thead>
                                            <tr>
                                                <th>รหัส</th>
                                                <th>ชื่อ</th>
                                                <th>นามสกุล</th>
                                                <th>ประเภทผู้ใช้งาน</th>
                                                <th>สถานะผู้ใช้</th>
                                                <th>ตรวจสอบ</th>
                                                <th>แก้ไข</th>
                                                <th>ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $row)
                                            @if($row->username == "admin" )
                                            <tr>
                                                @else
                                                <td>{{ 
                                                        sprintf('%05d',$row->staff_id)
                                                        }}</td>
                                                <td class="text-left">{{ $row->staff_fname }}</td>
                                                <td class="text-left">{{ $row->staff_lname }}</td>
                                                @if($row->staff_type == '0')
                                                <td class="text-left">admin</td>
                                                @elseif($row->staff_type == '1')
                                                <td class="text-left">หัวหน้างาน</td>
                                                @elseif($row->staff_type == '2')
                                                <td class="text-left">เจ้าหน้าที่พนักงาน</td>
                                                @elseif($row->staff_type == '3')
                                                <td class="text-left">เจ้าหน้าที่ศูนย์</td>
                                                @else($row->levels == '5')
                                                <td class="text-left"> ผู้ใช้ทั่วไป</td>
                                                @endif
                                                <td>
                                                    @if ($row->staff_status == 1)
                                                    <span style="color:#2ed8b6">ใช้งานปกติ</span>
                                                    @elseif ($row->staff_status == 2)
                                                    <span style="color:#ff5370">ลาออก</span>
                                                    @elseif ($row->staff_status == 3)
                                                    <span style="color:#ffb64d">พักงาน</span>
                                                    @elseif ($row->staff_status == 4)
                                                    <span style="color:#ff5370">พ้นสภาพ</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href=" {{url ('user/user_check', $row->staff_id) }}">
                                                        <button class="btn btn-warning btn-center" type="button">
                                                            <i class='fa fa-search'></i>ตรวจสอบ</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.edit',$row->staff_id) }}">
                                                        <button class="btn btn-primary btn-center" type="button">
                                                            <i class="fa fa-edit"></i>แก้ไข</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('user.destroy',$row->staff_id) }}"
                                                        method="post">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-center deleteForm"
                                                            data-name="{{ $row->staff_fname }}">
                                                            <i class='fa fa-user-times'></i> ลบ
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="30px">รหัส</th>
                                                <th width="100px">ชื่อ</th>
                                                <th width="100px">นามสกุล</th>
                                                <th width="50px">ประเภทผู้ใช้งาน</th>
                                                <th width="30px">สถานะผู้ใช้</th>
                                                <th width="20px">ตรวจสอบ</th>
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
@endauth
