<div class="modal" id='listingnameEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Change Kennel/Cattery Name</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing')}}" method="POST" role="form">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="listingname">
        <input type="hidden" name="lid" value="{{$info->id}}">
      <div class="field">
        <label for="listingname" class="label">New Name</label>
        <p class="control">
          <input class="input {{$errors->has('listingname') ? 'is-danger' : ''}}" type="text" name="listingname" id="listingname" value="{{ $info->breederName }}" required>
        </p>
        @if ($errors->has('listingname'))
          <p class="help is-danger">{{$errors->first('listingname')}}</p>
        @endif
      </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>


<div class="modal" id='breedLocationEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Change Breed &amp; Location</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
          <form action="{{route('breeder-edit-listing')}}" method="POST" role="form">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="breedLocation">
        <input type="hidden" name="lid" value="{{$info->id}}">
      <div class="field">
        <label for="breed" class="label">Select The Breed</label>
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
      </div>
      <div class="field">
        <label for="zipcode" class="label">Enter Your Zip/Postal Code</label>
        <p class="control">
          <input class="input {{$errors->has('zipcode') ? 'is-danger' : ''}}" type="text" name="zipcode" id="zipcode" value="{{old('zipcode')}}" required>
        </p>
        @if ($errors->has('zipcode'))
          <p class="help is-danger">{{$errors->first('zipcode')}}</p>
        @endif
      </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>

<div class="modal" id='aboutEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Edit About Information</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing')}}" method="POST" role="form">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="about">
        <input type="hidden" name="lid" value="{{$info->id}}">
      <div class="field">
        <label for="about" class="label">New About Information</label>
        <p class="control">
          <textarea class="input {{$errors->has('about') ? 'is-danger' : ''}}" type="text" name="about" id="about">{{old('about')}}</textarea>
        </p>
        @if ($errors->has('about'))
          <p class="help is-danger">{{$errors->first('about')}}</p>
        @endif
      </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>

<div class="modal" id='webEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Change Web Address</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing')}}" method="POST" role="form">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="website">
        <input type="hidden" name="lid" value="{{$info->id}}">
      <div class="field">
        <label for="url" class="label">New Web Address</label>
        <p class="control">
          <input class="input {{$errors->has('url') ? 'is-danger' : ''}}" type="text" name="url" id="url" value="{{old('url')}}">
        </p>
        <p class="help">Enter full web addess: Ex: https://www.yoursite.com or leave blank to remove</p>
        @if ($errors->has('url'))
          <p class="help is-danger">{{$errors->first('url')}}</p>
        @endif
      </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>

<div class="modal" id='emailEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Change Email</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing')}}" method="POST" role="form">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="email">
        <input type="hidden" name="lid" value="{{$info->id}}">
      <div class="field">
        <label for="email" class="label">New Email</label>
        <p class="control">
          <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="email" name="email" id="email" value="{{$info->email}}" required>
        </p>
        @if ($errors->has('email'))
          <p class="help is-danger">{{$errors->first('email')}}</p>
        @endif
      </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>

<div class="modal" id='phoneEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Change Phone Number</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing')}}" method="POST" role="form">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="phone">
        <input type="hidden" name="lid" value="{{$info->id}}">
      <div class="field">
        <label for="email" class="label">New Phone Number</label>
        <p class="control">
          <input class="input {{$errors->has('phone') ? 'is-danger' : ''}}" type="text" name="phone" id="phone" value="{{old('phone')}}">
        </p>
        <p class="help">Please enter numbers only or leave blank to remove</p>
        @if ($errors->has('phone'))
          <p class="help is-danger">{{$errors->first('phone')}}</p>
        @endif
      </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>


<div class="modal" id='pictureEdit'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Update Listing Picture</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing')}}" method="POST" role="form" enctype="multipart/form-data">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="new" value="picture">
        <input type="hidden" name="lid" value="{{$info->id}}">
        <div class="field">
          <label>
          <input class="checkbox-big" type="checkbox" name="setdefault" id="setdefault" value="yes">
          Set Picture To "Find Your Breeder" The Logo
          </label>
          <div class=" is-muted">Check if you wish to change your picture to our logo/default picture instead of using a picture of your own</div>
        </div>
        <hr>
        <div class="file" id="newpicfile">
          <label for="photos" class="label">Set New Picture</label>
          <p class="control">
              <input class="file-input non-default" type="file" name="photos" />
          </p>
          @if ($errors->has('photos'))
            <p class="help is-danger">{{$errors->first('photos')}}</p>
          @endif
        </div>
        @if ( strpos($mainpic, 'default.jpg') === FALSE )
          <div class="field non-default">
            <label>
            <input class="checkbox-big" type="checkbox" name="savepicture" id="savepicture" value="yes" checked>
            Save this picture
            </label>
            <div class="is-muted">Check to use the new picture as your logo, but also save and show your current picture under your additional pictures</div>
          </div>
        @endif
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Save Changes" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>



<div class="modal" id='pictureAdd'>
  <div class="modal-background"></div>
  <div class="modal-card m-t-20">
    <header class="modal-card-head">
      <p class="modal-card-title">Add Pictures To This Listing</p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form action="{{route('breeder-edit-listing-add')}}" method="POST" role="form" enctype="multipart/form-data">
    <section class="modal-card-body">
        {{csrf_field()}}
        <input type="hidden" name="lid" value="{{$info->id}}">
        <div class="file" id="additionalPicture">
          <label for="photos" class="label">Add Picture(s)<div class="is-muted">Max: 10 Pictures At One Time</div></label>

            <button class="add_field_button button is-info is-small">Add Another Picture</button>
            <div class="input_fields_wrap">
            <div class="control">
                <input class="file-input" type="file" name="pictures[]" />
            </div>
          </div>
          @if ($errors->has('pictures'))
            <p class="help is-danger">{{$errors->first('pictures')}}</p>
          @endif
        </div>
    </section>
    <footer class="modal-card-foot">
      <input type="submit" value="Upload All Pictures" class="button is-primary">
      <button class="button close-modal">Cancel</button>
    </footer>
    </form>
  </div>
</div>
