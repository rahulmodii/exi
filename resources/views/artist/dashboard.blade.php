{{-- {{dd($data)}} --}}
@extends('layout.app')
@section('content')
<a href="/Artist/painting">Create Painting</a>
<table>
    <tr>
        <th>image</th>
        <th>name</th>
        <th>description</th>
        <th>enable/disable</th>
        <th>edit</th>
        <th>delete</th>
        <th>exibhitions</th>
    </tr>
    @foreach ($data as $item)
    <tr>
    <td><img src="{{\Storage::url($item->painting)}}" height="100px" width="100px" alt=""></td>
    <td>{{$item->name}}</td>
    <td>{{$item->description}}</td>
    <td><a href="">enable/disable</a></td>
    <td><a href="">edit</a></td>
    <td><a href="">delete</a></td>
    <td><a href="/exibhitionsjoined/{{$item->id}}">exibhitions</a></td>
    </tr>
    @endforeach
</table>

@endsection
