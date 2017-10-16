@extends('layouts.master_admin')

@section('content')

    <table class="table table-hover">
        <thead>
        <th>
            Id
        </th>
        <th>
            Image
        </th>
        <th>
            Title
        </th>
        <th>
            View
        </th>
        <th>
            Comments
        </th>
        <th>
            Created
        </th>
        <th>
            Delete
        </th>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img src="/images/posts/{{$post->image}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                <td>{{$post->title}}</td>
                <td>
                    <a href="{{route('post.single',['slug'=>$post->slug])}}" class="btn btn-xs btn-info">View Post</a>
                </td>
                <td>
                    <a href="{{route('post.comments',['slug'=>$post->slug])}}" class="btn btn-xs btn-success">{{count($post->comments)}}</a>
                </td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>
                    <form action="{{route('posts.destroy',['id'=>$post->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-xs btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$posts->links()}}


@endsection