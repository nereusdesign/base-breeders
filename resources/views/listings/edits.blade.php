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
