@extends('layouts.app')


@section('title','Find Dog and Puppy Breeders Near Your')


@section('desc','Find dog breeders near you using our free dog breeder search. Locate dog and puppy breeders from around the United States and Canada')

@section('content')

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title">Find Dog and Puppy Breeders</h1>
          <p class="is-size-6 m-b-30">Find dog breeders near you using our free dog breeder search. Locate dog and puppy breeders from around the United States and Canada</p>

          <form action="{{route('cat-search')}}" method="POST" role="form">
            {{csrf_field()}}
            <div class="field">
              <label for="email" class="label">Select A Dog Breed</label>
              <p class="control">
                <select class="select is-fullwidth {{$errors->has('breed') ? 'is-danger' : ''}}" name="breed" id="breed" required>
                  <option>-- Select A Dog Breed --</option>
                  @foreach ($breeds as $key => $value)
                    <option value="{{ $key }}" {{ (old("breed") == $key ? "selected":"") }}>{{ $value }}</option>
                  @endforeach
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

  <section style="width:100%;padding:20px;background-color:white">
    <h2 class="title is-primary">Find Breeders By Dog Breed</h2>
    <div class="neat-columns">
      <ul>
      @foreach ($breeds as $key => $value)
        <li>
          <a href="{{url('find/'.$links[$key].'-breeders')}}">{{$value}}</a>
        <li>
      @endforeach
     </ul>
    </div>
  </section>

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
