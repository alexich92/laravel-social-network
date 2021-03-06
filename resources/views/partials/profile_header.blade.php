<div class="header">
    <div class="row" style="left:50%; position: relative;">
        <img style=" margin-top: 20px"  src="{{asset('images/avatars/' . $user->avatar)}}" height="100px" alt="">
        <h3 style="color: whitesmoke; margin-left: -6px"><b>{{$user->name}}</b></h3>
        <h5 style="color: darkgrey; margin-left: -7px">{{$user->description}}</h5>
    </div>

</div>

<div class="navigation-1">
    <ul id="profile-nav">
        <li><a  href="{{route('overview',['username'=>$user->username])}}" class="{{ Request::is('*/overview') ? 'active' : '' }}">Overview</a></li>
        <li><a  href="{{route('posts',['username'=>$user->username])}}" class="{{ Request::is('*/posts') ? 'active' : '' }}">Posts</a></li>
        <li><a  href="{{route('upvotes',['username'=>$user->username])}}" class="{{ Request::is('*/likes') ? 'active' : '' }}">Upvotes</a></li>
        <li><a  href="{{route('comments',['username'=>$user->username])}}" class="{{ Request::is('*/comments') ? 'active' : '' }}" >Comments</a></li>
    </ul>
</div>
<hr style="margin-top: -2px">
