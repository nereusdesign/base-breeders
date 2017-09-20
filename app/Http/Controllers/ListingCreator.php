<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Auth;
use Session;
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
            if(Auth::check()){
                  if(Auth::user()->accountActive != '1'){
                        Session::flash('status', 'You must activate your account before you can create a listing.');
                        return redirect()->route('checkout');
                  }else{
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
                        $isMain = "1";
                        $breeder = \App\Breeder::create([
                          'userId' => $userid,
                          'breederName' => $request->breeder,
                          'breedId' => $request->breed,
                          'email' => $request->email,
                          'zipcode' => $request->zipcode,
                          'about' => $request->about,
                          'randomKey' => $code,
                          'phone' => $phone,
                          'url' => addScheme($request->url),
                        ]);

                        if(!empty($request->photos)){
                          foreach ($request->photos as $photo) {
                            $filename = $photo->store('public/photos');
                            \App\breederPictures::create([
                              'breeder_id' => $breeder->id,
                              'filename' => str_replace('public/'.'',$filename),
                              'isMain' => $isMain
                            ]);
                            if($isMain == '1'){
                              $isMain = '0';
                            }
                          }
                        }
                        //generate the url, then redirect either to the admin panel or the actually profile page itself
                        $baseurl = make_base_url($request->breeder." ".$breeder->id);
                        $UpdateDetails = \App\Breeder::where('id', $breeder->id)->firstOrFail();
                        $UpdateDetails->baseurl = $baseurl;
                        $UpdateDetails->save();
                        return redirect()->route('view-breeder',['url' => $baseurl]);
                  }
            }else{
              return redirect()->route('member-only');
            }
    }


    public function breedersProcessAdd(UploadRequest $request){

          do{
                $token = random_str();
                $code = 'EN'. $token . substr(strftime("%Y", time()),2);
                $user_code = \App\Breeder::where('randomKey', $code)->first();
            }
            while(!empty($user_code));


        $userid = Auth::id();


        if(!empty($request->phone)){
          $phone = formatPhoneNumber($request->phone);
        }else{
          $phone = "";
        }
        $isMain = "1";
        $breeder = \App\Breeder::create([
          'userId' => $userid,
          'breederName' => $request->breeder,
          'breedId' => $request->breed,
          'email' => $request->email,
          'zipcode' => $request->zipcode,
          'about' => $request->about,
          'randomKey' => $code,
          'phone' => $phone,
          'url' => addScheme($request->url),
        ]);

        if(!empty($request->photos)){
            foreach ($request->photos as $photo) {
                $filename = $photo->store('public/photos');
                \App\breederPictures::create([
                    'breeder_id' => $breeder->id,
                    'filename' => str_replace('public/'.'',$filename),
                    'isMain' => $isMain
                ]);
                if($isMain == '1'){
                  $isMain = '0';
                }
            }
        }
        //generate the url, then redirect either to the admin panel or the actually profile page itself
          $baseurl = make_base_url($request->breeder." ".$breeder->id);
          $UpdateDetails = \App\Breeder::where('id', $breeder->id)->firstOrFail();
          $UpdateDetails->baseurl = $baseurl;
          $UpdateDetails->save();
          Session::flash('success', 'Listing Created.');
          return redirect()->route('view-breeder',['url' => $baseurl]);

    }

    public function breederEditListing(Request $request){

        if(Auth::check()){
              if(is_numeric($request->lid)){
                if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
                  $listing = \App\Breeder::where('id', $request->lid)->first();
                }else{
                  $userid = Auth::id();
                  $listing = \App\Breeder::where('id', $request->lid)->where('userId','=','$userid')->first();
                }
                if(!empty($listing)){
                    $baseurl = $listing->baseUrl;
                  //found the listing, set it and save it
                    switch ($request->new) {
                      case 'listingname':
                          $this->validate($request, [
                            'listingname' => 'required',
                          ]);
                          $listing->breederName = $request->listingname;
                      break;
                      case 'breedLocation':
                      $this->validate($request, [
                        'breed' => 'required|numeric|exists:breeds,id',
                        'zipcode' => 'required|exists:zip_code,zip_code'
                      ]);
                        $listing->breedId = $request->breed;
                        $listing->zipcode = $request->zipcode;
                      break;
                      case 'about':
                        $listing->about = $request->about;
                      break;
                      case 'url':
                        $listing->url = addScheme($request->url);
                      break;
                      case 'email':
                        $this->validate($request, [
                          'email' => 'required|email'
                        ]);
                        $listing->email = addScheme($request->email);
                      break;
                      case 'phone':
                        $this->validate($request, [
                          'phone' => 'nullable|numeric|phone'
                        ]);
                        if(!empty($request->phone)){
                          $phone = formatPhoneNumber($request->phone);
                        }else{
                          $phone = "";
                        }
                        $listing->phone = $phone;
                      break;
                      default:
                        return redirect()->route('view-breeder',['url' => $baseurl]);
                        break;
                    }
                    $listing->save();
                    Session::flash('success', 'Listing updated.');
                    return redirect()->route('view-breeder',['url' => $baseurl]);
                }else{
                  return redirect()->route('listingremoved');
                }
              }else{
                return redirect()->route('listingremoved');
              }
       }else{
         return redirect()->route('member-only');
       }
    }


}
