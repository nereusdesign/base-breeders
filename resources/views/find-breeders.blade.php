@extends('layouts.app')

@section('title','Find A Dog or Cat Breeder Near Your')


@section('desc','Find dog and cat breeders near you using our free breeder search. Find dog and cat breeders from around the United States and Canada')


@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Find Breeders</h1>
          <p class="is-size-6 m-b-30">Find a dog or cat breeder near you using our free cattery search. Locate dog and cat breeders from around the United States and Canada</p>

          <form action="{{route('cat-search')}}" method="POST" role="form">
            {{csrf_field()}}
            <div class="field">
              <label for="email" class="label">Select A Cat Breed</label>
              <p class="control">
                <select class="select is-fullwidth {{$errors->has('breed') ? 'is-danger' : ''}}" name="breed" id="breed" required>
                  <option>-- Select A Breed --</option>
                  <optgroup label="Dogs">
                  @foreach ($dbreeds as $key => $value)
                    <option value="{{ $key }}" {{ (old("breed") == $key ? "selected":"") }}>{{ $value }}</option>
                  @endforeach
                </optgroup>
                  <optgroup label="Cats">
                  @foreach ($cbreeds as $key => $value)
                    <option value="{{ $key }}" {{ (old("breed") == $key ? "selected":"") }}>{{ $value }}</option>
                  @endforeach
                  </optgroup>
                </select>
              </p>
              @if ($errors->has('breed'))
                <p class="help is-danger">{{$errors->first('breed')}}</p>
              @endif
            </div>
            <div class="field">
              <label for="password" class="label">Zip Code <span class="is-font-14 is-muted">optional</span></label>
              <p class="control">
                <input class="zip-code input {{$errors->has('zip') ? 'is-danger' : ''}}" name="zip" id="zip">
              </p>
              @if ($errors->has('zip'))
                <p class="help is-danger">{{$errors->first('zip')}}</p>
              @endif

            </div>
            <button class="button is-success is-outlined is-fullwidth m-t-30">Find Your Breeder</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
    </div>
  </div>

@endsection
