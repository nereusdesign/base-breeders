<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Auth;
use App\User;
use App\Breed;
use App\Breeder;

class ListingCreator extends Controller
{
    public function manageBreedersAdd(){
      $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->pluck('breedName','id');
      $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->pluck('breedName','id');
      $userarr = User::orderBy('email')->pluck('email','id');
      return view('manage.breeders.add',['dogarr' => $dogarr,'catarr' => $catarr, 'userarr' => $userarr]);
    }

    public function manageBreedersProcessAdd(UploadRequest $request){

          do{
                $token = random_str();
                $code = 'EN'. $token . substr(strftime("%Y", time()),2);
                $user_code = \App\Breeder::where('randomKey', $code)->first();
            }
            while(!empty($user_code));

        if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
          $userid = $request->user;
        }else{
          $userid = Auth::id();
        }

        if(!empty($request->phone)){
          $phone = formatPhoneNumber($request->phone);
        }else{
          $phone = "";
        }

        $breeder = \App\Breeder::create([
          'userId' => $userid,
          'breederName' => $request->breeder,
          'breedId' => $request->breed,
          'email' => $request->email,
          'zipcode' => $request->zipcode,
          'randomKey' => $code,
          'phone' => $phone,
          'url' => addScheme($request->url),
        ]);
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');
            \App\breederPictures::create([
                'breeder_id' => $breeder->id,
                'filename' => $filename
            ]);
        }
        //generate the url, then redirect either to the admin panel or the actually profile page itself


    }
}
