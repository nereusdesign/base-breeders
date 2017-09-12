<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
  public function showArticles()
  {
    $posts = \App\Post::where('islive','1')->latest('liveDate')->paginate(10);
    return view('dog-and-cat-news',['posts' => $posts]);
  }

  public function view($url){
    $post = \App\Post::where('urlBase',$url)->first();
    return view('view-article',['article' => $post]);
  }
}
