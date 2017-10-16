@extends('layouts.master_admin')
@section('content')

    <div class="box-body">
        @if(count($replies)>0)
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Body</th>
                    <th>Replied</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->body}}</td>
                        <td>{{$reply->created_at->diffForHumans()}}</td>

                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['replies.destroy', $reply->id],'class'=>'delete_form']) !!}
                            <button class="btn btn-danger btn-xs">Delete</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <!-- /.box-body -->
    @else
        <h2 class="text-center">There are no replies for this comment!</h2>
        @endif
        </div>
        <!-- /.box -->

@endsection