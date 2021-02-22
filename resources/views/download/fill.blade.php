@extends('layouts.index-layout')
@section('content')
<!-- Case Study Sections
  =========================-->
<div class="case-content">
    <!-- <div class="text-center">
      <h2 class="title">ข่าวประชาสัมพันธ์</h2>
    </div> -->
    <!-- Case Study Description
      top section -->
    <div class="case-study-content">
        <div class="container">
            <!-- Row -->
            <div class="row">

                <!-- Section header -->
                <div class="section-header text-center">
                    <h2 class="title">กรอกเอกสารออนไลน์</h2><br>
                </div>
                <!-- /Section header -->
                <div class="data-table">
                    <table id="example" class="table table-striped table-bordered td-center" style="width:100%">
                        <thead>
                            <tr>
                                <th width="50px" style="text-align: center">ลำดับ</th>
                                <th width="250px" style="text-align: center">ชื่อเอกสาร</th>
                                <th width="105px" style="text-align: center">แบบฟอร์มออนไลน์</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>แบบรายงานเหตุด่วนสาธารณภัย</td>
                                <td>
                                    <a href="/request/ems_report_insert_online" class="btn btn-success">กรอกข้อมูล</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>แบบคำร้องทั่วไป</td>
                                <td>
                                    <a href="/request/general_request_insert_online"
                                        class="btn btn-success">กรอกข้อมูล</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>คำขอหนังสือรับรองกรณีผู้ประสบภัย</td>
                                <td>
                                    <a href="/request/certificate_request_insert_online"
                                        class="btn btn-success">กรอกข้อมูล</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>หนังสือรับรองกรณีผู้ประสบภัย</td>
                                <td>
                                    <a href="/request/certificate_insert_online"
                                        class="btn btn-success">กรอกข้อมูล</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>
</div>
@endsection
