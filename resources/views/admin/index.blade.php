@extends('layouts.master_admin')

@section('content')
    <h1>Users</h1>

    <!-- Users Table -->
    <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    {{--<th>Image</th>--}}
                    <th>Email</th>
                    <th>Registered</th>
                    <th>Last Update</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        {{--<td><img src="/images/avatars/{{$user->avatar}}" alt=""  height="50" width="70"></td>--}}
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        @if($user->isAdmin)
                            <td><span class="label label-danger">Admin</span></td>
                        @else
                            <td><span class="label label-success">User</span></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{$users->links()}}






@endsection