@extends('layouts.app')

@section('title','Find Your Breeder | Account Settings')


@section('desc','Account Settings')


@section('content')
<h1 class="title is-3 m-l-15 m-t-25 m-b-10">Manage Your Listings</h1>
  <section class="m-t-75 m-l-50 m-r-50">
      <b-tabs type="is-toggle" v-model="activeTab">
          <b-tab-item label="Current Listings">
              <h1>Current</h1>
          </b-tab-item>

          <b-tab-item label="Post Kennel/Cattery To Directoy">
              <h1>Create Breed Directory Listing</h1>

              <form action="{{route('directory-add')}}" method="POST" role="form" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="field">
                  <label for="breeder" class="label">Kennel/Cattery Name</label>
                  <p class="control">
                    <input class="input {{$errors->has('breeder') ? 'is-danger' : ''}}" type="text" name="breeder" id="breeder" value="{{old('breeder')}}" required>
                  </p>
                  @if ($errors->has('breeder'))
                    <p class="help is-danger">{{$errors->first('breeder')}}</p>
                  @endif
                </div>


                <div class="field">
                  <label for="email" class="label">Contact Email</label>
                  <p class="control">
                    <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email')}}" required>
                  </p>
                  @if ($errors->has('email'))
                    <p class="help is-danger">{{$errors->first('email')}}</p>
                  @endif
                </div>


                <div class="field">
                  <label for="phone" class="label">Contact Phone Number<span class="is-font-14 is-muted">optional</span></label>
                  <p class="control">
                    <input class="input {{$errors->has('phone') ? 'is-danger' : ''}}" type="text" name="phone" id="phone" value="{{old('phone')}}">
                  </p>
                  <p class="help">Please enter numbers only</p>
                  @if ($errors->has('phone'))
                    <p class="help is-danger">{{$errors->first('phone')}}</p>
                  @endif
                </div>

                <div class="field">
                  <label for="url" class="label">Web Address <span class="is-font-14 is-muted">optional</span></label>
                  <p class="control">
                    <input class="input {{$errors->has('url') ? 'is-danger' : ''}}" type="text" name="url" id="url" value="{{old('url')}}">
                  </p>
                  <p class="help">Enter full web addess: Ex: https://www.yoursite.com</p>
                  @if ($errors->has('url'))
                    <p class="help is-danger">{{$errors->first('url')}}</p>
                  @endif
                </div>


                <div class="field">
                  <label for="breeder" class="label">Zip/Postal Code</label>
                  <p class="control">
                    <input class="input {{$errors->has('zipcode') ? 'is-danger' : ''}}" type="text" name="zipcode" id="zipcode" value="{{old('zipcode')}}" required>
                  </p>
                  @if ($errors->has('zipcode'))
                    <p class="help is-danger">{{$errors->first('zipcode')}}</p>
                  @endif
                </div>



                    <div class="field">
                      <label for="breed" class="label">Breed</label>
                      <p class="control">
                        <div class="select">
                          <select class="select" name="breed" id="breed" required>
                            <option>-- Select A Breed --</option>
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




                  <div class="file">
                    <label for="photos" class="label">Pictures<span class="is-font-14 is-muted">optional</span></label>
                    <p class="control">
                        <input class="file-input" type="file" name="photos[]" multiple />
                    </p>
                    @if ($errors->has('photos'))
                      <p class="help is-danger">{{$errors->first('photos')}}</p>
                    @endif
                  </div>


                  <div class="field">
                    <label for="about" class="label">About<span class="is-font-14 is-muted">optional</span></label>
                    <p class="control">
                      <textarea class="input {{$errors->has('about') ? 'is-danger' : ''}}" type="text" name="about" id="about">{{old('about')}}</textarea>
                    </p>
                    @if ($errors->has('about'))
                      <p class="help is-danger">{{$errors->first('about')}}</p>
                    @endif
                  </div>


                <button class="button is-success is-outlined is-fullwidth m-t-30">Create Breeder Listing</button>
              </form>




          </b-tab-item>

          <b-tab-item label="Post Available Dog/Cat">
              <h1>Available</h1>
          </b-tab-item>

          <b-tab-item label="Messages">
              <h1>Messages</h1>
          </b-tab-item>
      </b-tabs>
  </section>

@endsection
@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      activeTab: 0,
    }
  });


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-105694721-1', 'auto');
ga('send', 'pageview');

</script>
@endsection
