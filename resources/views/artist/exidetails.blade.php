@extends('layout.app')
@section('content')
<div>{{$data}}</div>
<table class="table">
    <tr>
       <td>image</td>
       <td>name</td>
       <td>description</td>
       <td>Add to this exibhition</td>
    </tr>
    @foreach ($painting as $item)
    <tr>
        <td><img src="{{\Storage::url($item->painting)}}" height="100px" width="100px" alt=""></td>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
    <td><a href="/Artist/exibhition/add/{{$data->id}}/{{$item->id}}">add</a></td>
    </tr>
    @endforeach
</table>
@endsection

