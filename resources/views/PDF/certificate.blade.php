<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="generator" content="pdf2htmlEX" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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
            font: 20px 'THSarabunNew';
        }

        .content {
            /* margin-top: 15px; */
            margin-left: 70px;
            margin-right: 55px;
            /* font-family: 'Sarabun', sans-serif; */
        }

        .title {
            font-size: 30px;
            font-style: bold;
            text-align: center;
            /* margin-bottom: 20px; */
        }

        .text {
            margin-top: 20px;
            text-align: justify;
            text-indent: 2cm;
            line-height: 30px;
        }

        .text-l {
            /* text-align: justify; */
            line-height: 30px;
        }

        .lt {
            text-indent: 2cm;
        }

        .text-pd {
            margin-top: 15px;
            line-height: 30px;
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
            line-height: 30px;
            text-align: center;
        }

        .wh {
            padding-top: 70px;
        }

        .w-l {
            /* width: 500px; */
            bottom: 0px;
            text-align: left;
        }

        .w-r {
            /* width: 500px; */
            bottom: 0px;
            text-align: inherit;
            word-wrap: break-word;
        }

        .mt {
            margin-top: 15px;
        }

        .tb {
            text-indent: 3cm;
        }

        tr {
            text-align: center;
        }
    </style>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet"> --}}
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
                    <div class="row">
                        <table>
                            <tr>
                                <td class="w-l wh">เลขที่ {{$sufferer->sufferer_no}}</td>
                                <td style="padding:0 100px;"><img src="asset/images/krut.png"
                                        width="120"> </td>
                                <td class="w-r">
                                    <p class="wh">ชื่อส่วนราชการ {{$sufferer->sufferer_gover}}</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="title">หนังสือรับรองผู้ประสบภัยประเภทบุคคลธรรมดา</div>
                    <div class="row">
                        <div class="text">หนังสือฉบับนี้ให้ไว้เพื่อแสดงว่า&ensp;{{$sufferer->sufferer_confirm}}&emsp;
                            เกิดวันที่&ensp;{{$sufferer->sufferer_user_birte}}</div>
                        <div class="text-l">เลขประจำตัวประชาชน / หนังสือเดินทางเลขที่ / อื่น ๆ
                            (ถ้ามี)&emsp;{{$sufferer->sufferer_userid}}</div>
                        <div class="text-l">
                            ที่อยู่ที่ประสบภัย บ้านเลขที่&emsp;{{$sufferer->sufferer_home_num}}&emsp;
                            หมู่ที่&ensp; {{$sufferer->sufferer_home_no}}&emsp;
                            ถนน&ensp; {{$sufferer->sufferer_road}}&emsp;
                            ตำบล&ensp; {{$sufferer->subdistrict_name}}&emsp;
                            อำเภอ&ensp; {{$sufferer->district_name}}&emsp;
                            จังหวัด&ensp; {{$sufferer->province_name}}&emsp;
                            รหัสไปรษณีย์&ensp; {{$sufferer->zip_code}}&emsp;
                            โทรศัพท์&ensp; {{$sufferer->sufferer_user_tel}}
                        </div>
                        <div class="text-l">
                            ที่อยู่ตามทะเบียนบ้านหรือที่อยู่ที่ติดต่อได้
                            บ้านเลขที่&emsp; {{$sufferer->home_num}}&emsp;
                            หมู่ที่&ensp; {{$sufferer->home_noo}}&emsp;
                            ถนน&ensp; {{$sufferer->home_road}}&emsp; 
                            ตำบล&ensp; {{$date->subdistrict_name}}&emsp;
                            อำเภอ&ensp; {{$date->district_name}}&emsp;
                            จังหวัด&ensp; {{$date->province_name}}&emsp;
                            รหัสไปรษณีย์&ensp; {{$date->zip_code}}&emsp;
                            โทรศัพท์&ensp; {{$sufferer->home_tel}}
                        </div>
                        <div class="text-l">เป็นผู้ประสบภัยหรือได้รับผลกระทบจากเหตุการณ์&emsp;{{$sufferer->risk_name}}
                            &emsp;(ระบุประเภทของสาธารณภัยและสถานที่เกิดภัย)</div>
                        <div class="text-l">เมื่อ&emsp; {{$sufferer->sufferer_start_date}}
                            {{$sufferer->sufferer_start_time}}&emsp;(วัน เดือน ปี เวลา
                            ที่เกิดเหตุ)
                        </div>
                        <div class="text-l mt"><b>ความเสียหายของผู้ประสบภัย</b>
                            ตามบัญชีความเสียหายแนบท้ายหนังสือรับรองของผู้ประสบภัยประเภทบุคคลธรรมดาฉบับนี้</div>
                        <div class="text-l lt mt">
                            ผู้ประสบภัยมีสิทธิที่จะได้รับการสงเคราะห์และการฟื้นฟูจากหน่วยงานของทางราชการ ด้านใดด้านหนึ่ง
                            หรือหลายด้านตามเงื่อนไข หลักเกณฑ์ และแนวทางที่หน่วยงานนั้น
                            กําหนด รายละเอียดตารางแสดงสิทธิที่จะได้รับจากทางราชการปรากฏตามแนบท้าย</div>
                    </div>
                    <div class="row">
                        <div class="text-pd tb">ให้ไว้ ณ วันที่ </div>
                    </div>
                    <div class="row">
                        <div class="text-pd-l">ขอแสดงความนับถือ</div>
                    </div>
                    <div class="row">
                        <div class="pd-l">(ลงชื่อ)..................................................</div>
                        <div class="pd-l sl">({{$sufferer->sufferer_user_name}})</div>
                        <div class="pd-l">ตำแหน่ง {{$sufferer->sufferer_user_position}}</div>
                        <div class="pd-l">ผู้อำนวยการ {{$sufferer->sufferer_user_director}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>