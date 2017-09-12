@extends('layouts.manage')

@section('content')
    <div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Breeder Listings</h1>
        </div>
        <div class="column">
          <a href="{{route('manage.breeders.add')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Breeder Listing</a>
        </div>
      </div>
      <hr class="m-t-0">

      <div class="card">
        <div class="card-content">
          <table class="table is-narrow">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Breed</th>
                <th>Modify Date</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($breeders as $user)
                <tr>
                  <th>{{$user->id}}</th>
                  <td>{{$user->breederName}}</td>
                  <td>{{$user->breedId}}</td>
                  <td>{{$user->updated_at->toFormattedDateString()}}</td>
                  <td class="has-text-right"><a class="button is-outlined m-r-5" href="{{route('view-breeder',['url' => $user->baseUrl])}}">View/Edit</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div> <!-- end of .card -->

      {{$breeders->links()}}
    </div>
@endsection
