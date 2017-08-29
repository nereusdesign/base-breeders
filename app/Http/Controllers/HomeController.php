<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folder_path = public_path()."/images/static/"; // in my test case it's under /public folder
        $files = preg_grep('~\.(jpeg|jpg|png)$~', scandir($folder_path));
        $randomFile = $files[array_rand($files)];
        return view('home',['mainimage' => $randomFile]);
    }

    public function checkout(){    
      if(Auth::user()){
        if(Auth::user()->accountActive == '0'){
            return view('checkout');
        }else{
          return view('home',['mainimage' => $randomFile]);
        }
      }else{
        return view('home',['mainimage' => $randomFile]);
      }
    }
}
