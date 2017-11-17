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
        </thead>
        <tbody>
        @foreach($reports as $report)
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
    {{$reports->links()}}


@endsection