@extends('layouts.app')
@section('css')
    <title>9GAG {{$section->name}}</title>
@endsection
@section('content')
    @include('partials.redirect_to_login_modal')



    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-6" style="margin-left: 100px">

            <!-- First Blog Post -->
            @if(Auth::user())
                {{--@if(count($section->posts)>0)--}}
                @foreach($section->posts->reverse() as $post)

                    <h2>
                        <a target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}" style="text-decoration: none; color: black;font-size: 24px">{{ucfirst($post->title)}}</a>
                    </h2>
                    <div class="gifs">
                        @if($post->isGif($post->image))
                            <img style="margin-bottom: 15px; border: 1px solid #c0c0c0; width: 650px" src="/images/posts/preview/{{$post->imagePreview}}"  class="gif img-responsive"   data-gif="/images/posts/{{$post->image}}"  alt="">
                        @else
                            <a id="" target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}">
                                <img style="margin-bottom: 15px; border: 1px solid #c0c0c0; width: 650px" class="img-responsive" src="/images/posts/{{$post->image}}" alt="">
                            </a>
                        @endif
                    </div>

                    <a target="_blank" id="points-{{$post->id}}" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->points}} points</a> &middot

                    <a target="_blank" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}#comments">{{count($post->comments)}} comments</a>


                    <div class="addthis_inline_share_toolbox_498c pull-right" style="margin-top: 34px"></div>
                        @include('partials.likes_buttons')
                    <hr>
                @endforeach
                @if(count($section->posts)>0)
                    <h3 class="text-center" style="color: darkgrey; padding-top: 14px; border: 2px solid dimgray; height: 60px " >No more posts!</h3>
                @else
                    <h3 class="text-center" style="color: darkgrey; padding-top: 14px; border: 2px solid dimgray; height: 60px " >There no posts in this section</h3>

                @endif


            @else

                @foreach($section->posts->reverse() as $post)

                    <h2>
                        <a target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}" style="text-decoration: none; color: black;font-size: 24px">{{ucfirst($post->title)}}</a>
                    </h2>

                {{--hahashahsajdasasfas--}}

                    <div class="gifs">

                            @if($post->isGif($post->image))
                                <img style="margin-bottom: 15px; border: 1px solid #c0c0c0; width: 650px" src="/images/posts/preview/{{$post->imagePreview}}"  class="gif img-responsive"   data-gif="/images/posts/{{$post->image}}"  alt="">
                            @else
                            <a id="" target="_blank" href="{{route('post.single',['slug'=>$post->slug])}}">
                                <img style="margin-bottom: 15px; border: 1px solid #c0c0c0; width: 650px" class="img-responsive" src="/images/posts/{{$post->image}}" alt="">
                            </a>
                            @endif


                    </div>

                    <a target="_blank" class="points" style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}">{{$post->points}} points</a> &middot

                    <a target="_blank"  style="margin-top: 20px; color: darkgrey" href="{{route('post.single',['slug'=>$post->slug])}}#comments">{{count($post->comments)}} comments</a>


                    <div class="addthis_inline_share_toolbox_498c pull-right" style="margin-top: 34px"></div>
                    <div class="media" data-postid="{{$post->id}}">


                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                            Like
                        </button>
                        <button type="button"  class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                            Dislike
                        </button>
                        <a target="_blank" class="btn btn-default btn-sm" href="{{route('post.single',['slug'=>$post->slug])}}#comments">
                            <span class="glyphicon glyphicon-comment"></span>
                        </a>
                    </div>


                    <hr>
                @endforeach
                    @if(count($section->posts)>0)
                        <h3 class="text-center" style="color: darkgrey; padding-top: 14px; border: 2px solid dimgray; height: 60px " >No more posts!</h3>
                    @else
                    <h3 class="text-center" style="color: darkgrey; padding-top: 14px; border: 2px solid dimgray; height: 60px " >There no posts in this section</h3>
                    @endif
                @endif



        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('random_posts')
    </div>


@endsection

@section('js')
    <script src="{{asset('js/like.js')}}"></script>
@endsection
