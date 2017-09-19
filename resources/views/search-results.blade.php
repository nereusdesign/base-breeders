@extends('layouts.app')

@section('content')

<div class="columns">
  <div class="column m-t-40 is-10 is-offset-1">



    <div class="section container">
            <div class="columns">
                    <div class="column is-2">
                            <div class="image">
                                    <img src="{{asset('images/breed-information/'.$info->breedType.'-pictures/'.$info->picture)}}" alt="{{ addslashes($info->breedName) }}">
                            </div>
                    </div>
                    <div class="column">
                            <div class="title is-2">{{ $info->breedName }} Breeders</div>
                            <p class="subtitle is-6 has-text-muted">{{ $info->otherNames }}</p>
                            <a href="{{ route('breed-info',['url' => $info->url]) }}" class="button is-info is-pulled-right m-r-10">Find {{ $info->breedName }} Info</a>
                            <div class="is-clearfix"></div>
                    </div>
            </div>
    </div>
  <hr>

    @if (count($breeders) > '0')
      @foreach ($breeders as $value)
        <div class="section container m-b-10 p-b-10">
                <div class="columns">
                        <div class="column is-4">
                                <div class="image">
                                        <img src="{{asset('images/breed-information/'.$info->breedType.'-pictures/'.$info->picture)}}" alt="{{ addslashes($info->breedName) }}">
                                        <a href="{{url('/view-breeder/'.$value->baseUrl)}}" class="button is-success is-outlined is-fullwidth m-t-10 m-b-10" target="_blank">View {{ $value->breederName }} Profile</a>
                                        <a href="#" class="button is-success is-outlined is-fullwidth">Contact {{ $value->breederName }}</a>
                                </div>
                        </div>
                        <div class="column">
                                <h2 class="title is-4">{{ $value->breederName }}</h2>
                                <p class="subtitle is-5 has-text-muted"> <i class="fa fa-map-marker-m-r-5"></i> {{ $value->zipcode }}</p>
                                <strong class="is-5">About {{ $value->breederName }}</strong>
                                <p class="p-l-5">{{ $value->about }}</p>
                        </div>

                </div>
    </div>

      @endforeach
    @else

      <h2>Sorry we do not currently have any {{ $breed->breedName }} breeders listed.</h2>
    @endif






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
