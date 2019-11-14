@extends('layout.app')
@section('content')
<form action="" method="post">
        @csrf
        <input type="text" name="exibhiname">
        <input type="text" name="exibhidesc">
        <input type="text" name="exibhivenue">
        <input type="date" name="exibhidate">
        <input type="submit">
    </form>
    <table class="table">
        <tr>
            <td>name</td>
            <td>description</td>
            <td>venue</td>
            <td>date</td>
            <td>edit</td>
            <td>enable/disable</td>
            <td>permanent delete</td>
        </tr>
        @foreach ($data as $item)
            <tr>
            <td>{{$item->exibhiname}}</td>
            <td>{{$item->exibhidesc}}</td>
            <td>{{$item->exibhivenue}}</td>
            <td>{{$item->exibhidate}}</td>
            <td><a href="/superadmin/exibhition/{{$item->id}}/edit">edit</a></td>
            <td><a href="/superadmin/exibhition/destroy/{{$item->id}}">disable</a></td>
            <td><a href="/superadmin/exibhition/delete/{{$item->id}}">permanent delete</a></td>
            </tr>
        @endforeach
        @foreach ($trasheddata as $item)
            <tr>
            <td>{{$item->exibhiname}}</td>
            <td>{{$item->exibhidesc}}</td>
            <td>{{$item->exibhivenue}}</td>
            <td>{{$item->exibhidate}}</td>
            <td><a href="/superadmin/exibhition/{{$item->id}}/edit">edit</a></td>
            <td><a href="/superadmin/exibhition/restore/{{$item->id}}">enable</a></td>
            <td><a href="/superadmin/exibhition/delete/{{$item->id}}">permanent delete</a></td>
            </tr>
        @endforeach
    </table>
@endsection

