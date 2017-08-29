@extends('layouts.app')

@section('title','Create A Breeder Account')

@section('desc','Are you a breeder looking for the best homes for your dogs or cats? Join Find Your Breeder today and show off your dogs and cats to thousands of interested visitors daily.')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Create A Breeder Account</h1>
<p class="is-size-6 m-b-30">Are you a breeder looking for the best homes for your dogs or cats? Join Find Your Breeder today and show off your dogs and cats to thousands of interested visitors daily.</p>

          <form action="{{route('register')}}" method="POST" role="form">
            {{csrf_field()}}
            <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email')}}" required>
              </p>
              @if ($errors->has('email'))
                <p class="help is-danger">{{$errors->first('email')}}</p>
              @endif
            </div>
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="password" class="label">Password</label>
                  <p class="control">
                    <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" required>
                  </p>
                  @if ($errors->has('password'))
                    <p class="help is-danger">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </div>

              <div class="column">
                <div class="field">
                  <label for="password_confirmation" class="label">Confirm Password</label>
                  <p class="control">
                    <input class="input {{$errors->has('password_confirmation') ? 'is-danger' : ''}}" type="password" name="password_confirmation" id="password_confirmation" required>
                  </p>
                  @if ($errors->has('password_confirmation'))
                    <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                  @endif
                </div>
              </div>
            </div>

              <div class="field">
                <label for="accountType" class="label">Breeder Account Type</label>
                <p class="control">
                  <select class="select is-fullwidth {{$errors->has('accountType') ? 'is-danger' : ''}}" name="accountType" id="accountType" required>
                    <option>-- Select Your Account Length --</option>
                    @foreach ($accounts as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </p>
                @if ($errors->has('accountType'))
                  <p class="help is-danger">{{$errors->first('accountType')}}</p>
                @endif
              </div>


            <button class="button is-success is-outlined is-fullwidth m-t-30">Create Your Account</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
      <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a></h5>
    </div>
  </div>
@endsection
