@extends('layouts.app')

@section('content')
  <div class="m-t-50 m-l-35 m-r-35">
              @if(isset($dogs))
                  <div class="p-t-15">
                        <h2 class="title is-3">Dog Breed Information</h2>
                        <p class="subtitle is-6 has-text-muted">We have hundreds of different dog breeds and thousands of dog pictures and videos. Use our resources to information about dog breeds. And once you find your perfect breed, use our breeder directory to help you find your perfect dog breeder.</p>
                        <div class="columns is-multiline">
                            @foreach($dogs as $dog)
                              <div class="column is-3">
                                              <div class="card">
                                                      <header class="card-header">
                                                              <p class="card-header-title">
                                                                      {{ $dog->breedName }}
                                                              </p>
                                                      </header>
                                                      <div class="card-image">
                                                              <figure class="image is-4by3">
                                                                      <img src="{{asset('images/breed-information/dog-pictures/'.$dog->picture)}}" alt="{{ addslashes($dog->breedName) }}">
                                                              </figure>
                                                      </div>
                                                      <div class="card-content">
                                                              <div class="panel-block-item">
                                                                      <a href="{{ route('breed-info',['url' => $dog->url]) }}" class="button is-info is-fullwidth">Get More Information</a>
                                                              </div>
                                                      </div>
                                              </div>
                                      </div>
                            @endforeach
                        </div>
                    </div>
              @endif

              @if(isset($cats))
                <div class="p-t-15">
                      <h2 class="title is-3">Cat Breed Information</h2>
                      <p class="subtitle is-6 has-text-muted">We have dozens of different cat breeds and thousands of pictures and videos of cats. Find the perfect cat breed here And once you decide on your breed, use our breeder directory to help you find your perfect cat breeder.</p>
                      <div class="columns is-multiline">
                          @foreach($cats as $cat)
                            <div class="column is-3">
                                            <div class="card">
                                                    <header class="card-header">
                                                            <p class="card-header-title">
                                                                    {{ $cat->breedName }}
                                                            </p>
                                                    </header>
                                                    <div class="card-image">
                                                            <figure class="image is-4by3">
                                                                    <img src="{{asset('images/breed-information/cat-pictures/'.$cat->picture)}}" alt="{{ addslashes($cat->breedName) }}">
                                                            </figure>
                                                    </div>
                                                    <div class="card-content">
                                                            <div class="panel-block-item">
                                                                    <a href="{{ route('breed-info',['url' => $cat->url]) }}" class="button is-info is-fullwidth">Get More Information</a>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                          @endforeach
                      </div>
                  </div>
              @endif
 </div>
@endsection
