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
                <form method="POST" action="{{route('search-for-breeders')}}">
                  {{csrf_field()}}
                <div class="field">
                  <p class="control">
                    <div class="select">
                      <select class="select" name="breed" id="breed" required>
                        <option>-- Select A Breed --</option>
                         <optgroup label="Dogs">
                         @foreach($dogarr as $dog)
                           <option value="{{ $dog->id }}">{{ $dog->breedName }}</option>
                         @endforeach
                         </optgroup>
                         <optgroup label="Cats">
                         @foreach($catarr as $cat)
                           <option value="{{ $cat->id }}">{{ $cat->breedName }}</option>
                         @endforeach
                         </optgroup>
                      </select>
                    </div>
                  </p>
                  @if ($errors->has('breed'))
                    <p class="help is-danger">{{$errors->first('breed')}}</p>
                  @endif
                </div>


                <p class="has-text-centered">
                  <button class="button is-large">
                    <i class="fa fa-search m-r-10" aria-hidden="true"></i>Search
                  </button></form>
                </p>
              </div>
            </div>
          </div>
        </div>
  </section>

  <section>
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Featured Breeders</h1>
        <h2 class="subtitle">Browse some of our featured dog and cat breeders</h2>
        <div class="columns is-multiline is-centered m-t-10">
          @foreach ($featured as $breeder)
            <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop is-one-third-widescreen is-one-quarter-fullhd m-l-10 m-r-10 m-t-10 m-b-10" style="background-color: #efefef">
              <div class="card">
                        <div class="card-image">
                          <figure class="image is-4by3">
                            <img src="{{asset($pix[$breeder->id])}}" alt="{{ addslashes($breeder->breederName) }}" style="width: auto;margin-right: auto;margin-left: auto;">
                          </figure>
                        </div>
                        <div class="card-content">
                          <div class="content">
                            <div>{{$breeder->breederName}}</div>
                            <div>{{$breeder->city.' '.$breeder->state_prefix.' '.strtoupper($breeder->country)}}</div>
                            <strong class="tag">{{$breeder->breedName}}</strong>
                            @if (array_key_exists($breeder->id,$haslistings))
                              <div class="tag is-primary is-pulled-right timestamp">{{$haslistings[$breeder->id]}}</div>
                            @endif
                          </div>
                        </div>
                        <footer class="card-footer">
                          <a href="{{url('/view-breeder/'.$breeder->baseUrl)}}" class="card-footer-item">View Profile</a>
                        </footer>
                      </div>
            </div>


          @endforeach


        </div>
      </div>
    </div>
  </section>


  <section>
    <div class="hero-body">
      <div class="container">
        <h2 class="subtitle">Newest Dog &amp; Cat Pictures</h2>
        <div class="columns is-multiline is-centered m-t-10">
          @foreach ($pictures as $picture)

            <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop is-one-third-widescreen is-one-quarter-fullhd m-l-10 m-r-10 m-t-10 m-b-10" style="background-color: #efefef;"><div class="card-image"><figure class="image is-4by3"><img src="{{asset('storage/'.$picture->filename)}}" alt="Dog and Cat Pictures" style="width: auto;margin-right: auto;margin-left: auto;"></figure></div></div>


          @endforeach


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
