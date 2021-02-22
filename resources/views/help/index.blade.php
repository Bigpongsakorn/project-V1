@extends('layouts.index-layout')
{{-- @extends('layouts.app') --}}
@section('content')

<!-- Case Study Sections
  =========================-->

<section class="case-content">
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
                    <h2 class="title">เบอร์ติดต่อ ศูนย์ช่วยเหลือ</h2><br>
                </div>
                <!-- /Section header -->

                <div class="data-table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col-md-6" style="text-align: center">หน่วยงาน</th>
                                <th scope="col-md-6" style="text-align: center">เบอร์โทร</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">สำนักงานเทศบาลตำบลวังพร้าว</th>
                                <td> 054-209202 </td>
                            </tr>
                            <tr>
                                <th scope="row">สำนักงานป้องกันและบรรเทาสาธารณภัยจังหวัดลำปาง</th>
                                <td> 0-5426-5072 , 08-1992-7223 </td>
                            </tr>
                            <tr>
                                <th scope="row">ศูนย์ป้องกันและบรรเทาสาธารณภัยเขต ๑๐ ลำปาง</th>
                                <td> 054-230947 </td>
                            </tr>
                            <tr>
                                <th scope="row">1784 สายด่วน 24 ชั่วโมง</th>
                                <td> 1784 </td>
                            </tr>
                            <tr>
                                <th scope="row">กรมป้องกันและบรรเทาสาธารณภัยกระทรวงมหาดไทย</th>
                                <td> 0-2637-3000 , 0-2243-0020-27 และ มท.55050-58 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- /Row -->
        </div>
    </div>

</section>

@endsection
