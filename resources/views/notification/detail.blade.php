@extends('layouts.main-layout')
@section('content')
<style type="text/css">
    /* html {
        height: 100%;
    } */

    body {
        margin: 0px;
        height: 100%;
    }

    #map {
        height: 400px;
        width: 79%;
    }

    #result {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        width: 1px;
        height: 80%;
        margin: auto;
        border: 4px solid #dddddd;
        background: #ffffff;
        overflow: auto;
        z-index: 2;
    }
    .ldroute_placeholder .ldroute_info{
        height: 41px;
    }
</style>

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

                                            <input type="hidden" value="{{$no->lat}}" id="lat">
                                            <input type="hidden" value="{{$no->lon}}" id="lon">

                                            {{-- MAP --}}

                                            <body onload="init();">
                                                <div id="map"></div>
                                                <div id="result"></div>
                                            </body>
                                            <br>
                                            <div class="col-sm-10">
                                            {{-- MAP --}}
                                            <a href="https://google.com/maps?q={{$no->lat}},{{$no->lon}}"
                                                target="_blank">
                                                <h1>ไปยังสถานที่จุดหมาย</h1>
                                            </a>
                                            </div>
                                            <div class="col-sm-10">
                                                <label class="col-sm-3 col-form-label-head">ประเภท : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{$no->risk_name}}
                                                </label>
                                            </div>
                                            <div class="col-sm-10">
                                                <label class="col-sm-3 col-form-label-head">ชื่อผู้แจ้ง : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{$no->general_name}}
                                                </label>
                                            </div>
                                            <div class="col-sm-10">
                                                <label class="col-sm-3 col-form-label-head">รายละเอียด : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{$no->ems_detail}}
                                                </label>
                                            </div>
                                            <div class="col-sm-10">
                                                <label class="col-sm-3 col-form-label-head">เบอร์โทร : </label>
                                                <label class="col-sm-8 col-form-label">
                                                    {{$no->general_tel}}
                                                </label>
                                            </div>
                                            @if ($user->staff_type == 2)
                                            {{-- <form action="/nextuser" method="post">
                                                @csrf
                                                <input type="text" value="{{$staff_id}}" name="staff_id">
                                                <input type="text" value="{{$no->ems_id}}" name="ems_id">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-success">ส่งรายงาน</button>
                                                </div>
                                            </form> --}}
                                            <a href="{{url('/operation/create')}}" class="btn btn-success" >ส่งรายงาน</a>
                                            @elseif($user->staff_type == 3)
                                            <form action="/suceess/{{$no->ems_id}}" method="post">
                                                @csrf
                                                <input type="hidden" value="2" name="confirm">
                                                <input type="hidden" value="{{$no->ems_id}}" name="ems_id">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-success">ส่งงานให้เจ้าหน้าที่</button>
                                                </div>
                                            </form>
                                            @endif
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

<script type="text/javascript" src="https://api.longdo.com/map/?key=ff42e46035f7b4d02bfb330828d02838"></script>
<script>
    function init() {
        var map;
        map = new longdo.Map({
            placeholder: document.getElementById('map')
        });

        map.Route.placeholder(document.getElementById('result'));

        // map.location(longdo.LocationMode.Geolocation); // แสดงตำแหน่งของตัวเองทันที
        var result = map.location(longdo.LocationMode.Pointer); // แสดงขอมูล lon lat
        var locat = map.location()

        console.log(locat);

        //จุดเริ่มต้น
        map.Route.add(new longdo.Marker({
            lon: locat.lon,
            lat: locat.lat
            // lon: 98.96775797009468,
            // lat: 18.807864642242794

        }, {
            title: 'ที่อยู่ปัจจุบัน',
            detail: 'คุณอยู่ตรงนี้'
        }));

        var lat = $('#lat').val()
        var lon = $('#lon').val()

        // ไปยังสถานที่จุดหมาย
        map.Route.add({
            lon: lon,
            lat: lat
            // lon: 98.9576578,
            // lat: 18.8177205
        });
        // ระยะการซูมของ map
        map.zoomRange({
            min: 14,
            max: 20
        });
        map.Route.search();
    }

</script>
@endsection
