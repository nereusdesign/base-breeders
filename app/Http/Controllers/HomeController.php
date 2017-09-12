<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Breed;

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
        $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->get();
        $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->get();
        return view('home',['mainimage' => $randomFile,'dogarr' => $dogarr,'catarr' => $catarr]);
    }

    public function checkout(){
      if(Auth::user()){
        if(Auth::user()->accountActive == '0'){
            $thisyear = date('Y');
            $addayear = $thisyear + 21;
            while($thisyear < $addayear){
              $years[] = $thisyear;
              $thisyear++;
            }
            return view('checkout',['years' => $years]);
        }else{
          return view('home',['mainimage' => $randomFile]);
        }
      }else{
        return view('home',['mainimage' => $randomFile]);
      }
    }

    public function postOrder(Request $request)
    {
        //
    }

}
