@extends('layouts.manage')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Create A Breeder Account</h1>

          <form action="{{route('manage.breeders.process.add')}}" method="POST" role="form" enctype="multipart/form-data">
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
              <label for="phone" class="label">Contact Phone Number</label>
              <p class="control">
                <input class="input {{$errors->has('phone') ? 'is-danger' : ''}}" type="text" name="phone" id="phone" value="{{old('phone')}}">
              </p>
              @if ($errors->has('phone'))
                <p class="help is-danger">{{$errors->first('phone')}}</p>
              @endif
            </div>

            <div class="field">
              <label for="url" class="label">Web Address</label>
              <p class="control">
                <input class="input {{$errors->has('url') ? 'is-danger' : ''}}" type="text" name="url" id="url" value="{{old('url')}}">
              </p>
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
                      <select name="breed" id="breed" required>
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



                <div class="field">
                  <label for="user" class="label">Link To User</label>
                  <p class="control">
                      <div class="select">
                        <select name="user" id="user" required>
                          <option>-- Select A User --</option>
                          @foreach($userarr as $userid => $user)
                            <option value="{{ $userid }}">{{ $user }}</option>
                          @endforeach
                        </select>
                      </div>
                  </p>
                  @if ($errors->has('user'))
                    <p class="help is-danger">{{$errors->first('user')}}</p>
                  @endif
                </div>




              <div class="file">
                <label for="photos" class="label">Pictures</label>
                <p class="control">
                    <input class="file-input" type="file" name="photos[]" multiple />
                </p>
                @if ($errors->has('photos'))
                  <p class="help is-danger">{{$errors->first('photos')}}</p>
                @endif
              </div>


            <button class="button is-success is-outlined is-fullwidth m-t-30">Create Breeder Listing</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
      <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Already have an Account?</a></h5>
    </div>
  </div>

@endsection
