@if(Auth::check())
<div class="media" data-postid="{{$post->id}}">
    <button type="button" class="btn btn-{{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 1 ? 'primary' :'default' :'default'}} btn-sm like">
        {{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 1 ? 'You like this post' :'Like' :'Like'}}
    </button>
    <button type="button"  class="btn btn-{{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 0 ? 'primary' :'default' :'default'}} btn-sm like">
        {{Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like == 0 ? 'You don\'t like this post' :'Dislike' :'Dislike'}}
    </button>
    <a target="_blank" class="btn btn-default btn-sm" href="{{route('post.single',['slug'=>$post->slug])}}#comments">
        <span class="glyphicon glyphicon-comment"></span>
    </a>
</div>
    @else
    @include('partials.redirect_to_login_modal')
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
@endif