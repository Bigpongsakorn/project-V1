<head>
    <style>
        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>

@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12">
         <div class="links">
             <a href="{{ url('/notifys') }}">แจ้งเหตุ</a>
             <a href="{{ url('/warehouse')}}">คลังอุปกรณ์</a>
             <a href="{{ url('/warehouse/borrows')}}">ยืม/คืน อุปกรณ์</a>
             <a href="{{ url('/assignment/someuser')}}">งานที่ได้รับมอบหมาย</a>
         </div>
    </div>
</div>
@endsection
