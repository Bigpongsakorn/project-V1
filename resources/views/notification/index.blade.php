<head>
    <style type="text/css">
        .maplo {
            margin: 0px;
            height: 100%;
        }

        #map {
            height: 50%;
        }

    </style>
    <script type="text/javascript" src="https://api.longdo.com/map/?key=ff42e46035f7b4d02bfb330828d02838"></script>
    <script>
        // var map;
        function init() {
            map = new longdo.Map({
                placeholder: document.getElementById('map')
            });
            // map.location({ lon:18.1477994, lat:99.3959354 }, true); // go to 100, 16 when created map
            map.zoomRange({
                min: 14,
                max: 20
            }); // ระยะการซูมของ map
            // map.zoom(20, true);
            map.location(longdo.LocationMode.Geolocation); // แสดงตำแหน่งของตัวเองทันที
            var result = map.location(longdo.LocationMode.Pointer); // แสดงขอมูล lon lat
            var locat = map.location()
            console.log(locat);

            $('#lat').val(locat.lat)
            $('#lon').val(locat.lon)

        }

    </script>
</head>
@extends('layouts.index-layout')
@section('content')
<section class="case-content">
    <div class="case-study-content">
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="title">แจ้งเหตุฉุกเฉิน</h2><br>
                </div>
                @if (session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
                @endif

                <!-- map-->

                <body onload="init();">
                    <div id="map"></div>
                </body>
                <!-- map-->

                <form action="/store" method="POST">
                    @csrf
                    {{-- <input type="hidden" value="125324151212" name="location_name"> --}}
                    <input type="hidden" value="" name="lon" id="lon">
                    <input type="hidden" value="" name="lat" id="lat">
                    <div class="form-group">
                        <label>ประเภท</label>
                        <select class="form-control" name="risk_id">
                            <option value="">เลือกประภท</option>
                            @foreach ($risk as $item)
                            <option value="{{$item->risk_id}}">{{$item->risk_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>รายละเอียด</label>
                        <textarea class="form-control" rows="3" name="ems_detail"></textarea>
                    </div>
                    <div class="form-group">
                        <label>ชื่อผู้แจ้ง</label>
                        <input type="text" class="form-control" name="general_name">
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="number" class="form-control" name="general_tel">
                    </div>
                    <button class="btn btn-success btnSuccess"
                        style="/* text-align: center; */display: block;margin: 0 auto; width:120px;height:60px;" type="submit">แจ้งเหตุ</button>
                    {{-- <button class="btn btn-danger" type="resert">ยกเลิก</button> --}}
                </form>
            </div>

            <!-- /Row -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.btnSuccess').click(function (e) {
                e.preventDefault();
                let form = $(this).parents('form');
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
        });

    </script>
</section>
@endsection
