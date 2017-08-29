<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\User;

class ManageController extends Controller
{
    public function index()
    {
      return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
      return view('manage.dashboard');
    }

    public function breedersView(){
      $breeders = \App\Breeder::orderBy('updated_at', 'desc')->paginate(10);
      return view('manage.breeders.view',['breeders' => $breeders]);
    }

    public function breedersAdd(){
      $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->pluck('breedName','id');
      $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->pluck('breedName','id');
      $userarr = User::orderBy('email')->pluck('email','id');
      return view('manage.breeders.add',['dogarr' => $dogarr,'catarr' => $catarr, 'userarr' => $userarr]);
    }

}
