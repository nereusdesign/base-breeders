<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class ListingController extends Controller
{
    //
    public function addForSale($url){
      if(Auth::check()){
          if(Auth::user()->accountActive == '1' || Auth::user()->hasRole(['superadministrator', 'administrator'])){

            if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
                  $listing = \App\Breeder::where('breeders.baseurl',$url)->select('breeders.*','breeds.id as bid','breeds.url as burl','breeds.breedName','breeds.breedType')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->first();
            }else{
              $userid = Auth::id();
              $listing = \App\Breeder::where('breeders.baseurl',$url)->where('userId','=',$userid)->select('breeders.*','breeds.id as bid','breeds.url as burl','breeds.breedName')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->first();
            }
            $key = $listing->randomKey;
            $breed = $listing->breedName;
            $dogOrCat = $listing->breedType;
            $thisyear = date('Y');
            $first = $thisyear - 20;
            $last = $thisyear + 5;
            $yeararr = range($first,$last);
            return view('create-available',['rk' => $key,'breed' => $breed,'dogOrCat' => $dogOrCat,'years' =>$yeararr,'thisyear' => $thisyear]);



          }else{
            Session::flash('status', 'You must activate your account before you can create a listing.');
            return redirect()->route('checkout');
          }
      }else{
        return redirect()->route('member-only');
      }
    }
}
