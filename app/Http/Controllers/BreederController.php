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
use App\Listing;
use App\listingPictures;


class BreederController extends Controller
{
  public function view($url){
    $mainpic = null;
    $info = \App\Breeder::where('breeders.baseUrl',$url)->select('breeders.*','zip_code.*','breeds.id as bid','breeds.url as burl','breeds.breedName')->join('zip_code', 'breeders.zipcode', '=', 'zip_code.zip_code')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->first();

  if($info == null){
    return redirect()->route('listingremoved');
  }

      $pic = \App\breederPictures::where('breeder_id',$info->id)->get();
      $viewable = array();
      if(!empty($pic)){
        foreach($pic as $p){
          if ($p->isMain == '1') {
            $mainpic = 'storage/'.$p->filename;
          }else{
            $viewable[$p->id] = 'storage/'.$p->filename;
          }
        }
      }
      if(($mainpic == null) || (!file_exists($mainpic))){
        $mainpic = 'storage/photos/default.jpg';
      }


      $alllistings = array();
      $lp = null;
      $listingpics = array();

      $alllistings = \App\Listing::where('breeder_id',$info->id)->get();
      foreach($alllistings as $l){
        $lp = \App\listingPictures::where('listing_id',$l->id)->get();
        if(!empty($lp)){
          foreach($lp as $p){
            if ($p->isMain == '1') {
              $listingpics[$p->listing_id] = 'storage/'.$p->filename;
            }else{
              $listingpics[$p->listing_id] = 'storage/photos/default.jpg';
            }
            if(($listingpics[$p->listing_id] == null) || (!file_exists($listingpics[$p->listing_id]))){
              $listingpics[$p->listing_id] = 'storage/photos/default.jpg';
            }
          }
        }
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

      return view('breeder-listing',['dogarr' => $dogarr,'catarr' => $catarr,'info' => $info,'pic' => $viewable,'canEdit' => $canEdit,'mainpic' => $mainpic,'thisurl' => $url,'listings' => $alllistings,'listingpics' => $listingpics]);

  }

    public function viewYourListings(){
      if(Auth::check()){
          if(Auth::user()->accountActive == '1'){
            $already = array();
            $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->pluck('breedName','id');
            $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->pluck('breedName','id');
            $current = \App\Breeder::where('userId',Auth::user()->id)->select('breeders.*','breeds.id as bid','breeds.breedName','breeds.breedType')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->get();

            foreach ($current as $value) {
              $already[] = $value->id;
            }
            return view('listings-dashboard',['dogarr' => $dogarr,'catarr' => $catarr,'already' => $already,'current' => $current]);
          }else{
            Session::flash('status', 'You must activate your account before you can create a listing.');
            return redirect()->route('checkout');
          }
      }else{
        return redirect()->route('member-only');
      }
    }



}
