<nav class="navbar has-shadow">
  <div class="navbar-brand">
      <a href="{{route('home')}}" class="nav-item"><img src="{{asset('images/findyourbreederlogo.png')}}" alt="Find Your Breeder Logo">
          Find Breeder
      </a>
    <div class="navbar-burger burger" data-target="navMenubd-example">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenubd-example" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link  is-active" href="/documentation/overview/start/">
          Find A Breeder
        </a>
        <div class="navbar-dropdown ">
          <a class="navbar-item " href="/documentation/overview/start/">
            Find A Dog Breeder
          </a>
          <a class="navbar-item " href="http://bulma.io/documentation/modifiers/syntax/">
            Find A Cat Breeder
          </a>
        </div>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link " href="http://bulma.io/blog/">
          News &amp; Information
        </a>
        <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">

            <a class="navbar-item" href="/2017/08/03/list-of-tags/">
              Learn About Dog Breeds
            </a>
          <a class="navbar-item" href="">
            Learn About Cat Breeds
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="">
            News &amp; Updates
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
          @if (Auth::guest())
            <div class="navbar-item">
              <div class="field is-grouped">
                <p class="control">
                  <a class="button is-primary" href="{{route('login')}}">
                    Login
                  </a>
                </p>
                <p class="control">
                  <a class="button is-primary" href="{{route('register')}}">
                    Join
                  </a>
                </p>
            </div>
          </div>
          @else
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link " href="">
                Welcome {{ Auth::user()->name }}
              </a>
              <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">

                  <a class="navbar-item" href="/2017/08/03/list-of-tags/">
                    Your Listings
                  </a>
                <a class="navbar-item" href="">
                  Account Settings
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                </a>
                @include('_includes.forms.logout')
              </div>
            </div>
           @endif
    </div>
  </div>
</nav>
