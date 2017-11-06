<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '9GaG') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/noty@3.1.2/lib/noty.css">
    @yield('css');

</head>
<body style="overflow-x: hidden;">
    @include('partials.nav')
    @yield('header');
        <div class="container" style="padding-bottom: 300px">
            @yield('content')
        </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
    @yield('js')

</body>
</html>
