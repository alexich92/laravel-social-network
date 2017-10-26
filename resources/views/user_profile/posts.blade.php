@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/custom-header-profile.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.profile_header');
@endsection

@section('content')

    <div class="col-md-6" style="margin-left: 100px">
        @if(count($user->posts)>0)


            @foreach($user->posts->reverse() as $post)

                <h2>
                    <a target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}" style="text-decoration: none; color: black;font-size: 24px">{{ucfirst($post->title)}}</a>
                </h2>
                <div class="gifs">
                    <a id="" target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}">
                        <img style="margin-bottom: 15px; border: 1px solid #c0c0c0; width: 650px" class="img-responsive"  src="/images/posts/{{$post->image}}" alt="">
                    </a>
                </div>

                <a target="_blank" id="points" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->points}} points</a> &middot

                <a target="_blank" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}#comments">{{count($post->comments)}} comments</a>


                <div class="addthis_inline_share_toolbox_498c pull-right" style="margin-top: 34px"></div>
                    @include('partials.likes_buttons')
                <hr>
            @endforeach


                <h3 class="text-center" style="color: darkgrey; padding-top: 14px; border: 2px solid dimgray; height: 60px " >No more posts</h3>

        @else

            <div class="jumbotron">
            <div class="jumbotron">
                <h5 class="text-center" style="color: darkgrey; " >Posts you uploaded will show up here</h5>
                <a href="" class="btn btn-primary center" style="margin-left: 25%">Create a Post</a>
            </div>
        </div>
        @endif

    </div>






    {{--<div class="col-md-4" style="padding-top: 20px">--}}

        {{--@foreach($random_posts as $random_post)--}}
            {{--<div class="row" style="padding-bottom: 10px">--}}
                {{--<div class="pull-right"><a  href="{{route('post.single',['slug'=>$random_post->slug])}}"  target="_blank"><img class="img-responsive" style="height: 127px;" width="250px" src="/images/posts/{{$random_post->photo}}"></a></div>--}}
                {{--<div class="" style="margin-left: 36%;">--}}
                    {{--<a href="{{route('post.single',['slug'=>$random_post->slug])}}"  target="_blank" style="text-decoration: none; color: black "><p style="margin-left: -7px"><b>{{$random_post->title}}</b></p></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}

@endsection

@section('js')
    <script src="{{asset('js/like.js')}}"></script>
@endsection


