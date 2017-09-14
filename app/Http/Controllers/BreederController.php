<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breeder;
use App\breederPictures;
use Auth;
use Session;
use App\User;
use App\Breed;
use App\Account;


class BreederController extends Controller
{
    public function view($url){
          $info = \App\Breeder::where('breeders.baseurl',$url)->select('breeders.*','zip_code.*','breeds.id as bid','breeds.*')->join('zip_code', 'breeders.zipcode', '=', 'zip_code.zip_code')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->first();
          $pic = \App\breederPictures::where('breeder_id',$info->id)->get();
          if(!empty($info)){
            return view('breeder-listing',['info' => $info,'pic' => $pic]);
          }else{
            //redirect to listing removed page
            return redirect()->route('listingremoved');
          }
    }

    public function viewYourListings(){
      if(Auth::check()){
          if(Auth::user()->accountActive == '1'){
            return view('listings-dashboard');
          }else{
            Session::flash('status', 'You must activate your account before you can create a listing.');
            return redirect()->route('checkout');
          }
      }else{
        return redirect()->route('member-only');
      }
    }

    public function accountSettings(){
        if(Auth::check()){
            switch (Auth::user()->accountActive) {
              case '1':
                $status = "<span class='has-text-success has-text-weight-bold'>(Active)</span>";
                break;
              default:
                $status = "<span class='has-text-warning has-text-weight-bold'>(Pending)</span>";
                break;
            }
            $type = \App\Account::where('accountKey',Auth::user()->payKey)->first();
            $accountstatus = $type->accountName.' '.$status;
            return view('account-settings',['accountStatus' => $accountstatus]);
        }else{
            return redirect()->route('member-only');
        }
    }

}
