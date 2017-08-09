<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Find Your Breeder</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="nav has-shadow">
            <div class="container">
              <div class="nav-left">
                <a href="{{route('home')}}" class="nav-item"><img src="{{asset('images/findyourbreederlogo.png')}}" alt="Find Your Breeder Logo">
                  Find Your Breeder
                </a>
                <a href="" class="nav-item is-tab is-hidden-mobile m-l-10">Find A Breeder</a>
                <a href="" class="nav-item is-tab is-hidden-mobile">News &amp; Information</a>
              </div>
              <div class="nav-right overflow-visible">
                @if(!Auth::guest())
                  <a href="" class="nav-item is-tab">Login</a>
                  <a href="" class="nav-item is-tab">Join</a>
                @else
                  <button class="dropdown is-aligned-right nav-item">
                    Hey You <span class="icon"><i class="fa fa-caret-down"></i></span>
                    <ul class="dropdown-menu">
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Notifications</a></li>
                      <li><a href="#">Settings</a></li>
                      <li class="seperator"></li>
                      <li><a href="#">Logout</a></li>
                    </ul>
                  </button>
                @endif
              </div>
            </div>
        </nav>



        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
