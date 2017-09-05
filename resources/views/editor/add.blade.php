@extends('layouts.manage')


@section('styles')
  <script src="{!! asset('js/ckeditor.js') !!}"></script>
@endsection

@section('content')

  <div class="columns">
    <div class="column p-l-25 p-r-25 m-t-50">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Create Article</h1>

          <form action="{{route('editor.process.add')}}" method="POST" role="form" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="field">
              <label for="title" class="label">Title</label>
              <p class="control">
                <input class="input {{$errors->has('breeder') ? 'is-danger' : ''}}" type="text" name="title" id="title" value="{{old('title')}}" required>
              </p>
              @if ($errors->has('title'))
                <p class="help is-danger">{{$errors->first('title')}}</p>
              @endif
            </div>


            <div class="field">
              <label for="subtitle" class="label">Subtitle</label>
              <p class="control">
                <input class="input {{$errors->has('subtitle') ? 'is-danger' : ''}}" type="text" name="subtitle" id="subtitle" value="{{old('subtitle')}}" required>
              </p>
              @if ($errors->has('subtitle'))
                <p class="help is-danger">{{$errors->first('subtitle')}}</p>
              @endif
            </div>


                <div class="field">
                  <label for="breed" class="label">Breed</label>
                  <p class="control">
                    <div class="select">
                      <select class="select" name="breed" id="breed">
                        <option value="0">No Breed</option>
                         <optgroup label="Dogs">
                         @foreach($dogarr as $dogid => $dog)
                           <option value="{{ $dogid }}">{{ $dog }}</option>
                         @endforeach
                         </optgroup>
                         <optgroup label="Cats">
                         @foreach($catarr as $catid => $cat)
                           <option value="{{ $catid }}">{{ $cat }}</option>
                         @endforeach
                         </optgroup>
                      </select>
                    </div>
                  </p>
                  @if ($errors->has('breed'))
                    <p class="help is-danger">{{$errors->first('breed')}}</p>
                  @endif
                </div>


              <div class="field">
                <label for="about" class="label">About<span class="is-font-14 is-muted">optional</span></label>
                <p class="control">
                    <textarea class="input {{$errors->has('about') ? 'is-danger' : ''}}" type="text" name="about" id="about">{{old('about')}}</textarea>
                  <script>
                      CKEDITOR.replace( 'about' );
                  </script>
                </p>
                @if ($errors->has('about'))
                  <p class="help is-danger">{{$errors->first('about')}}</p>
                @endif
              </div>


            <button class="button is-success is-outlined is-fullwidth m-t-30">Create Article</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
    </div>
  </div>

@endsection
