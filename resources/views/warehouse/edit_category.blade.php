@extends('layouts.main-layout')
@section('content')
<form action="/updatecategory/{{$category->categoryw_id}}}" method="post">
    @csrf
    แก้ไขชื่อประเภทอุปกรณ์
    <input type="text" name="categoryw_name" value="{{$category->categoryw_name}}">
    <input type="submit" value="ตกลง" class="btn btn-success btnSuccess">
</form>
@endsection