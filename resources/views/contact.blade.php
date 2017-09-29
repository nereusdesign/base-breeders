@extends('layouts.app')

@section('title','Find Your Breeder Login')

@section('desc','Login to findyourbreeder.com')


@section('content')

<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        @if(Session::has('status'))
              <p class="help is-danger is-font-16">{{ Session::get('status') }}</p>
        @endif
        <h1 class="title">Contact Us</h1>

        <form action="{{route('process-contact-us')}}" method="POST" role="form">
          {{csrf_field()}}
          <input name="msg" type="hidden">
          <div class="field">
            <label for="email" class="label">Your Email Address</label>
            <p class="control">
              <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" required>
            </p>
            @if ($errors->has('email'))
              <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="field">
            <label for="about" class="label">Message</label>
            <p class="control">
              <textarea class="input {{$errors->has('about') ? 'is-danger' : ''}}" type="text" name="about" id="about">{{old('about')}}</textarea>
            </p>
            @if ($errors->has('about'))
              <p class="help is-danger">{{$errors->first('about')}}</p>
            @endif
          </div>
          <button class="button is-success is-outlined is-fullwidth m-t-30">Send Us A Message</button>
        </form>
      </div> <!-- end of .card-content -->
    </div> <!-- end of .card -->
  </div>
</div>


<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-20">
    <div class="card">
      <div class="card-content ">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Find your breeder contact -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3317529938073000"
     data-ad-slot="4174431114"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div></div></div>
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
