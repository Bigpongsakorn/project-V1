@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 align="center">ข้อมูลติดต่อ</h2>
        <a href="/contact/create" class="btn btn-primary my-2">เพิ่มข้อมูล</a>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">รหัส</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">อีเมล</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone}}</td>
                    <td>
                        {{-- ส่งข้อมูลแก้ไข --}}
                    <a href="{{route('contact.edit',$row->id)}}" class="btn btn-success">แก้ไข</a>
                    </td>
                    <td>
                        {{-- ส่งข้อมูลลบ --}}
                        <form action="{{route('contact.destroy',$row->id)}}" method="post">
                            @csrf @method('DELETE')
                            {{-- ลบแบบปกติ --}}
                            {{-- <input type="submit" value="ลบ" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูล {{$row->name}} หรือไม่')"> --}}
                            {{-- ลบแบบใช้ popup jqrey --}}
                            <input type="submit" value="ลบ" data-name="{{$row->name}}" class="btn btn-danger deleteForm">
                        </form>
                    </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
