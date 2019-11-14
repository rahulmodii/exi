@extends('layout.app')
@section('content')
<div><img src="{{\Storage::url($paintingdata->painting)}}" height="100px" width="100px" alt=""><div>name:{{$paintingdata->name}}</div></div>


<table class="table">
    <tr>
        <td>name</td>
        <td>description</td>
        <td>venue</td>
        <td>date</td>
        <td>add to this exibhition</td>
    </tr>
    @foreach ($exibhitiondata as $item)
        <tr>
        <td>{{$item->exibhiname}}</td>
        <td>{{$item->exibhidesc}}</td>
        <td>{{$item->exibhivenue}}</td>
        <td>{{$item->exibhidate}}</td>
        <td><a href="/Artist/painting/addtoexi/{{$paintingdata->id}}/{{$item->id}}">add</a></td>
        </tr>
    @endforeach
</table>

@endsection
