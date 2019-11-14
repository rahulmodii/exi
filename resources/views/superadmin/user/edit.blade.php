@extends('layout.app')
@section('content')
<form action="/superadmin/user/{{$data->id}}" method="POST">
    @csrf
    @method('PUT')
<input type="hidden" name="id" value="{{$data->id}}">
<input type="text" name="name" id="" value="{{$data->name}}">
<input type="text" name="email" id="" value="{{$data->email}}">
<input type="submit" value="update" name="" id="">
</form>
@endsection

