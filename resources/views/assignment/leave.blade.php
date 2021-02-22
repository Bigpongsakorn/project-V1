{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<div class="container">
    {{-- <div class="card">
        <div class="card-header">
            <h5>รายละเอียด วันหยุด วันลา</h5>
        </div>
        <div class="card-block">
            @if($user_status == 1)
            <a href="/assignment/create_leave" class="btn btn-primary m-b-20">+ เพิ่มข้อมูล</a>
            @endif
            <div class="dt-responsive table-responsive">
                <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อหัวข้อ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($leav as $row)
                        <tr>
                            <td>{{$i}}</td>
    <td>{{$row->leave_name}}</td>
    <td>{{$row->leave_detail}}</td>
    <td>{{$row->created_at}}</td>
    <td>
        @if( $row->leave_type == 0 )
        รออนุมัติ
        @elseif( $row->leave_type == 1 )
        อนุมัติ
        @else
        ไม่อนุมัติ
        @endif
    </td>
    <td>
        <form method="POST" action="/approve/{{$row->leave_id}}">
            @csrf
            <button class="btn btn-primary">อนุมัติ</button>
            <button class="btn btn-danger">ไม่อนุมัติ</button>
            <input type="hidden" name="leave_type" value="1">
            <button type="submit" class="btn btn-primary">อนุมัติ</button>
            <input type="submit" name="leave_type" value="2" class="btn btn-danger">
        </form>
        <form method="POST" action="/approve/{{$row->leave_id}}">
            @csrf
            <input type="hidden" name="leave_type" value="2">
            <button type="submit" class="btn btn-danger btnSuccess">ไม่อนุมัติ</button>
            <input type="submit" name="leave_type" value="2" class="btn btn-danger">
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
                <i class="fa fa-sticky-note-o bg-c-blue"></i>
                <div class="d-inline">
                    <h5>ข้อมูลวันลา</h5>
                    <span>System Leave Information</span>
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
                                <h5>ข้อมูลวันลา / Leave Information</h5>
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
                                    {{-- <a href="assignment/show">แสดงมอบหมายงานทั้งหมด</a> --}}
                                    <a href="/assignment/create_leave">
                                        <button class="btn btn-success btn-center" type="button"><i
                                                class='fa fa-plus'></i>เพิ่มข้อมูล</button>
                                    </a>
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table"
                                            class="table table-striped table-bordered nowrap td-center">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อหัวข้อ</th>
                                                    <th>รายละเอียด</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>แสดงรายละเอียด</th>
                                                    <th>สถานะ</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                    @if($admin_status == 1)
                                                    <th>จัดการ</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1 @endphp
                                                @foreach($leav as $row)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td class="text-left">{{$row->leave_name}}</td>
                                                    <td class="text-left">
                                                        {{mb_substr($row->leave_detail,0,20, 'UTF-8')}}
                                                    </td>
                                                    <td>{{$row->staff_fname}}</td>
                                                    <td>{{$row->staff_lname}}</td>
                                                    <td>
                                                        <a href="/assignment/detail_leave/{{$row->leave_id}}"
                                                            class="btn btn-warning btn-center"><i
                                                                class='fa fa-search'></i>รายละเอียด</a>
                                                    </td>
                                                    <td>
                                                        @if( $row->leave_status == 0 )
                                                        <div style="background-color:#ffb64d;padding:5px;color:#fff">
                                                            รออนุมัติ
                                                        </div>
                                                        @elseif( $row->leave_status == 1 )
                                                        <div style="background-color:#2ed8b6;padding:5px;color:#fff">
                                                            อนุมัติ
                                                        </div>
                                                        @else
                                                        <div style="background-color:#ff5370;padding:5px;color:#fff">
                                                            ไม่อนุมัติ
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/assignment/edit_leave/{{$row->leave_id}}"
                                                            class="btn btn-primary"><span class="fa fa-edit"></span></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ url('/deleteleave',$row->leave_id) }}"
                                                            method="post">
                                                            @csrf
                                                            {{-- <input type="submit" value="ลบ"
                                                                data-name="{{ $row->leave_name }}"
                                                                class="btn btn-danger deleteForm"> --}}
                                                                <button type="submit" class="btn btn-danger deleteForm"
                                                                    data-name="{{ $row->leave_name }}">
                                                                    <span class="fa fa-trash"></span>
                                                                </button>
                                                        </form>
                                                    </td>
                                                    @if($admin_status == 1)
                                                    <td>
                                                        <div style="float:left">
                                                            <form method="POST" action="/approve/{{$row->leave_id}}">
                                                                @csrf
                                                                {{-- <button class="btn btn-primary">อนุมัติ</button>
                                                                <button class="btn btn-danger">ไม่อนุมัติ</button> --}}
                                                                <input type="hidden" name="leave_status" value="1">
                                                                <button type="submit"
                                                                    class="btn btn-primary btnSuccess">อนุมัติ</button>
                                                                {{-- <input type="submit" name="leave_type" value="2" class="btn btn-danger"> --}}
                                                            </form>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal{{$row->leave_id}}">
                                                                ไม่อนุมัติ
                                                            </button>
                                                        </div>
                                                        <div style="clear:both"></div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @php $i++ @endphp
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$row->leave_id}}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    เหตุผลในการไม่อนุมัติ</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="/approve/{{$row->leave_id}}" id="from1">
                                                                    @csrf
                                                                    <input type="hidden" name="leave_status" value="2">
                                                                    <input type="text" name="leave_reason"
                                                                        class="form-control">
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
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th width="10px">ลำดับ</th>
                                                    <th width="100px">ชื่อหัวข้อ</th>
                                                    <th width="100px">รายละเอียด</th>
                                                    <th width="50px">ชื่อ</th>
                                                    <th width="50px">นามกสุล</th>
                                                    <th width="50px">แสดงรายละเอียด</th>
                                                    <th width="50px">สถานะ</th>
                                                    <th width="50px">แก้ไข</th>
                                                    <th width="50px">ลบ</th>
                                                    @if($admin_status == 1)
                                                    <th width="150px">จัดการ</th>
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
