@extends('layouts.app')

@section('title','Find Your Breeder | Account Settings')


@section('desc','Account Settings')


@section('content')
    <div class="columns m-t-70 m-l-20 m-r-20">
      <div class="column">
        <div class="card">
          <div class="card-content">
            <h1 class="title">Add Available {{ $breed }}</h1>
            <p>Use the form below to list {{ $breed }} you have available. You can choose to list each puppy or kitten individually or all together. You also can upload an unlimited number of pictures.</p>
            @if(Session::has('status'))
                  <p class="help is-danger is-font-16">{{ Session::get('status') }}</p>
            @endif
            @if(Session::has('success'))
                  <p class="help is-success is-font-16">{{ Session::get('success') }}</p>
            @endif
            <form action="{{route('available.process.add')}}" method="POST" role="form" enctype="multipart/form-data">
              {{csrf_field()}}
                <input type="hidden" name="listingK" value="{{$rk}}">

              <div class="field">
                <label for="breeder" class="label">Listing Name</label>
                <p class="control">
                  <input class="input {{$errors->has('listingName') ? 'is-danger' : ''}}" type="text" name="listingName" id="listingName" value="{{old('listingName')}}" required>
                </p>
                @if ($errors->has('listingName'))
                  <p class="help is-danger">{{$errors->first('listingName')}}</p>
                @endif
              </div>

              <div class="field">
                <label for="breeder" class="label">Date of Birth/Due Date</label>
                <div class="control">
                  <div class="is-pulled-left m-r-5">
                    <select name="month" id="month" class="select {{$errors->has('date') ? 'is-danger' : ''}}" required>
                      <option>- Month -</option>
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">Jun</option>
                      <option value="07">Jul</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                  </div>
                  <div class="is-pulled-left m-r-5">
                    <select name="day" id="day" class="select {{$errors->has('date') ? 'is-danger' : ''}}" required>
                      <option>- Day -</option>
                      @for ($i=1; $i < 32; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                  <div class="is-pulled-left m-r-5">
                    <select name="year" id="year" class="select {{$errors->has('date') ? 'is-danger' : ''}}" required>
                      <option>- Year -</option>
                      @foreach ($years as $value)
                        <option value="{{$value}}"  @if($value == $thisyear){ selected } @endif>{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="is-clearfix"></div>
                </div>
                @if ($errors->has('date'))
                  <p class="help is-danger">Invalid date</p>
                @endif
              </div>


              <div class="field">
                <label for="numAvailable" class="label">Number Available</label>
                <p class="select">
                  <select class="select" name="numAvailable" id="numAvailable" required>
                    <option value="-1">Unknown</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </p>
                @if ($errors->has('numAvailable'))
                  <p class="help is-danger">{{$errors->first('numAvailable')}}</p>
                @endif
              </div>


              <div class="field">
                <label for="about" class="label">About <span class="is-font-14 is-muted">optional</span></label>
                <p class="control">
                  <textarea class="input {{$errors->has('about') ? 'is-danger' : ''}}" type="text" name="about" id="about">{{old('about')}}</textarea>
                </p>
                @if ($errors->has('about'))
                  <p class="help is-danger">{{$errors->first('about')}}</p>
                @endif
              </div>

              <div class="file">
                <label for="photos" class="label">Picture(s) </label>
                <div class="input_fields_wrap">
                <div class="control">
                    <input class="file-input" type="file" name="photos[]" />
                </div>
                <button class="add_field_button button is-info is-small">Add Another Picture</button>
              </div>
                @if ($errors->has('photos'))
                  <p class="help is-danger">{{$errors->first('photos')}}</p>
                @endif
              </div>

              <button class="button is-success is-outlined is-fullwidth m-t-30 m-b-20">Create Listing</button>
            </form>
          </div> <!-- end of .card-content -->
        </div> <!-- end of .card -->
      </div>
    </div>



@endsection
@section('scripts')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
$(document).ready(function() {
  var max_fields = 10;
  var x = 1;
  $('.add_field_button').click(function(e) {
    e.preventDefault();
    if(x < max_fields){
      x++;
      if(x >= max_fields){
        $('.add_field_button').hide();
      }
      $('.input_fields_wrap').append('<div class="control"><input class="file-input" type="file" name="photos[]" /><a href="#" class="remove_field">Remove</a></div>')
    }
  });

  $('.input_fields_wrap').on("click",".remove_field",function(e){
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
    if(x < max_fields){
      $('.add_field_button').show();
    }
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
