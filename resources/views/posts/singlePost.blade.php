@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.0/lity.min.css">
    <style>
        textarea{
            resize:none;
        }

        .comment-replay {
            display:none;
        }
        #replybutt{
            border: none;
            margin-left: -10px;
            background-color:transparent;
            box-shadow: none;
            margin-top: -6px;
        }

        #postreplaybutt{
            height: 54px;
        }

        .txt{
            height: auto;
            width: 89%;
            margin-left: 70px;
        }

    </style>
@endsection

@section('content')
    @include('partials.redirect_to_login_modal')
    @include('partials.reports_modal')

    <!-- Blog Post Content Column -->
    <div class="row">
    <div class="col-md-8">
        <!-- Blog Post Title -->
        <h1><b>{{$post->title}}</b></h1>

        <a href="" class="points">{{$post->points}} {{str_plural('point',$post->points)}}</a> &middot
        <a href="#comments">{{count($post->comments)}} comments</a>

        <div class="media">

            <div class="addthis_inline_share_toolbox_cqrk pull-right" style="margin-right: 240px;margin-top: 15px;" ></div>
            @if(Auth::check())
                @include('partials.likes_buttons')
            @else
                <div class="media">
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
            @endif

            {{--@if($next)--}}
                {{--<a style="margin-top: -35px" id="nextbutton" href="{{route('post.single',['slug'=>$next->slug])}}" class="next pull-right">Next Post &raquo;</a>--}}
            {{--@endif--}}
        </div>




        <!-- Preview Image -->

        <img style="margin-top: 10px" class="img-responsive center-block" src="/images/posts/{{$post->image}}" alt=""  data-lity>

        <hr>
        <div class="media">
            @if(Auth::id() !== $post->user_id)
                <a href="#" data-toggle="modal" data-target="{{!Auth::check() ? '#myModal' : '#reportsModal'}}" class="pull-right">Report</a>
            @else
                <a  class="pull-right" href="javascript:void(0);" onclick="$(this).find('form').submit();">Delete
                    <form class="delete" action="{{route('post.delete',['id'=>$post->id])}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    </form>
                </a>

            @endif

        </div>
        <p style="margin-top: -20px"><b>{{count($post->comments)}} comments</b></p>

        <hr>
        <!-- Blog Comments -->

        <!-- Comments Form -->
        @if(Auth::check())
            <div class="row">
            <div class="image-container col-md-1">
                <img width="50px" src="/images/avatars/{{auth()->user()->avatar}}" alt="">
            </div>
        <div class="textarea-com">
            {!! Form::open(['route'=>['comment.store',$post->id],'method'=>'Post']) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        {!! Form::textarea('body',null,['class'=>'txt form-control','rows'=>3,'placeholder'=>'Write comments...']) !!}
                    </div>
                <button type="submit" style="margin-top: -60px;margin-right: 24px;" class="btn btn-primary pull-right">Post</button>
            {!! Form::close() !!}
        </div>
            </div>
        @else
            <h3 class="text-center">You need to <a href="{{route('login')}}">Log in</a> or <a href="{{route('register')}}">Sign up</a> to leave a comment.</h3>
        @endif

        <hr>

        <!-- Posted Comments -->
        <!-- Comment -->

        @if(count($post->comments)>0)
            <h5 style="font-weight: 900;">My comments</h5>
            @foreach($post->comments as $comment)
                <div class="media" id="comments" >
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/images/avatars/{{$comment->avatar}}" width="50" alt="">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading"><a href="{{route('overview' ,['username'=>$comment->author])}}">{{$comment->author}}</a>
                            @if($post->user_id=== $post->user->id && $comment->user_id ===$post->user->id)
                                &nbsp;<span style="font-weight: 700;color: #00b22d;font-size: 11px;">OP</span> &middot;
                            @endif
                            <small>
                                {{$comment->created_at->diffForHumans()}}
                            </small>
                        </h5>
                        <p>{{$comment->body}}</p>

                        <div class="comment-replay-container">
                            <a class="toggle-replay btn btn-default" id="replybutt">Reply</a>
                            <div class="comment-replay ">
                                {!! Form::open(['method'=>'Post','action'=>'CommentRepliesController@createReply']) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-11">
                                            {!! Form::textarea('body',null,['class'=>'form-control noresize','rows'=>1,'placeholder'=>'Write a reply']) !!}
                                        </div>
                                        <div class="col-md-1">
                                            {!! Form::submit('Post',['class'=>'btn btn-primary pull-right']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>


                        @if(count($comment->replies)>0)
                            @foreach($comment->replies as $replay)
                                    <div  class="reply">
                                <!-- Nested Comment -->
                                    <!-- Nested Comment -->
                                    <div id="nested-comment" class="media">
                                        <a class="pull-left" href="#">
                                            <img  class="media-object" src="/images/avatars/{{$replay->image}}" width="35" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="{{route('overview' ,['username'=>$replay->author])}}">{{$replay->author}}</a>
                                                @if($post->user_id=== $post->user->id && $replay->author ===$post->user->username)
                                                    &nbsp;<span style="font-weight: 700;color: #00b22d;font-size: 11px;">OP</span> &middot;
                                                @endif
                                                <small>{{$replay->created_at->diffForHumans()}}</small>
                                            </h5>
                                            <p>{{$replay->body}}</p>
                                        </div>
                                        <div class="comment-replay-container">
                                            <a class="toggle-replay btn btn-default" id="replybutt">Reply</a>
                                            <div class="comment-replay">
                                                    {!! Form::open(['method'=>'Post','action'=>'CommentRepliesController@createReply']) !!}
                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                                {!! Form::textarea('body',null,['class'=>'form-control noresize','rows'=>1,'placeholder'=>'Write a reply']) !!}
                                                            </div>
                                                            <div class="col-md-1">
                                                                {!! Form::submit('Post',['class'=>'btn btn-primary pull-right']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        @endif

                        <!-- End Nested Comment -->
                        </div>
                        </div>

                    </div>
                    @endforeach
                @else
                <div class="well">
                    <h4 style="text-align: center"> There are no comments</h4>
                    <div id="wrapper" style="text-align: center">
                        <button id="focusTextarea" type="submit" class="btn btn-primary ">Say something nice</button>
                    </div>
                </div>

        @endif
    </div>
            @include('random_posts')
    </div>



    <div class="clearfix" style="padding-bottom: 200px">

    </div>

@endsection

@section('js')
    <!--Confirm if the user want to delete his post -->
    <script>
        $(".delete").on("submit", function(){
            return confirm("Are you sure you want to delete this post?");
        });
    </script>

    <!-- Show post reply textarea -->
    <script>
        $(".toggle-replay").click(function(){
            $('.comment-replay').hide()
            $(this).next().slideToggle("fast");
        });
    </script>

    <script>
        $("#focusTextarea").click(function(){
            $('.txt').focus();
        })
    </script>

    {{--<script>--}}
        {{--$('#getReplies').click(function(){--}}
            {{--$(this).hide();--}}
            {{--$('.reply').removeClass('hidden');--}}
        {{--})--}}
    {{--</script>--}}

    <script src="{{asset('js/reports.js')}}"></script>

    <script src="{{asset('js/like.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.0/lity.min.js"></script>

@endsection