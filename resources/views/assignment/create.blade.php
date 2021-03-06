{{-- @extends('layouts.app') --}}
@extends('layouts.main-layout')
@section('content')
<style>
    .select2-selection__choice{
        background-color:#4099ff;
    }
</style>
<div class="container">
    {{-- <form action="AssignmentController@store" method="post"> --}}
    {{-- @csrf --}}
    {{-- {!! Form::open(['action' => 'AssignmentController@store','method'=>'POST']) !!}
    <div class="form-group">
        <p>หัวข้องานที่จะมอบหมาย</p>
        {!! Form::text('assignment_name',null,["class"=>"form-control",'placeholder' => 'ชื่องาน','name'=>'A'])!!}
    </div>
    <div class="form-group">
        {!! Form::textarea('assignment_detail',null,["class"=>"form-control",'placeholder' =>
        'รายละเอียด','name'=>'B'])!!}
    </div>
    <input type="hidden" name="assignment_status" value="0">
    <div class="form-group">
        <p>รายชื่อพนักงาน</p> --}}
        {{-- <input type="text" name="user_id" id="" class="form-control"> --}}
        {{-- <div class="col-md-11">
            <select class="form-control js-example-tokenizer" multiple="multiple" name="user_id[]">
                @foreach ($user as $item)
                    <option value="{{$item->user_id}}">{{$item->user_fname}} {{$item->user_lname}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <input type="submit" value="ตกลง" class="btn btn-primary btnSuccess">
    <a href="/assignment" class="btn btn-success">กลับ</a>
    {!! Form::close() !!} --}}
    {{-- </form> --}}


    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-sticky-note-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ข้อมูลการมอบหมายงาน</h5>
                        <span>System Assignment Information</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>เพิ่มข้อมูลการมอบหมายงาน / Add Assignment Information</h5>
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
                            @if ($errors->all())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            @if (session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                            @endif
                            {!! Form::open(['action' => 'AssignmentController@store','method'=>'POST']) !!}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">หัวข้องาน :</label>
                                <div class="col-sm-10">
                                    {!! Form::text('assign_name',null,["class"=>"form-control",'placeholder' => 'ชื่องาน','name'=>'A'])!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">รายละเอียด :</label>
                                <div class="col-sm-10">
                                    {!! Form::textarea('assign_detail',null,["class"=>"form-control",'placeholder' => 'รายละเอียด','name'=>'B'])!!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">วันเริ่มต้น :</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="assign_date_start">
                                </div>
                                <label class="col-sm-2 col-form-label">วันสิ้นสุด :</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="assign_date_end">
                                </div>
                            </div>
                            <input type="hidden" name="assign_status" value="0">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">รายชื่อพนักงาน :</label>
                                <div class="col-sm-10">
                                    <select class="form-control js-example-tokenizer" multiple="multiple" name="staff_id[]" >
                                        @foreach ($user as $item)
                                            @if ($item->staff_type != 1 )
                                                <option value="{{$item->staff_id}}">
                                                    {{$item->staff_fname}} {{$item->staff_lname}} 
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-info me-md-2 btn-form btnSuccess" type="submit"><i
                                                class='fa fa-plus'></i>บันทึก</button>
                                        <a href="/assignment"><button class="btn btn-secondary btn-form" type="button"><i
                                                    class='fa fa-close'></i>ปิด</button></a>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
</script>
@endsection
