<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Find Your Breeder')</title>
    <meta name="description" content="@yield('desc','Find a dog or cat breeder near you. Browse our free directory of dog and cat breeders or view pictures and get information about dog and cat breeds for free.')">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('styles')
</head>
<body>
     @include('_includes.nav.main')
    <div id="app">
        @yield('content')
        <div id="footer">
          <div style="width:100%;text-align:center;margin-top:33px">
              <a href="/contact" class="is-primary is-size-6"><i class="fa fa-envelope" aria-hidden="true"></i>
Contact Us</a>
              <div style="width:100%;text-align:center;color:#797979;font-size:11px;font-family:verenda;margin-top:5px;">
Copyright © 2016 <a href="http://www.nereusdesign.com" style="color:#003366;font-size:11px;font-family:verenda" target="_blank">Nereus Design, LLC</a>
</div>
          </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
