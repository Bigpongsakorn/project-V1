
@extends('layouts.index-layout')
@section('content')
<!-- Case Study Sections
  =========================-->
<div class="case-content" >
    <!-- <div class="text-center">
      <h2 class="title">ข่าวประชาสัมพันธ์</h2>
    </div> -->
    <!-- Case Study Description
      top section -->
    <div class="case-study-content" >
        <div class="container">
            <!-- Row -->
            <div class="row" >

                <!-- Section header -->
                <div class="section-header text-center" >
                    <h2 class="title" >ดาวน์โหลดเอกสาร</h2><br>
                </div>
                <!-- /Section header -->
                <div class="data-table" >
                    <table id="example" class="table table-striped table-bordered td-center" style="width:100%">
                        <thead>
                            <tr>
                                <th width="50px" style="text-align: center">ลำดับ</th>
                                <th width="250px" style="text-align: center">ชื่อเอกสาร</th>
                                <th width="100px" style="text-align: center">ขนาดเอกสาร</th>
                                <th width="100px" style="text-align: center">วันที่อัปโหลดข้อมูล</th>
                                <th width="100px" style="text-align: center">โหลดเอกสาร</th>
                                {{-- <th width="105px" style="text-align: center">แบบฟอร์มออนไลน์</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ($data as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td class="text-left">{{ $row->file_name }}</td>
                                <td class="text-right">
                                {{ $row->file_size / 1000 }} KB</td>
                                <td>{{ date('d-m-Y',strtotime($row->created_at)) }}</td>
                                <td>
                                    <a href="/upload/file/{{ $row->file_name }}" class="btn btn-primary" download>
                                        ดาวน์โหลด
                                    </a>
                                </td>
                                {{-- <td><button type="button" class="btn btn-success">กรอกข้อมูล</button></td> --}}
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>
</div>
@endsection
