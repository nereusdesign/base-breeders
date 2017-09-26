<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ListingUploadRequest;
use Storage;
use Auth;
use DB;
use Session;
use App\Breeder;
use App\breederPictures;
use App\Listing;
use App\listingPictures;
use App\User;
use App\Breed;
use App\Account;
use App\File;

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

    public function processAddForSale(ListingUploadRequest $request){


      if(Auth::check()){
            if(Auth::user()->accountActive != '1'){
                  Session::flash('status', 'You must activate your account before you can create a listing.');
                  return redirect()->route('checkout');
            }else{

              //validate the breeder key is legit and this user can access it
              $randomKey = $request->listingK;
              if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
                $listing = \App\Breeder::where('randomKey', $randomKey)->first();
              }else{
                $userid = Auth::id();
                $listing = \App\Breeder::where('randomKey', $randomKey)->where('userId','=',$userid)->first();
              }

              if(count($listing) != '1'){
                return redirect()->route('listingremoved');
              }

          do{
                $token = random_str();
                $code = 'EN'. $token . substr(strftime("%Y", time()),2);
                $user_code = \App\Listing::where('randomKey', $code)->first();
            }
            while(!empty($user_code));


        $userid = Auth::id();


        $isMain = "1";
        $l = \App\Listing::create([
          'userId' => $userid,
          'listingName' => $request->listingName,
          'breedId' => $listing->breedId,
          'zipcode' => $listing->zipcode,
          'about' => $request->about,
          'randomKey' => $code,
          'DOB' => $request->cleanDate,
          'numberAvailable' => $request->numAvailable
        ]);

        if(!empty($request->photos)){
            foreach ($request->photos as $photo) {
                $filename = $photo->store('public/listings');
                \App\listingPictures::create([
                    'breeder_id' => $l->id,
                    'filename' => str_replace('public/','',$filename),
                    'isMain' => $isMain
                ]);
                if($isMain == '1'){
                  $isMain = '0';
                }
            }
        }
        //generate the url, then redirect either to the admin panel or the actually profile page itself
          $baseurl = make_base_url($request->listingName." ".$l->id);
          $l->baseurl = $baseurl;
          $l->save();
          Session::flash('success', 'Listing Created.');
          return redirect()->route('view-breeder',['url' => $listing->baseUrl]);
        }
        }else{
          return redirect()->route('member-only');
        }






    }

}
