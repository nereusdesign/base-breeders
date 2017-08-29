@extends('layouts.app')

@section('content')
  <div class="container profile">

          <div class="section profile-heading">
                  <div class="columns">
                          <div class="column is-2">
                                  <div class="image is-128x128 avatar">
                                          <img src="https://placehold.it/256x256">
                                  </div>
                          </div>
                          <div class="column is-4 name">
                                  <p>
                                          <span class="title is-bold">John Smith</span>
                                          <span class="button is-primary is-outlined follow">Follow</span>
                                  </p>
                                  <p class="tagline">The users profile bio would go here, of course. It could be two lines</p>
                          </div>
                          <div class="column is-2 followers has-text-centered">
                                  <p class="stat-val">129k</p>
                                  <p class="stat-key">followers</p>
                          </div>
                  </div>
          </div>
          <div class="profile-options">
                  <div class="tabs is-fullwidth">
                          <ul>
                                  <li class="link is-active"><a><span class="icon"><i class="fa fa-list"></i></span> <span>Photos</span></a>
                                  </li>
                                  <li class="link"><a><span class="icon"><i class="fa fa-heart"></i></span> <span>Available</span></a>
                                  </li>
                                  <li class="link"><a><span class="icon"><i class="fa fa-th"></i></span> <span>My Posts</span></a>
                                  </li>
                          </ul>
                  </div>
          </div>


          <div class="spacer"></div>

          <div class="columns">
                  <div class="column is-3">
                          <div class="card">
                                  <div class="card-image">
                                          <figure class="image is-4by3">
                                                  <img src="http://placehold.it/300x225" alt="">
                                          </figure>
                                  </div>
                                  <div class="card-content">
                                          <div class="content">
                                                  <span class="tag is-dark">#webdev</span>
                                                  <strong class="timestamp">2 d</strong>
                                          </div>
                                  </div>
                                  <footer class="card-footer">
                                          <a class="card-footer-item">Save</a>
                                          <a class="card-footer-item">Edit</a>
                                          <a class="card-footer-item">Delete</a>
                                  </footer>
                          </div>
                          <br>
                          <div class="card">
                                  <div class="card-image">
                                          <figure class="image is-4by3">
                                                  <img src="http://placehold.it/300x225" alt="">
                                          </figure>
                                  </div>
                                  <div class="card-content">
                                          <div class="content">
                                                  <span class="tag is-dark">#webdev</span>
                                                  <strong class="timestamp">2 d</strong>
                                          </div>
                                  </div>
                                  <footer class="card-footer">
                                          <a class="card-footer-item">Save</a>
                                          <a class="card-footer-item">Edit</a>
                                          <a class="card-footer-item">Delete</a>
                                  </footer>
                          </div>
                          <br>
                          <div class="card">
                                  <div class="card-image">
                                          <figure class="image is-4by3">
                                                  <img src="http://placehold.it/300x225" alt="">
                                          </figure>
                                  </div>
                                  <div class="card-content">
                                          <div class="content">
                                                  <span class="tag is-dark">#webdev</span>
                                                  <strong class="timestamp">2 d</strong>
                                          </div>
                                  </div>
                                  <footer class="card-footer">
                                          <a class="card-footer-item">Save</a>
                                          <a class="card-footer-item">Edit</a>
                                          <a class="card-footer-item">Delete</a>
                                  </footer>
                          </div>
                          <br>
                          <div class="card">
                                  <div class="card-image">
                                          <figure class="image is-4by3">
                                                  <img src="http://placehold.it/300x225" alt="">
                                          </figure>
                                  </div>
                                  <div class="card-content">
                                          <div class="content">
                                                  <span class="tag is-dark">#webdev</span>
                                                  <strong class="timestamp">2 d</strong>
                                          </div>
                                  </div>
                                  <footer class="card-footer">
                                          <a class="card-footer-item">Save</a>
                                          <a class="card-footer-item">Edit</a>
                                          <a class="card-footer-item">Delete</a>
                                  </footer>
                          </div>
                          <br>
                  </div>

          </div>
  </div>
@endsection
