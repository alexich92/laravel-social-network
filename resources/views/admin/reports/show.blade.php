@extends('layouts.master_admin')

@section('content')

    <table class="table table-hover">
        <thead>
        <th>
            Id
        </th>
        <th>
            Author
        </th>
        <th>
            Post
        </th>
        <th>
            Report Type
        </th>
        <th>
            Created
        </th>
        <th>
            <form action="{{route('posts.destroy',['id'=>$post->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-xs btn-danger">Delete Post</button>
            </form>
        </th>
        </thead>
        <tbody>
        @foreach($post->reports as $report)
            <tr>
                <th>{{$report->id}}</th>
                <td>{{$report->user->name}}</td>
                <td><img src="/images/posts/{{$report->post->image}}" alt="{{$report->post->title}}" width="90px" height="50px"></td>
                <th>{{$report->report->name}}</th>
                <td>{{$report->created_at->diffForHumans()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection