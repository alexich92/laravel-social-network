<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{--<title>{{ config('app.name', '9GaG') }}</title>--}}
    <!-- Styles -->
    <link rel="icon" type="image/jpg" href="{{asset('storage/logo.jpg')}}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/noty@3.1.2/lib/noty.css">
    <link rel="stylesheet" href="{{ asset('css/upload_post_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reports_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gifplayer.css') }}">
    <style>
        .space{
            background:  url("{{asset('storage/upload2.png')}}") 50% no-repeat;
        }
        .selected{
            background-image:  url("{{asset('storage/ok2.png')}}");
        }
    </style>

    {{--<style>--}}
        {{--#see_all_notification_navbar{--}}
            {{--margin-top: 48% !important;--}}
        {{--}--}}
    {{--</style>--}}
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' =>csrf_token(),
        ]) !!}
    </script>
    @yield('css')
    <title>9GAG: GO FUN THE WORLD</title>
</head>
<body style="overflow-x: hidden;">
<div id="app">
    @include('partials.nav')
    @yield('header')
    <div class="container" style="padding-bottom: 300px;">
        @yield('content')
    </div>
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/gifplayer.js')}}"></script>
    {{--click to play/stop gifs--}}
    <script>
        $('.gif').gifplayer();
    </script>
@if(!Auth::check())
    <script src="{{ asset('js/register.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ asset('js/login.js') }}"></script>
@endif
    <script src="{{ asset('js/upload.js') }}"></script>
    <script src="{{ asset('js/markasreadnotification.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/noty@3.1.2/lib/noty.min.js"></script>



    <script>
        @if(Session::has('success'))
            new Noty({
                type:'success',
                layout:'bottomRight',
                timeout:3000,
                text:'{{Session::get('success')}}'
            }).show();
        @endif
    </script>

    {{--<script>--}}
        {{--function markNotificationAsRead() {--}}
            {{--$.get('/markAsRead');--}}
        {{--}--}}
    {{--</script>--}}

    <script>
        $(function(){
            $("#upload-file").on('click', function(e){
                e.preventDefault();
                $("#upload:hidden").trigger('click');
            });
        });
    </script>

    @yield('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-590b9610b2b33dbe"></script>
</body>
</html>
