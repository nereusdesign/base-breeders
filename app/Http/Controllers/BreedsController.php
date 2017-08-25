<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use Auth;

class BreedsController extends Controller
{
    public function index()
    {
      return redirect()->route('breeds.view');
    }

    public function view()
    {
      //get all the breeds so view breeds can list it
      $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->get();
      $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->get();
      return view('view-breeds',['dogs' => $dogarr,'cats' => $catarr]);
    }

    public function viewDogs()
    {
      //get all the breeds so view breeds can list it
      $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->get();
      return view('view-breeds',['dogs' => $dogarr]);
    }

    public function viewCats()
    {
      //get all the breeds so view breeds can list it
      $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->get();
      return view('view-breeds',['cats' => $catarr]);
    }

    public function listing($url)
    {
      //get all the breeds so view breeds can list it
      $info = \App\Breed::where('url',$url)->first();
      if($info->breedType == 'dog'){
        $vis[] = "apartment";
        $vis[] = "cat";
        $vis[] = "exercise";
        $vis[] = "training";
        $vis[] = "height";
        $vis[] = "pureMixed";
      }elseif ($info->breedType == 'cat') {
        $vis[] = "affectionate";
        $vis[] = "playfulness";
        $vis[] = "lapCat";
      }

        if(isset($info)){
          return view('breed-info',['info' => $info,'vis' => $vis]);
        }else{
          //flash an error message to session_destroy
          return redirect()->route('breeds.view');
        }
    }

    public function edit()
    {
      if(Auth::user()){
          if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              return view('breeds.edit');
          }else{
              return redirect()->route('breeds.view');
          }
      }else{
        return redirect()->route('breeds.view');
      }
    }

    public function add()
    {
      if(Auth::user()){
          if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              return view('breeds.add');
          }else{
              return redirect()->route('breeds.view');
          }
      }else{
        return redirect()->route('breeds.view');
      }
    }

    public function delete()
    {
      if(Auth::user()){
          if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              return view('breeds.delete');
          }else{
              return redirect()->route('breeds.view');
          }
      }else{
        return redirect()->route('breeds.view');
      }
    }

}
