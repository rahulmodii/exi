@extends('layout.app')
@section('content')
<div class="row" style="margin-bottom:50px">
       <div class="col-md-3"></div> <h3>Add Painting</h3>
       <div class="col-md-9">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="painting" id="" >
                <input type="text" name="name" id="" >
                <input type="text" name="description" id="" >
                <input type="submit">
            </form>
       </div>

</div>

{{-- {{dd($data)}} --}}
<table  id="example" class="display" style="width:100%">
        <thead>
    <tr>
        <td>painting</td>
        <td>name</td>
        <td>description</td>
        <td>exibhition joined</td>
        <td>add this painting to exhibition</td>
        <td>edit</td>
        <td>enable/disable</td>
        <td>permanent delete</td>
    </tr>
        </thead>
        <tbody>
    @foreach ($data as $item)
        <tr>
            <td> <img src="{{\Storage::url($item->painting)}}" height="100px" width="100px" alt=""></td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td><a href="/Artist/painting/exibhitions/{{$item->id}}">joined</a></td>
            <td><a href="/Artist/painting/addpainting/{{$item->id}}">add painting</a></td>
            <td><a href="/Artist/painting/{{$item->id}}/edit">edit</a></td>
            <td><a href="/Artist/painting/destroy/{{$item->id}}">disable</a></td>
            <td><a href="/Artist/painting/delete/{{$item->id}}">permanent delete</a></td>
        </tr>
    @endforeach
    @foreach ($trasheddata as $item)
        <tr>
            <td><img src="{{\Storage::url($item->painting)}}" height="100px" width="100px" alt=""></td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td><a href="/Artist/painting/{{$item->id}}/edit">edit</a></td>
            <td><a href="/Artist/painting/restore/{{$item->id}}">enable</a></td>
            <td><a href="/Artist/painting/delete/{{$item->id}}">permanent delete</a></td>
        </tr>
    @endforeach
        </tbody>
</table>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>
@endsection

