@extends('layouts.app')

@section('content')

    <!-- Blog Post Content Column -->
    <div class="col-md-8">
        <!-- Blog Post Title -->
        <h3><b>{{$post->title}}</b></h3>giyt

        <a href="">123 points</a> &middot
        <a href="#comments">123 comments</a>

        <div class="media">


            <div class="addthis_inline_share_toolbox_498c pull-right" style="margin-top: 34px"></div>
            <div class="media" data-postid="{{$post->id}}">

                <button type="button" class="btn btn-default btn-sm like">Up
                    {{--{{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 1 ? 'You like this post' :'Like' :'Like'}}--}}
                </button>
                <button type="button"  class="btn btn-default btn-sm like">Down
                    {{--{{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 0 ? 'You don\'t like this post' :'Dislike' :'Dislike'}}--}}
                </button>
            </div>

            {{--@if($next)--}}
                <a style="margin-top: -35px" id="nextbutton" href="" class="next pull-right">Next Post &raquo;</a>
            {{--@endif--}}
        </div>




        <!-- Preview Image -->

        <img style="margin-top: 10px" class="img-responsive center-block" src="/images/posts/{{$post->image}}" alt=""  data-lity>

        <hr>
        {{--<div class="media">--}}
            {{--@if(Auth::id() !== $post->user_id)--}}
                {{--<a href="#" class="pull-right">Report</a>--}}
            {{--@else--}}
                {{--<a  class="pull-right" href="javascript:void(0);" onclick="$(this).find('form').submit();">Delete--}}
                    {{--<form action="{{route('delete.post',['id'=>$post->id])}}" method="post">--}}
                        {{--{{csrf_field()}}--}}
                        {{--{{method_field('DELETE')}}--}}
                    {{--</form>--}}
                {{--</a>--}}

            {{--@endif--}}

        {{--</div>--}}
        {{--<p><b>{{count($post->comments)}} comments</b></p>--}}

        <hr>
        <!-- Blog Comments -->

        <!-- Comments Form -->
        @if(Auth::check())
            <div class="well">
                <h4>Leave a Comment:</h4>
                {!! Form::open(['route'=>['comment.store',$post->id],'method'=>'Post']) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::textarea('body',null,['class'=>'form-control noresize','rows'=>3,'placeholder'=>'Write comments...']) !!}
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
                {!! Form::close() !!}
            </div>
        @else
            <h3 class="text-center">You need to <a href="{{route('login')}}">Log in</a> or <a href="{{route('register')}}">Sign up</a> to leave a comment.</h3>
        @endif

        <hr>

        <!-- Posted Comments -->
        <!-- Comment -->
        {{--@if(count($post->comments)>0)--}}
            {{--@foreach($post->comments as $comment)--}}
                {{--<div class="media" id="comments" >--}}
                    {{--<a class="pull-left" href="#">--}}
                        {{--<img class="media-object" src="/images/avatars/{{$comment->photo}}" width="50" alt="">--}}
                    {{--</a>--}}
                    {{--<div class="media-body">--}}
                        {{--<h4 class="media-heading">{{$comment->author}}--}}
                            {{--<small>--}}
                                {{--{{$comment->created_at->diffForHumans()}}--}}
                            {{--</small>--}}
                        {{--</h4>--}}
                        {{--<p>{{$comment->body}}</p>--}}

                        {{--<div class="comment-replay-container">--}}
                            {{--<a class="toggle-replay btn btn-default" id="replybutt">Reply</a>--}}
                            {{--<div class="comment-replay ">--}}
                                {{--{!! Form::open(['method'=>'Post','action'=>'CommentRepliesController@createReply','id'=>'form1']) !!}--}}
                                {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-11">--}}
                                            {{--{!! Form::textarea('body',null,['class'=>'form-control noresize','rows'=>2,'placeholder'=>'Write a reply']) !!}--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-1">--}}
                                            {{--{!! Form::submit('Post',['class'=>'btn btn-primary pull-right','id'=>'postreplaybutt']) !!}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}

                        {{--@if(count($comment->replies)>0)--}}
                            {{--@foreach($comment->replies as $replay)--}}
                                {{--<!-- Nested Comment -->--}}
                                    {{--<!-- Nested Comment -->--}}
                                    {{--<div id="nested-comment" class="media">--}}
                                        {{--<a class="pull-left" href="#">--}}
                                            {{--<img  class="media-object" src="/images/avatars/{{$replay->photo}}" width="35" alt="">--}}
                                        {{--</a>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h4 class="media-heading">{{$replay->author}}--}}
                                                {{--<small>{{$replay->created_at->diffForHumans()}}</small>--}}
                                            {{--</h4>--}}
                                            {{--<p>{{$replay->body}}</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="comment-replay-container">--}}
                                            {{--<a class="toggle-replay btn btn-default" id="replybutt">Reply</a>--}}
                                            {{--<div class="comment-replay ">--}}
                                                {{--{!! Form::open(['method'=>'Post','action'=>'CommentRepliesController@createReply','id'=>'form1']) !!}--}}
                                                {{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<div class="row">--}}
                                                        {{--<div class="col-md-11">--}}
                                                            {{--{!! Form::textarea('body',null,['class'=>'form-control noresize','rows'=>2,'placeholder'=>'Write a reply']) !!}--}}
                                                        {{--</div>--}}
                                                        {{--<div class="col-md-1">--}}
                                                            {{--{!! Form::submit('Post',['class'=>'btn btn-primary pull-right','id'=>'postreplaybutt']) !!}--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--{!! Form::close() !!}--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}

                        {{--<!-- End Nested Comment -->--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                </div>

                <div class="col-md-4" style="padding-top: 20px">




    </div>



    <div class="clearfix">

    </div>



@endsection

@section('js')
    <script>
        $(".toggle-replay").click(function(){
            $('.comment-replay').hide()
            $(this).next().slideToggle("fast");
        });
    </script>
@endsection
