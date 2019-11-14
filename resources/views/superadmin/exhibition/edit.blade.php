@extends('layout.app')
@section('content')
<form action="/superadmin/exibhition/{{$data->id}}" method="post">
    @csrf
    @method('PUT')
<input type="hidden" name="id" value="{{$data->id}}">
<input type="text" name="exibhiname" value="{{$data->exibhiname}}">
<input type="text" name="exibhidesc" value="{{$data->exibhidesc}}">
<input type="text" name="exibhivenue" value="{{$data->exibhivenue}}">
<input type="date" name="exibhidate" value="{{$data->exibhidate}}">
    <input type="submit">
</form>
@endsection

