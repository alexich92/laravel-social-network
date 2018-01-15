<div class="col-md-3" style="margin-left: 50px">
    <ul class="nav nav-pills nav-stacked" id="user_nav">
        <li class="{{Request::is('settings/account') ? "active": ""}}"><a href="/settings/account" >Account</a></li>
        <li class="{{Request::is('settings/password') ? "active": ""}}"><a href="/settings/password" >Password</a></li>
        <li class="{{Request::is('settings/profile') ? "active": ""}}"><a href="/settings/profile" >Profile</a></li>
    </ul>
</div>