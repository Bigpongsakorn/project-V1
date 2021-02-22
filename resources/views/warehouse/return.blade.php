@extends('layouts.main-layout')
@section('content')
    <h1>คืน {{ $warehouse_id->equip_name}} </h1>
@if (session('alert'))
<div class="alert alert-success">
    {{ session('alert') }}
</div>
@endif
<form action="/savereturn/{{$warehouse_id->equip_id}}" method="post">
    @csrf
    {{-- @foreach ($borrow_id as $item)
    <input type="hidden" name="b_id" value="{{$item->b_id}}">
    @endforeach --}}
    <h2>จำนวน</h2>
    
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <input type="hidden" name="equip_id" value="{{$warehouse_id->equip_id}}">
    <input type="number" name="equip_amount" value="{{$sql->amount}}" min="0" max="{{$sql->amount}}">
    <input type="submit" value="ตกลง" class="btn btn-primary btnSuccess">
    <a href="/warehouse/borrows">กลับ</a>
</form>
@endsection
