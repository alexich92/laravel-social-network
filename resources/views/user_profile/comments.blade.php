@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/custom-header-profile.css') }}" rel="stylesheet">
@endsection

@section('header')
    @include('partials.profile_header');
@endsection

@section('content')

    <div class="col-md-6" style="margin-left: 100px">
        @if(count($posts)>0)


            @foreach($posts->reverse() as $post)
                <h5 style="margin-bottom: -20px"><strong>{{$post->user->name}}</strong> commented</h5>
                <h2>
                    <a target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}" style="text-decoration: none; color: black;font-size: 24px">{{ucfirst($post->title)}}</a>
                </h2>
                <div class="gifs">
                    <a id="" target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}">
                        <img style="margin-bottom: 15px; border: 1px solid #c0c0c0; width: 650px" class="img-responsive"  src="/images/posts/{{$post->image}}" alt="">
                    </a>
                </div>

                <a target="_blank" class="points" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->points}} points</a> &middot

                <a target="_blank" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}#comments">{{count($post->comments)}} comments</a>


                <div class="addthis_inline_share_toolbox_498c pull-right" style="margin-top: 34px"></div>
                @include('partials.likes_buttons')
                <hr>
            @endforeach


            <h3 class="text-center" style="color: darkgrey; padding-top: 14px; border: 2px solid dimgray; height: 60px " >No more posts</h3>

        @else

            <div class="jumbotron">
                <div class="jumbotron">
                    <h5 class="text-center" style="color: darkgrey; " >Posts you commented will show up here</h5>
                    <a href="/hot" class="btn btn-primary center" style="margin-left: 25%">Checkout What's Hot</a>
                </div>
            </div>
        @endif

    </div>
    @include('random_posts')


@endsection

@section('js')
    <script src="{{asset('js/like.js')}}"></script>
@endsection



