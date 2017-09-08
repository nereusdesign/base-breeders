@extends('layouts.app')

@section('content')

    <h1>Search Results For {{ $breed->breedName }}</h1>
    @if ($hasresults == '1')
      @foreach ($breeders as $value)
        <h2>{{ $value->breederName }}</h2>
        <h3>{{ $value->city }}</h3>
      @endforeach
    @else
      <h2>Sorry we do not currently have any {{ $breed->breedName }} breeders listed.</h2>
    @endif

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
