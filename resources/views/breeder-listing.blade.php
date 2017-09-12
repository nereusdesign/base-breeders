@extends('layouts.app')


@section('styles')
<style>
  blockquote{
  display:block;
  background: #fff;
  padding: 15px 20px 15px 45px;
  margin: 15px 0 20px;
  position: relative;

  /*Font*/
  font-family: Georgia, serif;
  font-size: 16px;
  line-height: 1.2;
  color: #666;
  text-align: justify;

  /*Borders - (Optional)*/
  border-left: 15px solid #4186c8;
  border-right: 2px solid #4186c8;

  /*Box Shadow - (Optional)*/
  -moz-box-shadow: 2px 2px 15px #ccc;
  -webkit-box-shadow: 2px 2px 15px #ccc;
  box-shadow: 2px 2px 15px #ccc;
}

blockquote::before{
  content: "\201C"; /*Unicode for Left Double Quote*/

  /*Font*/
  font-family: Georgia, serif;
  font-size: 30px;
  font-weight: bold;
  color: #999;

  /*Positioning*/
  position: absolute;
  left: 10px;
  top:5px;
}

blockquote::after{
  /*Reset to make sure*/
  content: "";
}

blockquote a{
  text-decoration: none;
  background: #eee;
  cursor: pointer;
  padding: 0 3px;
  color: #c76c0c;
}

blockquote a:hover{
 color: #666;
}

blockquote em{
  font-style: italic;
}
</style>
@endsection

@section('content')
  <div class="container profile m-t-25">

          <div class="section profile-heading">
                  <div class="columns">
                          <div class="column is-2">
                                  <div class="image is-128x128 avatar">
                                          <img src="https://placehold.it/256x256">
                                  </div>
                          </div>
                          <div class="column is-4 name">
                                  <p>
                                          <span class="title is-bold">{{ $info->breederName }}</span>

                                  </p>
                                  <p class="tagline">{{ $info->breedName }} Breeder In {{ $info->city }},{{ $info->state_prefix }}</p>

                                    @if (!empty($info->about))
                                      <blockquote>
                                            {{ $info->about }}
                                      </blockquote>
                                    @endif

                          </div>
                          <div class="column is-2 followers has-text-centered">
                          </div>
                  </div>
          </div>
          <div class="profile-options">
                  <div class="tabs is-fullwidth">
                          <ul>
                                @if (!empty($info->url))
                                  <li class="link main-border-bottom-color"><a href="{{ $info->url }}" target="_blank" class="font-color-black"><span class="icon"><i class="fa fa-list"></i></span> <span>Visit Website</span></a>
                                  </li>
                                @endif
                                  <li class="link main-border-bottom-color"><a class="font-color-black"><span class="icon"><i class="fa fa-heart"></i></span> <span>Send Email</span></a>
                                  </li>
                                  @if (!empty($info->phone))
                                    <li class="link main-border-bottom-color"><a><span class="icon"><i class="fa fa-th"></i></span> <span>{{ $info->phone }}</span></a>
                                    </li>
                                  @endif

                          </ul>
                  </div>
          </div>


          <div class="spacer"></div>


          <div class="columns">
                  <div class="column is-3">
                      Availble/ Pictures

                  </div>

          </div>
  </div>
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
