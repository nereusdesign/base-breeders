@extends('layouts.manage')

@section('content')
  <div class="columns">
    <div class="column m-t-75 m-l-20 m-r-20">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Add Breed</h1>

          <form action="{{route('manage.breeds.processadd')}}" method="POST" role="form" enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="field">
              <label for="dogOrCat" class="label">Dog or Cat</label>
              <p class="control">
                <div class="select">
                  <select class="select" name="dogOrCat" id="dogOrCat" required>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                  </select>
                </div>
              </p>
              @if ($errors->has('dogOrCat'))
                <p class="help is-danger">{{$errors->first('dogOrCat')}}</p>
              @endif
            </div>



            <div class="field">
              <label for="breeder" class="label">Breed Name</label>
              <p class="control">
                <input class="input {{$errors->has('breeder') ? 'is-danger' : ''}}" type="text" name="breed" id="breed" value="{{old('breed')}}" required>
              </p>
              @if ($errors->has('breed'))
                <p class="help is-danger">{{$errors->first('breed')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="nicknames" class="label">Nicknames</label>
              <p class="control">
                <input class="input {{$errors->has('nicknames') ? 'is-danger' : ''}}" type="text" name="nicknames" id="nicknames" value="{{old('nicknames')}}" required>
              </p>
              @if ($errors->has('nicknames'))
                <p class="help is-danger">{{$errors->first('nicknames')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="size" class="label">Size</label>
              <p class="control">
                <input class="input {{$errors->has('size') ? 'is-danger' : ''}}" type="text" name="size" id="size" value="{{old('size')}}" required>
              </p>
              @if ($errors->has('size'))
                <p class="help is-danger">{{$errors->first('size')}}</p>
              @endif
            </div>



            <div class="field">
              <label for="minheight" class="label">Height</label>
              <p class="control">
                <input class="input {{$errors->has('minheight') ? 'is-danger' : ''}}" type="text" name="minheight" id="minheight" value="{{old('minheight')}}" style="width:100px" required>
                  -
                <input class="input {{$errors->has('minheight') ? 'is-danger' : ''}}" type="text" name="maxheight" id="maxheight" value="{{old('maxheight')}}" style="width:100px" required>inches

              </p>
              @if ($errors->has('maxheight') || $errors->has('minheight'))
                <p class="help is-danger">{{$errors->first('minheight')}}</p>
                <p class="help is-danger">{{$errors->first('maxheight')}}</p>
              @endif
            </div>


            <div class="field">
              <label for="minweight" class="label">Weigth</label>
              <p class="control">
                <input class="input {{$errors->has('minweight') ? 'is-danger' : ''}}" type="text" name="minweight" id="minweight" value="{{old('minweight')}}" style="width:100px" required>
                  -
                <input class="input {{$errors->has('minweight') ? 'is-danger' : ''}}" type="text" name="maxweight" id="maxweight" value="{{old('minweight')}}" style="width:100px" required>lbs

              </p>
              @if ($errors->has('maxweight') || $errors->has('minweight'))
                <p class="help is-danger">{{$errors->first('minweight')}}</p>
                <p class="help is-danger">{{$errors->first('maxweight')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="minlife" class="label">Lifespan</label>
              <p class="control">
                <input class="input {{$errors->has('minlife') ? 'is-danger' : ''}}" type="text" name="minlife" id="minlife" value="{{old('minlife')}}" style="width:100px" required>
                  -
                <input class="input {{$errors->has('maxlife') ? 'is-danger' : ''}}" type="text" name="maxlife" id="maxlife" value="{{old('maxlife')}}" style="width:100px" required>years

              </p>
              @if ($errors->has('maxlife') || $errors->has('minlife'))
                <p class="help is-danger">{{$errors->first('minlife')}}</p>
                <p class="help is-danger">{{$errors->first('maxlife')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="colors" class="label">Colors</label>
              <p class="control">
                <input class="input {{$errors->has('colors') ? 'is-danger' : ''}}" type="text" name="colors" id="colors" value="{{old('colors')}}" required>
              </p>
              @if ($errors->has('colors'))
                <p class="help is-danger">{{$errors->first('colors')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="origin" class="label">Origin</label>
              <p class="control">
                <input class="input {{$errors->has('origin') ? 'is-danger' : ''}}" type="text" name="origin" id="origin" value="{{old('origin')}}" required>
              </p>
              @if ($errors->has('origin'))
                <p class="help is-danger">{{$errors->first('origin')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="classification" class="label">Classification</label>
              <p class="control">
                <div class="select">
                  <select class="select" name="classification" id="classification" required>
                    <option>-Select-</option>
                    <option value="Cross Breed">Cross Breed</option>
                    <option value="Purebred">Purebred</option>
                  </select>
                </div>
              </p>
              @if ($errors->has('classification'))
                <p class="help is-danger">{{$errors->first('classification')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="lapcat" class="label">Lapcat</label>
              <p class="control">
                <div class="select">
                  <select class="select" name="lapcat" id="lapcat" required>
                    <option>-Select-</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
              </p>
              @if ($errors->has('lapcat'))
                <p class="help is-danger">{{$errors->first('lapcat')}}</p>
              @endif
            </div>


            <div class="field">
              <label for="temperament" class="label">Temperament</label>
              <p class="control">
                <textarea class="input {{$errors->has('temperament') ? 'is-danger' : ''}}" type="text" name="temperament" id="temperament">{{old('temperament')}}</textarea>
              </p>
              @if ($errors->has('temperament'))
                <p class="help is-danger">{{$errors->first('temperament')}}</p>
              @endif
            </div>



              <div class="file">
                <label for="photos" class="label">Picture<span class="is-font-14 is-muted">optional</span></label>
                <p class="control">
                    <input class="file-input" type="file" name="photos" />
                </p>
                @if ($errors->has('photos'))
                  <p class="help is-danger">{{$errors->first('photos')}}</p>
                @endif
              </div>


              <div class="field">
                <label for="overview" class="label">Overview</label>
                <p class="control">
                  <textarea class="input {{$errors->has('overview') ? 'is-danger' : ''}}" type="text" name="overview" id="overview">{{old('overview')}}</textarea>
                </p>
                @if ($errors->has('overview'))
                  <p class="help is-danger">{{$errors->first('overview')}}</p>
                @endif
              </div>




              <div class="field">
                <label for="aptStars" class="label">Good In Apartments</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="aptStars" id="aptStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('apt') ? 'is-danger' : ''}}" type="text" name="apt" id="apt">{{old('apt')}}</textarea>
                </p>
                @if ($errors->has('apt') || $errors->has('aptStars'))
                  <p class="help is-danger">{{$errors->first('apt')}}</p>
                  <p class="help is-danger">{{$errors->first('aptStars')}}</p>
                @endif
              </div>



              <div class="field">
                <label for="childStars" class="label">Good With Children</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="childStars" id="childStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('child') ? 'is-danger' : ''}}" type="text" name="child" id="child">{{old('child')}}</textarea>
                </p>
                @if ($errors->has('child') || $errors->has('childStars'))
                  <p class="help is-danger">{{$errors->first('child')}}</p>
                  <p class="help is-danger">{{$errors->first('childStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="dogsStars" class="label">Good With Dogs</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="dogsStars" id="dogsStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('dogs') ? 'is-danger' : ''}}" type="text" name="dogs" id="dogs">{{old('dogs')}}</textarea>
                </p>
                @if ($errors->has('dogs') || $errors->has('dogsStars'))
                  <p class="help is-danger">{{$errors->first('dogs')}}</p>
                  <p class="help is-danger">{{$errors->first('dogsStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="catsStars" class="label">Good With Cats</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="catsStars" id="catsStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('cats') ? 'is-danger' : ''}}" type="text" name="cats" id="cats">{{old('cats')}}</textarea>
                </p>
                @if ($errors->has('cats') || $errors->has('catsStars'))
                  <p class="help is-danger">{{$errors->first('cats')}}</p>
                  <p class="help is-danger">{{$errors->first('catsStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="exerciseStars" class="label">Exercise Needs</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="exerciseStars" id="exerciseStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('exercise') ? 'is-danger' : ''}}" type="text" name="exercise" id="exercise">{{old('exercise')}}</textarea>
                </p>
                @if ($errors->has('exercise') || $errors->has('exerciseStars'))
                  <p class="help is-danger">{{$errors->first('exercise')}}</p>
                  <p class="help is-danger">{{$errors->first('exerciseStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="trainabilityStars" class="label">Trainability</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="trainabilityStars" id="trainabilityStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('trainability') ? 'is-danger' : ''}}" type="text" name="trainability" id="trainability">{{old('trainability')}}</textarea>
                </p>
                @if ($errors->has('trainability') || $errors->has('trainabilityStars'))
                  <p class="help is-danger">{{$errors->first('trainability')}}</p>
                  <p class="help is-danger">{{$errors->first('trainabilityStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="groomingStars" class="label">Grooming Requirements</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="groomingStars" id="groomingStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('grooming') ? 'is-danger' : ''}}" type="text" name="grooming" id="grooming">{{old('grooming')}}</textarea>
                </p>
                @if ($errors->has('grooming') || $errors->has('groomingStars'))
                  <p class="help is-danger">{{$errors->first('grooming')}}</p>
                  <p class="help is-danger">{{$errors->first('groomingStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="sheddingStars" class="label">Shedding</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="sheddingStars" id="sheddingStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('shedding') ? 'is-danger' : ''}}" type="text" name="shedding" id="shedding">{{old('shedding')}}</textarea>
                </p>
                @if ($errors->has('shedding') || $errors->has('sheddingStars'))
                  <p class="help is-danger">{{$errors->first('shedding')}}</p>
                  <p class="help is-danger">{{$errors->first('sheddingStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="vocalizationStars" class="label">Vocalization/Barking</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="vocalizationStars" id="vocalizationStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('vocalization') ? 'is-danger' : ''}}" type="text" name="vocalization" id="vocalization">{{old('vocalization')}}</textarea>
                </p>
                @if ($errors->has('vocalization') || $errors->has('vocalizationStars'))
                  <p class="help is-danger">{{$errors->first('vocalization')}}</p>
                  <p class="help is-danger">{{$errors->first('vocalizationStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="affectionateStars" class="label">Affectionate</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="affectionateStars" id="affectionateStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('affectionate') ? 'is-danger' : ''}}" type="text" name="affectionate" id="affectionate">{{old('affectionate')}}</textarea>
                </p>
                @if ($errors->has('affectionate') || $errors->has('affectionateStars'))
                  <p class="help is-danger">{{$errors->first('affectionate')}}</p>
                  <p class="help is-danger">{{$errors->first('affectionateStars')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="playfulnessStars" class="label">Playfulness</label>
                <p class="control">
                  <div class="select">
                    <select class="select" name="playfulnessStars" id="playfulnessStars" required>
                      <option>-Select-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </p>
                <p class="control">
                  <textarea class="input {{$errors->has('playfulness') ? 'is-danger' : ''}}" type="text" name="playfulness" id="playfulness">{{old('playfulness')}}</textarea>
                </p>
                @if ($errors->has('playfulness') || $errors->has('playfulnessStars'))
                  <p class="help is-danger">{{$errors->first('playfulness')}}</p>
                  <p class="help is-danger">{{$errors->first('playfulnessStars')}}</p>
                @endif
              </div>


            <button class="button is-success is-outlined is-fullwidth m-t-30">Create Breeder Listing</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
    </div>
  </div>
@endsection
