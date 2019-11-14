@extends('layout.app')
@section('content')
<img src="{{\Storage::url($data->painting)}}" width="100px" height="100px" alt="">
<form action="/Artist/painting/{{$data->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="file" name="painting" id="" >
    <input type="text" name="name" id="" value="{{$data->name}}" >
    <input type="text" name="description" id="" value="{{$data->description}}" >
    <input type="submit">
</form>
@endsection
