<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breeder;
use App\breederPictures;

class BreederController extends Controller
{
    public function view($url){
          $info = \App\Breeder::where('baseurl',$url)->first();
          $pic = \App\breederPictures::where('breeder_id',$info->id)->get();
          if(!empty($info)){
            return view('breeder-listing',['info' => $info,'pic' => $pic]);
          }else{
            //redirect to listing removed page
            return redirect()->route('listingremoved');
          }
    }
}
