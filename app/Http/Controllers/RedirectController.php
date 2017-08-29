<?php

namespace App\Http\Controllers;

use Request;

class RedirectController extends Controller
{
  public function index()
  {
    return view('redirect.view');
  }

  public function listingremoved(){
    return view('redirect.listingremoved');
  }
}
