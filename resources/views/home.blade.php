@extends('layouts.app')

@section('content')
  <section class="hero is-fullheight is-default is-bold">
        <div class="hero-body">
          <div class="container has-text-centered">
            <div class="columns is-vcentered">
              <div class="column is-5">
                <figure class="image is-4by3">
                  <img src="{{asset('images/static/'. $mainimage)}}" alt="Find A Dog Or Cat Breeder Near You">
                </figure>
              </div>
              <div class="column is-6 is-offset-1">
                <h1 class="title is-2">
                  Find A Breeder Today
                </h1>
                <h2 class="subtitle is-4">
                  Search Our Free Breeder Directory To Find Dog &amp; Cat Breeders
                </h2>
                <br>
                <p class="has-text-centered">
                  <a class="button is-large">
                    <i class="fa fa-search" aria-hidden="true"></i>Search
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
  </section>
@endsection

@section('scripts')
  <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-105694721-1', 'auto');
ga('send', 'pageview');

</script>
@endsection
