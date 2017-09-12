@extends('layouts.app')


@section('styles')

@endsection

@section('content')


  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
          <div class="card-content">
        @if(Session::has('status'))
              <p class="help is-danger is-font-16">{{ Session::get('status') }}</p>
        @endif
          <h1 class="title is-spaced">Activate your account</h1>
              <h2 class="subtitle m-t-20">Billing Address</h2>
          <form action="{{route('checkout-post')}}" method="POST" role="form">
            {{csrf_field()}}
            <div class="field">
              <label for="address" class="label">Street Address</label>
              <p class="control">
                <div><input class="input {{$errors->has('address') ? 'is-danger' : ''}}" type="text" name="address" id="address" placeholder="123 Your Street" value="{{old('address')}}"></div>
                <div class="m-t-5 m-b-5"><input class="input {{$errors->has('address2') ? 'is-danger' : ''}}" type="text" name="address2" id="address2" placeholder="Apt #2" value="{{old('address2')}}"></div>
              </p>
              <div class="columns">
                <div class="column"><input class="input {{$errors->has('city') ? 'is-danger' : ''}}" type="text" name="city" id="city" placeholder="City" value="{{old('address')}}"></div>
                <div class="column"><input class="input {{$errors->has('state') ? 'is-danger' : ''}}" type="text" name="state" id="state" placeholder="State" value="{{old('state')}}"></div>
              </div>
              @if ($errors->has('city'))
                <p class="help is-danger">{{$errors->first('city')}}</p>
              @endif
              @if ($errors->has('state'))
                <p class="help is-danger">{{$errors->first('state')}}</p>
              @endif
              <div class="columns">
                <div class="column">
                  <p class="control">
                    <select class="select is-fullwidth {{$errors->has('accountType') ? 'is-danger' : ''}}" name="country" id="country" required>
                      <option>-- Select Your Country --</option>
                      <option value="US">United States</option>
                      <option value="CA">Canada</option>
                    </select>
                  </p>
                </div>
              </div>

<hr class="navbar-divider">

          <h2 class="subtitle">Payment Information</h2>
            <div class="field">
              <label for="password" class="label">Card Holder's Name</label>
              <p class="control">
                <input class="input {{$errors->has('cardholdername') ? 'is-danger' : ''}}" type="text" name="cardholdername" id="cardholdername" required>
              </p>
              @if ($errors->has('cardholdername'))
                <p class="help is-danger">{{$errors->first('cardholdername')}}</p>
              @endif

            </div>

            <div class="field">
              <label for="cardnumber" class="label">Card Number</label>
              <p class="control">
                <input class="input {{$errors->has('cardnumber') ? 'is-danger' : ''}}" type="text" name="cardnumber" id="cardnumber">
              </p>
              @if ($errors->has('cardnumber'))
                <p class="help is-danger">{{$errors->first('cardnumber')}}</p>
              @endif

            </div>

            <div class="field">
              <label for="card-cvc" class="label">CVV/CVV2</label>
              <p class="control">
                <input class="input {{$errors->has('card-cvc') ? 'is-danger' : ''}}" type="text" name="card-cvc" id="card-cvc">
              </p>
              @if ($errors->has('card-cvc'))
                <p class="help is-danger">{{$errors->first('card-cvc')}}</p>
              @endif

            </div>

            <div class="field">
              <label for="exp-month" class="label">Card Expiry Date</label>
              <div class="columns">
                <div class="column">
                  <select class="select {{$errors->has('exp-month') ? 'is-danger' : ''}}" name="exp-month" id="exp-month" required>
                    <option value="01" selected="selected">01</option>
                     <option value="02">02</option>
                     <option value="03">03</option>
                     <option value="04">04</option>
                     <option value="05">05</option>
                     <option value="06">06</option>
                     <option value="07">07</option>
                     <option value="08">08</option>
                     <option value="09">09</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>

                  </select>
                  <span> / </span>
                  <select name="exp-year" class="select">
                    @foreach ($years as $year)
                      <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                  </select>
                </div>
              </div>



              @if ($errors->has('exp-month'))
                <p class="help is-danger">{{$errors->first('exp-month')}}</p>
              @endif
              @if ($errors->has('exp-year'))
                <p class="help is-danger">{{$errors->first('exp-year')}}</p>
              @endif

            </div>


            <button class="button is-success is-outlined is-fullwidth m-t-30">Submit Your Payment</button>
          </form>
          </div>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->

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
