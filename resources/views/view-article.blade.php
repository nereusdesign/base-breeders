@extends('layouts.app')

@section('title', $article->headline().' | Find Your Breeder')


@section('desc',$article->cleanDesc())


@section('content')


<section class="hero is-primary is-medium">
     <div class="hero-body">
       <div class="container has-text-centered">
         <h1 class="title is-2">
           {{ $article->headline }}
         </h1>
         <h2 class="subtitle is-4">
           {{ $article->subtext }}
         </h2>
       </div>
     </div>
   </section>

   <section class="section blog">
     <div class="container">
       <div class="columns is-mobile">
         <div class="column is-8 is-offset-2">
           <div class="content blog-post section">
             <p class="has-text-right has-text-muted">{{ $article->timeAgo() }}</p>

              {!! $article->body !!}

           </div>
           <div class="card is-fullwidth">
             <footer class="card-footer">
               <a class="card-footer-item has-text-weight-bold">Share on Facebook</a>
               <a class="card-footer-item has-text-weight-bold">Share on Twitter</a>
               <a class="card-footer-item has-text-weight-bold">Share on G+</a>
             </footer>
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
