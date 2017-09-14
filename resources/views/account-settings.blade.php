@extends('layouts.app')

@section('title','Find Your Breeder | Account Settings')


@section('desc','Account Settings')


@section('content')


  <div class="columns">
    <div class="column is-half is-offset-one-quarter m-t-50">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Account Settings</h1>
          @if(Session::has('status'))
                <p class="help is-danger is-font-16">{{ Session::get('status') }}</p>
          @endif
          @if(Session::has('success'))
                <p class="help is-success is-font-16">{{ Session::get('success') }}</p>
          @endif
          <div class="field">
            <label for="email" class="label">Email Address</label>
            <p class="control">
              <i class="fa fa-pencil-square-o is-hover" aria-hidden="true" id='editEmail'></i>  {{ Auth::user()->email }}
            </p>
          </div>
          <div class="modal" id='emailEdit'>
            <div class="modal-background"></div>
            <div class="modal-card m-t-20">
              <header class="modal-card-head">
                <p class="modal-card-title">Update Your Email</p>
                <button class="delete close-modal" aria-label="close"></button>
              </header>
              <section class="modal-card-body">
                <form action="{{route('update-account')}}" method="POST" role="form">
                  {{csrf_field()}}
                <div class="field">
                  <label for="email" class="label">Email Address</label>
                  <p class="control">
                    <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{ Auth::user()->email }}" required>
                  </p>
                  @if ($errors->has('email'))
                    <p class="help is-danger">{{$errors->first('email')}}</p>
                  @endif
                </div>
              </section>
              <footer class="modal-card-foot">
                <button class="button is-primary">Save changes</button>
              </form>
                <button class="button close-modal">Cancel</button>
              </footer>
            </div>
          </div>

          <div class="field">
            <label for="email" class="label">Password</label>
            <p class="control">
              <i class="fa fa-pencil-square-o is-hover" aria-hidden="true" id='editPw'></i>  **********
            </p>
          </div>
          <div class="modal" id='pwEdit'>
            <div class="modal-background"></div>
            <div class="modal-card m-t-20">
              <header class="modal-card-head">
                <p class="modal-card-title">Update Your Password</p>
                <button class="delete close-modal" aria-label="close"></button>
              </header>
              <section class="modal-card-body">
                <form action="{{route('update-account-pw')}}" method="POST" role="form">
                  {{csrf_field()}}
                <div class="field">
                  <label for="email" class="label">New Password</label>
                  <p class="control">
                    <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" value="" required>
                  </p>
                  @if ($errors->has('password'))
                    <p class="help is-danger">{{$errors->first('password')}}</p>
                  @endif
                </div>
              </section>
              <footer class="modal-card-foot">
                <button class="button is-primary">Save changes</button>
              </form>
                <button class="button close-modal">Cancel</button>
              </footer>
            </div>
          </div>




          <div class="field">
            <label for="email" class="label">Account Status</label>
            <p class="control">
              {!! $accountStatus !!}
              @if (Auth::user()->accountActive == '0')
                <div class="m-l-10"><a href="{{route('checkout')}}">Activate Your Account</a>
              @endif
            </p>
          </div>

        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->

    </div>
  </div>

@endsection
@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
      $('#editEmail').click(function(){
          $( "#emailEdit" ).toggle();
      });
      $('#editPw').click(function(){
          $( "#pwEdit" ).toggle();
      });
      $('.close-modal').click(function(){
          $( ".modal" ).hide();
      });
      @if ($errors->has('email'))
        $( "#emailEdit" ).show();
      @endif
      @if ($errors->has('password'))
        $( "#emailPw" ).show();
      @endif
});
</script>

  <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-105694721-1', 'auto');
ga('send', 'pageview');

</script>
@endsection
