@extends('layouts.master_admin')
@section('content')

    <div class="box-body">
        @if(count($comments)>0)
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Post</th>
                    <th>Body</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Replies</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td><a href="{{route('post.single',['slug' => $comment->post->slug])}}"><img src="/images/posts/{{$comment->post->image}}" alt="view post"  height="50" width="70"></a></td>
                        <td>{{$comment->body}}</td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>{{$comment->updated_at->diffForHumans()}}</td>

                        <td>
                            <a href="{{route('comment.replies',['id'=>$comment->id])}}" class="btn btn-xs btn-success">{{count($comment->replies)}}</a>
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['comments.destroy', $comment->id],'class'=>'delete_form']) !!}
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
        <h2 class="text-center">There are no comments for this post!</h2>
        @endif
        </div>
        <!-- /.box -->

@endsection