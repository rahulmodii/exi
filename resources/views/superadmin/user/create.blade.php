@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Create User</h3>
    </div>
    <div class="col-md-12">
            <form action="" method="POST">
                    @csrf
                <input type="text" name="name" id="" placeholder="name">
                <input type="text" name="email" id="" placeholder="email">
                <input type="text" name="password" id="" placeholder="password" >
                <input type="submit" name="" id="">
                </form>

                <table class="table">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>edit</th>
                        <th>enable/disable</th>
                        <th>delete</th>
                    </tr>
                    @foreach ($data as $item)
                        <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td><a href="/superadmin/user/{{$item->id}}/edit">edit</a></td>
                        <td><a href="/superadmin/user/delete/{{$item->id}}">disable</a></td>
                        <td><a href="/superadmin/user/perdelete/{{$item->id}}">permanent delete</a></td>
                        </tr>
                    @endforeach
                    @foreach ($trasheduser as $item)
                        <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td><a href="/superadmin/user/{{$item->id}}/edit">edit</a></td>
                        <td><a href="/superadmin/user/restore/{{$item->id}}">enable</a></td>
                        <td><a href="/superadmin/user/perdelete/{{$item->id}}">permanent delete</a></td>
                        </tr>
                    @endforeach
                </table>
    </div>
</div>


@endsection

