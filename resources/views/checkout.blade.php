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
        @if(Session::has('success'))
              <p class="help is-success is-font-16">{{ Session::get('success') }}</p>
        @endif
          <noscript>
          <div class="help is-danger">
            <h4>JavaScript is not enabled!</h4>
            <p>This payment form requires your browser to have JavaScript enabled. Please activate JavaScript and reload this page. Check <a href="http://enable-javascript.com" target="_blank">enable-javascript.com</a> for more informations.</p>
          </div>
          </noscript>
                <div id="currentPayment">
                  <div class="subtitle is-muted">Pay now to activate the following breeder plan</div>
                  <div>
                      <strong>{{$accountName}}</strong>
                      <div class="is-pulled-right is-muted subtitle">{{$amount}}</div>
                  </div>
                  <div>
                    <a href="#" id="offerchange" class="is-size-6 is-primary">Change Plan</a>
                  </div>
                </div>
                <div id="changePlan" style="display:none">
                          <form method="POST" action="{{route('changePlan')}}">
                          <div class="field">
                            <label for="accountType" class="label">Change Your Breeder Plan</label>
                            @if ($payerror)
                              <p class="help is-danger">The account option you chose is no longer available. Please choose from one of our available plans</p>
                            @endif
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
                          <button class="button is-success is-outlined  m-t-10 is-small">Update Your Account</button>
                        </form>
                </div>
                <hr class="m-b-20">
                <div id="payspace">
                      <h1 class="title is-spaced">Activate your account</h1>
                      <form action="" method="POST">
                          <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{$publishable}}"
                            data-description="findyourbreeder.com: {{$accountName}}"
                            data-amount="{{$stripePayAmount}}"
                            data-image="https://www.findyourbreeder.com/images/static/large_logo_name.png"
                            data-name="www.findyourbreeder.com"
                            data-label="Activate Your Account"
                            data-locale="auto"></script>
                      </form>
                </div>
          </div>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->

    </div>
  </div>


@endsection
@section('scripts')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

        <script>

        $(document).ready(function(){
          @if ($payerror)
            $('#payspace').hide();
            $('#currentPayment').hide();
            $('#changePlan').show();
          @endif
           $('#offerchange').click(function (){
           $('#changePlan').toggle();
           });
        });

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-105694721-1', 'auto');
      ga('send', 'pageview');

      </script>
@endsection
