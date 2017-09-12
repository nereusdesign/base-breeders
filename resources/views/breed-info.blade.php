@extends('layouts.app')

@section('title',$info->breedName.' Information Facts And Pictures')


@section('desc',addslashes($info->breedName).' information including pictures, facts about behavior, looks and care of '.addslashes($info->breedName).'s and other '.addslashes($info->breedType).'s.')


@section('styles')
  <link href="{{ asset('css/star-rating.css') }}" rel="stylesheet">
  @if ($info->breedType == 'cat')
    <link href="{{ asset('css/info-cat-only.css') }}" rel="stylesheet">
  @elseif ($info->breedType == 'dog')
    <link href="{{ asset('css/info-dog-only.css') }}" rel="stylesheet">
  @endif
@endsection

@section('content')
  <div class="m-t-50 m-l-35 m-r-35">

    <ul id="breadcrumb">
      <li><a href="{{route('home')}}"><span class="fa fa-home"> </span></a></li>
      @if ($info->breedType == 'cat')
        <li><a href="{{route('cat-breeds')}}"><span class="fa fa-paw"> </span>Cat Breeds</a></li>
      @else
        <li><a href="{{route('dog-breeds')}}"><span class="fa fa-paw"> </span>Dog Breeds</a></li>
      @endif
      <li><a href="#"> {{ $info->breedName }}</a></li>
    </ul>

    <div>

      <div class="section m-t-15">
              <div class="container">
                      <div class="columns">
                              <div class="column is-6">
                                      <div class="image is-2by2">
                                              <img src="{{asset('images/breed-information/'.$info->breedType.'-pictures/'.$info->picture)}}" alt="{{ addslashes($info->breedName) }}">
                                              <table class="table is-fullwidth">
                                                  <tbody>
                                                        <tr>
                                                          <td class="has-text-left invisible-border">
                                                                  <strong class="is-5">Temperament</strong>
                                                                  <p class="p-l-5">{{ $info->temperamentList }}</p>
                                                          </td>
                                                        </tr>
                                                        <tr class="no-hover"><td>
                                                            <a href="{{url('find-'.$info->url.'-breeders')}}" class="button is-info is-fullwidth">Find {{ $info->breedName }} Breeders</a>
                                                        </td></tr>
                                                  </tbody>
                                               </table>

                                      </div>
                              </div>
                              <div class="column is-5 is-offset-1">
                                      <div class="title is-2">{{ $info->breedName }}</div>
                                      <p class="subtitle is-6 has-text-muted">{{ $info->otherNames }}</p>
                                      <hr>
                                      <div class="title is-4">
                                        Quick {{ $info->breedName }} Facts
                                      </div>
                                      <table class="table is-fullwidth">
                                          <tbody>
                                                <tr>
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Size</strong>
                                                  </td>
                                                  <td>{{ $info->size }}</td>
                                                </tr>
                                                <tr class="dog-only">
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Height</strong>
                                                  </td>
                                                  <td>{{ $info->height }}</td>
                                                </tr>
                                                <tr>
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Weight</strong>
                                                  </td>
                                                  <td>{{ $info->weight }}</td>
                                                </tr>
                                                <tr>
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Lifespan</strong>
                                                  </td>
                                                  <td>{{ $info->lifeSpan }}</td>
                                                </tr>
                                                <tr>
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Colors</strong>
                                                  </td>
                                                  <td>{!! $info->colorsList !!}</td>
                                                </tr>
                                                <tr>
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Origin</strong>
                                                  </td>
                                                  <td>{{ $info->originLocation }}</td>
                                                </tr>
                                                <tr class="dog-only">
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Classification</strong>
                                                  </td>
                                                  <td>{{ $info->pureMixed }}</td>
                                                </tr>
                                                <tr class="cat-only">
                                                  <td class="has-text-left w-is-125">
                                                          <strong class="is-5">Good Lapcat</strong>
                                                  </td>
                                                  <td>{{ $info->lapCat }}</td>
                                                </tr>
                                          </tbody>
                                      </table>
                              </div>
                      </div>
              </div>
      </div>
      <div class="section">
              <div class="container">
                      <div class="box">
                        <div class="title">
                          Overview
                        </div>
                        <p>
                          {!! $info->overview !!}
                        </p>
                        <br>



                        <table class="table is-fullwidth">
                                <tbody>
                                        <tr class="dog-only" id="apartment">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Good In Apartments</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_apartment }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->apartment !!}</p>
                                                </td>
                                        </tr>

                                        <tr id="child">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Good With Children</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_child }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->child !!}</p>
                                                </td>
                                        </tr>

                                        <tr id="dog">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Good With Dogs</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_dog }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->dog !!}</p>
                                                </td>
                                        </tr>

                                        <tr class="dog-only" id="cat">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Good With Cats</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_cat }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->cat !!}</p>
                                                </td>
                                        </tr>

                                        <tr class="dog-only" id="exercise">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Exercise Needs</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_exercise }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->exercise !!}</p>
                                                </td>
                                        </tr>

                                        <tr class="dog-only" id="training">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Trainability</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_training }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->training !!}</p>
                                                </td>
                                        </tr>

                                        <tr class="cat-only" id="affectionate">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Affectionate</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_affectionate }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->affectionate !!}</p>
                                                </td>
                                        </tr>

                                        <tr class="cat-only" id="playfulness">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Playfulness</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_playfulness }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->playfulness !!}</p>
                                                </td>
                                        </tr>
                                        <tr id="grooming">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Grooming Requirements</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_grooming }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->grooming !!}</p>
                                                </td>
                                        </tr>

                                        <tr id="shedding">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Shedding</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_shedding }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->shedding !!}</p>
                                                </td>
                                        </tr>

                                        <tr id="vocalize">
                                                <td class="has-text-left w-is-225">
                                                        <strong class="is-4">Vocalization/Barking</strong>
                                                </td>
                                                <td>
                                                  <div>
                                                    <div class="rating" data-rate="{{ $info->stars_vocalize }}">
                                                      <i class="star-1">★</i>
                                                      <i class="star-2">★</i>
                                                      <i class="star-3">★</i>
                                                      <i class="star-4">★</i>
                                                      <i class="star-5">★</i>
                                                    </div>
                                                  <p>{!! $info->vocalize !!}</p>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>

                      </div>
              </div>
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
