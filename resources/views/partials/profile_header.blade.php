<div class="header">
    <div class="row" style="left:50%; position: relative;">
        <img style=" margin-top: 20px"  src="{{asset('images/avatars/' . $user->avatar)}}" height="100px" alt="">
        <h3 style="color: whitesmoke; margin-left: -6px"><b>{{$user->name}}</b></h3>
        <h5 style="color: darkgrey; margin-left: -7px">My funny collection</h5>
    </div>

</div>

<div class="navigation-1">
    <ul>
        <li><a  href="{{route('overview',['slug'=>Auth::user()->name])}}" class="{{ Request::is('*/overview') ? 'active' : '' }}">Overview</a></li>
        <li><a  href="{{route('posts',['slug'=>Auth::user()->name])}}" class="{{ Request::is('*/posts') ? 'active' : '' }}">Posts</a></li>
        <li><a  href="{{route('upvotes',['slug'=>Auth::user()->name])}}" class="{{ Request::is('*/upvotes') ? 'active' : '' }}">Upvotes</a></li>
        <li><a  href="{{route('comments',['slug'=>Auth::user()->name])}}" class="{{ Request::is('*/comments') ? 'active' : '' }}" >Comments</a></li>
    </ul>
</div>
<hr style="margin-top: -2px">
