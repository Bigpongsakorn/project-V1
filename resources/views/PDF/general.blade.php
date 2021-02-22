<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="generator" content="pdf2htmlEX" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    {{-- <title></title> --}}
    <style type="text/css">

    @font-face {
    font-family: 'THSarabunNew';
    font-style: normal;
    font-weight: normal;
    src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
    }

    @font-face {
    font-family: 'THSarabunNew';
    font-style: normal;
    font-weight: bold;
    src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
    }

    @font-face {
    font-family: 'THSarabunNew';
    font-style: italic;
    font-weight: normal;
    src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
    }

    @font-face {
    font-family: 'THSarabunNew';
    font-style: italic;
    font-weight: bold;
    src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
    }
        body {
            font-size: 16px;
            font-weight: 250;
            font: 21px 'THSarabunNew';
        }

        .content {
            margin-top: 15px;
            margin-left: 70px;
            margin-right: 55px;
            /* font-family: 'Sarabun', sans-serif; */
        }

        .title {
            font-size: 30px;
            font-style: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .text-right {
            text-align: right;
            margin: 8px 0px;
        }

        .text-left {
            margin-top: 5px;
            text-align: left;
            margin: 8px 0px;
        }

        .text {
            margin-top: 20px;
            text-align: justify;
            text-indent: 2cm;
            line-height: 35px;
        }

        .text-l {
            text-align: justify;
            line-height: 35px;
        }

        .lt {
            text-indent: 2cm;
        }

        .text-pd {
            margin-top: 25px;
            line-height: 35px;
            text-indent: 2cm;
        }

        .text-pd-l {
            margin-top: 30px;
            line-height: 40px;
            text-align: center;
            margin-bottom: 40px;
            padding-left: 100px;
        }

        .pd-l {
            text-indent: 2.2cm;
            line-height: 40px;
            text-align: center;
            margin-left: 30px;
        }

        .sl {
            padding-left: 32px;
        }
    </style>
</head>

<body>
    <div id="sidebar">
        <div id="outline">
        </div>
    </div>
    <div id="page-container">
        <div id="pf1" class="pf w0 h0" data-page-no="1">
            <div class="pc pc1 w0 h0">
                <div class="content">
                    <div class="title">คำร้องทั่วไป</div>
                    <div class="row">
                        <div class="text-right">เขียนที่ &ensp; {{$general->write_at}}</div>
                        <div class="text-right"> &ensp; {{$general->general_date}}</div>
                    </div>
                    <div class="row">
                        <div class="text-left">เรื่อง &emsp; {{$general->general_title}}</div>
                        <div class="text-left">เรียน &emsp; {{$general->mention}}</div>
                    </div>
                    <div class="row">
                        <div class="text">ข้าพเจ้า&emsp;{{$general->user_name}}&emsp;อายุ &ensp;{{$general->age}}
                            &ensp;ปี</div>
                        <div class="text-l">
                            อยู่บ้านเลขที่&emsp;{{$general->home_num}}&emsp; หมู่บ้าน &ensp;{{$general->moo}}&emsp;
                            หมู่ที่&ensp;{{$general->moo_num}}&emsp;
                            ถนน&ensp;{{$general->road}}&emsp;
                            ตำบล&ensp;{{$general->subdistrict_name}}&emsp; อำเภอ&ensp;{{$general->district_name}}&emsp;
                            จังหวัด&ensp;{{$general->province_name}}
                        </div>
                        <div class="text-l">เบอร์โทรศัพท์ที่ติดต่อได้&emsp;{{$general->tel}}</div>
                        <div class="text-l lt">มีความประสงค์&emsp;{{$general->wish}} </div>
                    </div>
                    <div class="row">
                        <div class="text-pd">จึงเรียนมาเพื่อโปรดพิจารณา</div>
                    </div>
                    <div class="row">
                        <div class="text-pd-l">ขอแสดงความนับถือ</div>
                    </div>
                    <div class="row">
                        <div class="pd-l">(ลงชื่อ)..................................................</div>
                        <div class="pd-l sl">({{$general->sign}})</div>
                        <div class="pd-l">ตำแหน่ง(ถ้ามี) {{$general->position}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>