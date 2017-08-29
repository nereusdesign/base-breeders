@extends('layouts.app')

@section('content')

    <h1>Search Results For {{ $breed->breedName }}</h1>
    @if ($hasresults == '1')
      @foreach ($breeders as $value)
        <h2>{{ $value->breederName }}</h2>
        <h3>{{ $value->city }}</h3>
      @endforeach
    @else
      <h2>Sorry we do not currently have any {{ $breed->breedName }} breeders listed.</h2>
    @endif

@endsection
