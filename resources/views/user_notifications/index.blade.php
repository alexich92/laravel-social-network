@extends("layouts.app")

@section('content')
<div class="col-xs-6 col-lg-offset-2">
    <h3 class="text-center">Notifications</h3>
    <hr>
    <ul style="list-style-type: none;">
        @forelse($notifications as $notification)
            @if($notification['type'] =='App\Notifications\UpvotePost')
            <li>
                <img style="width: 16px;
                height: 16px;" src="{{asset('storage/upvote.png')}}" alt="">
                <h6 style="margin-left: 20px;margin-top: -15px;">
                    <span></span><a target="_blank" href="{{route('overview',['username'=>$notification->data['user']['username']])}}"><strong>{{$notification->data['user']['username']}}</strong></a>
                        upvoted your post
                    <a target="_blank" href="{{route('post.single',['slug'=>$notification->data['post']['slug']])}}"><strong>{{$notification->data['post']['title']}}</strong></a>. &nbsp;
                    {{$notification->created_at->diffForHumans()}}
                </h6>
            </li>
            <hr>
            @elseif($notification['type'] =='App\Notifications\RepliedToComment')
                <li>
                    <img style="width: 16px;
                height: 16px;" src="{{asset('storage/comment_ico.ico')}}" alt="">
                    <h6 style="margin-left: 20px;margin-top: -15px;">
                        <span></span><a target="_blank" href="{{route('overview',['username'=>$notification->data['user']['username']])}}"><strong>{{$notification->data['user']['username']}}</strong></a>
                        replayed to your comment on
                        <a target="_blank" href="{{route('post.single',['slug'=>$notification->data['post']['slug']])}}#comments"><strong>{{$notification->data['post']['title']}}</strong></a>. &nbsp;
                        {{$notification->created_at->diffForHumans()}}
                    </h6>
                </li>
                <hr>
            @else

                <li>
                    <img style="width: 16px;
                height: 16px;" src="{{asset('storage/comment_ico.ico')}}" alt="">
                    <h6 style="margin-left: 20px;margin-top: -15px;">
                        <span></span><a target="_blank" href="{{route('overview',['username'=>$notification->data['user']['username']])}}"><strong>{{$notification->data['user']['username']}}</strong></a>
                        commented on your post
                        <a target="_blank" href="{{route('post.single',['slug'=>$notification->data['post']['slug']])}}#comments"><strong>{{$notification->data['post']['title']}}</strong></a>. &nbsp;
                        {{$notification->created_at->diffForHumans()}}
                    </h6>
                </li>
                <hr>
            @endif
        @empty
            <p>No new notification</p>
        @endforelse
    </ul>
</div>

@endsection