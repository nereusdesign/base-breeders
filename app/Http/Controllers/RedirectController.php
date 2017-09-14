<?php

namespace App\Http\Controllers;

use Request;
use Session;

class RedirectController extends Controller
{
  public function index()
  {
    return view('redirect.view');
  }

  public function listingremoved(){
    return view('redirect.listingremoved');
  }

  public function notOnline(){
    Session::flash('status', 'You must be logged in to access this page.');
    return redirect()->route('login');
  }
}
