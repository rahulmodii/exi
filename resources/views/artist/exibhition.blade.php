@extends('layout.app')
@section('content')
<table class="table" >
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Add Image</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->exibhiname}}</td>
                <td>{{$item->exibhidesc}}</td>
                <td>{{$item->exibhivenue}}</td>
                <td>{{$item->exibhidate}}</td>
                <td><a href="/Artist/exibhition/details/{{$item->id}}">add image</a></td>
            </tr>

        @endforeach
    </table>
@endsection

