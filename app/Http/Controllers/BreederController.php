<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Breeder;
use App\breederPictures;
use Auth;
use DB;
use Session;
use App\User;
use App\Breed;
use App\Account;
use App\File;


class BreederController extends Controller
{
  public function view($url){
    $mainpic = null;
    $info = \App\Breeder::where('breeders.baseurl',$url)->select('breeders.*','zip_code.*','breeds.id as bid','breeds.url as burl','breeds.breedName')->join('zip_code', 'breeders.zipcode', '=', 'zip_code.zip_code')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->first();



      $pic = \App\breederPictures::where('breeder_id',$info->id)->get();
      if(!empty($pic)){
        foreach($pic as $p){
          if ($p->isMain == '1') {
            $mainpic = 'storage/'.$p->filename;
          }
        }
      }
      if(($mainpic == null) || (!file_exists($mainpic))){
        $mainpic = 'storage/photos/default.jpg';
      }
      $canEdit = FALSE;
      $dogarr = array();
      $catarr = array();
      if(Auth::check()){
        if((Auth::user()->hasRole(['superadministrator', 'administrator'])) || (Auth::id() == $info->userId)){
          $canEdit = TRUE;
          $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->pluck('breedName','id');
          $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->pluck('breedName','id');
        }
      }

      return view('breeder-listing',['dogarr' => $dogarr,'catarr' => $catarr,'info' => $info,'pic' => $pic,'canEdit' => $canEdit,'mainpic' => $mainpic,'thisurl' => $url]);

  }

    public function viewYourListings(){
      if(Auth::check()){
          if(Auth::user()->accountActive == '1'){
            $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->pluck('breedName','id');
            $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->pluck('breedName','id');
            return view('listings-dashboard',['dogarr' => $dogarr,'catarr' => $catarr]);
          }else{
            Session::flash('status', 'You must activate your account before you can create a listing.');
            return redirect()->route('checkout');
          }
      }else{
        return redirect()->route('member-only');
      }
    }



}
