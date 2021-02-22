@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->all())
            <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
        @endif
        {{-- แนบ id ที่ต้องแก้ไขไปด้วย --}}
        {!! Form::open(['action' => ['ContactController@update',$data->id],'method'=>'PUT']) !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('NAME') !!}
                {{-- เรียกข้อมูลใน data มาแสดง --}}
                {!! Form::text('name',$data->name,["class"=>"form-control"])!!}
            </div>
            <div class="form-group">
                {!! Form::label('E-MAIL') !!}
                {{-- เรียกข้อมูลใน data มาแสดง --}}
                {!! Form::text('email',$data->email,["class"=>"form-control"])!!}
            </div>
            <div class="form-group">
                {!! Form::label('PHONE') !!}
                {{-- เรียกข้อมูลใน data มาแสดง --}}
                {!! Form::text('phone',$data->phone,["class"=>"form-control"])!!}
            </div>
            <input type="submit" value="อัพเดท" class="btn btn-primary btnSuccess">
            <a href="/contact" class="btn btn-success">กลับ</a>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
