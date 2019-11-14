{{-- {{dd($data)}} --}}

@extends('layout.app')
@section('content')
<table class="table">
        <tr>
            <td>name</td>
            <td>description</td>
            <td>venue</td>
            <td>date</td>
        </tr>
        @foreach ($data as $item)
            <tr>
            <td>{{$item->exibhition()->first()->exibhiname}}</td>
            <td>{{$item->exibhition()->first()->exibhidesc}}</td>
            <td>{{$item->exibhition()->first()->exibhivenue}}</td>
            <td>{{$item->exibhition()->first()->exibhidate}}</td>
            </tr>
        @endforeach
    </table>
@endsection

