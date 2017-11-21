<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                9GAG
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @foreach($sections as $section)
                    <li class=""><a href="{{route('section.posts',['slug'=>$section->slug])}}">{{$section->name}}</a></li>
                @endforeach
                &nbsp;@if(Auth::check() && Auth::user()->isAdmin)
                    <li><a href="/admin">Admin</a></li>
                 @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form  action="/search" method="get" class="navbar-form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="search" name="query">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{asset('images/avatars/' . Auth::user()->avatar)}}" style="margin-left: -10px; margin-top: -6px ; padding-top: 1px"  height="32px" alt="">
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('overview',['username'=>Auth::user()->username])}}">My profile</a></li>
                                <li><a href="{{route('user.account')}}">Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>