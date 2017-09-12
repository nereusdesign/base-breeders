@extends('layouts.app')

@section('title','Dog And Cat Related News')


@section('desc','Get up to date news about dogs and cats. Find out product reviews, recalls, and more. The top source of dog and cat related news for breeders, owerns and animal lovers alike.')

@section('styles')
  <style>
      .blog-title {
        font-size: 30px;
        font-weight: bold;
      }
      .blog-timestamp {
          font-weight: bold;
      }
      .blog-summary {
          font-size: 18px;
          font-weight: lighter;
          line-height: 1.5;
      }
      .blog-link{
        color:inherit;
      }
      .blog-link:hover{
        color:blue;
      }
  </style>
@endsection


@section('content')

  <section class="hero is-fullheight is-default is-bold">




        <div class="hero-body">
          <div class="container">

            <h1 class="title">Latest Dog &amp; Cat Related News</h1>
            <h2 class="subtitle">Find dog and cat related news articles and information</h2>

@foreach ($posts as $post)
            <div class="column is-full-desktop">
              <h4 class="blog-timestamp">
                {{ $post->timeAgo() }}
              </h4>
              <h2 class="blog-title">
                <a class="blog-link" href="{{ route('view-news',['url' => $post->urlBase]) }}">{{ $post->headline() }}</a>
              </h2>
              <h3 class="blog-summary">
                {{ $post->summary() }}
              </h3>
              <hr class="dropdown-divider">
            </div>
@endforeach
        </div>
      </div>

      <div class="hero-foot">
        <div class="container">
          <div class="tabs is-centered">
            <ul>
              {{$posts->links()}}
            </ul>
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
