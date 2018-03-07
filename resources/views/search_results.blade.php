@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/search_post_results.css') }}">
@endsection

@section('content')


<div class="col-md-7" style="margin-left: 100px">
    <form action="/search" method="get">
        <div class="inner-addon left-addon form-group">
            <i class="glyphicon glyphicon-search"></i>
            <input type="text" class="form-control" name="query" value="{{request('query')}}">
        </div>
    </form>
    <p><b>{{count($posts)}} Results</b></p>
    @if(count($posts)>0)
        @foreach($posts->reverse() as $post)
            <div class="paragraphs" style="margin-bottom: 20px">
                <div class="row">
                    <div class="span4">
                        <div class="clearfix content-heading">
                            <a href="{{route('post.single',['slug'=>$post->slug])}}"  target="_blank">
                            <img style="margin-left: 18px;margin-right: 20px" class="pull-left" height="127px" width="250px" src="images/posts/{{$post->image}}" alt="">
                            </a>
                            <a href="{{route('post.single',['slug'=>$post->slug])}}"  target="_blank">
                                <h4><b>{{ucfirst($post->title)}}</b></h4>
                                <p style="color:darkgrey;">{{$post->points}} points</p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="jumbotron">
            <div class="jumbotron">
                <h4 class="text-center" style="color: darkgrey; " >Sorry! No results were found</h4>
             </div>
        </div>
    @endif
</div>

{{--<div class="col-md-4" style="padding-top: 20px">--}}

    {{--@foreach($random_posts as $random_post)--}}
        {{--<div class="row" style="padding-bottom: 10px">--}}
            {{--<div class="pull-right"><a  href="{{route('post.single',['slug'=>$post->slug])}}"  target="_blank"><img class="img-responsive size" style="height:127px" width="250px" src="images/posts/{{$random_post->photo}}"></a></div>--}}
            {{--<div class="" style="margin-left: 36%">--}}
                {{--<a href="{{route('post.single',['slug'=>$post->slug])}}"  target="_blank" style="text-decoration: none">{{$random_post->title}}</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--</div>--}}
@endsection