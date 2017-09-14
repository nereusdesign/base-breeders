<?php

namespace App\Http\Controllers;

use Request;
use Session;
use Auth;

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

  public function notAdmin(){
      if(Auth::check()){
        return view('redirect.notAdmin');
      }else{
        return redirect()->route('member-only');
      }
  }



}
