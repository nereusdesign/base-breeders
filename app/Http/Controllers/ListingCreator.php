<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\UploadPicturesRequest;
use Auth;
use Session;
use DB;
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
                    'filename' => str_replace('public/','',$filename),
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
        }else{
          return redirect()->route('member-only');
        }

    }

    public function breederEditListing(Request $request){

        if(Auth::check()){
              if(is_numeric($request->lid)){
                if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
                  $listing = \App\Breeder::where('id', $request->lid)->first();
                }else{
                  $userid = Auth::id();
                  $listing = \App\Breeder::where('id', $request->lid)->where('userId','=',$userid)->first();
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
                      case "picture":
                        //if we arent saving this picture, remove it completely
                        if($request->savepicture != 'yes'){
                          DB::table('breeder_pictures')->where('breeder_id',$request->lid)->where('isMain','1')->limit(1)->delete();
                          //run scheduled clean ups to actually remove the files, just in case someone accidently deletes something
                        }
                        //check if setting to default
                        if($request->setdefault == 'yes'){
                            DB::table('breeder_pictures')->where('breeder_id',$request->lid)->update(['isMain' => '0']);
                        }else{
                          DB::table('breeder_pictures')->where('breeder_id',$request->lid)->update(['isMain' => '0']);
                          //upload the new picture
                          $this->validate($request, [
                            'photos' => 'required|mimes:jpeg,bmp,png|max:8000',
                          ]);
                          $filename = $request->file('photos')->store('public/photos');
                          \App\breederPictures::create([
                            'breeder_id' => $request->lid,
                            'filename' => str_replace('public/','',$filename),
                            'isMain' => '1'
                          ]);
                        }
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

    public function breederEditListingAdd(UploadPicturesRequest $request){

      if(Auth::check()){
            if(is_numeric($request->lid)){
              if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
                $listing = \App\Breeder::where('id', $request->lid)->first();
              }else{
                $userid = Auth::id();
                $listing = \App\Breeder::where('id', $request->lid)->where('userId','=',$userid)->first();
              }
              if(!empty($listing)){
                  $baseurl = $listing->baseUrl;
                  if(count($request->pictures)){
                      foreach ($request->pictures as $picture) {
                          $filename = $picture->store('public/photos');
                          \App\breederPictures::create([
                              'breeder_id' => $request->lid,
                              'filename' => str_replace('public/','',$filename),
                              'isMain' => '0'
                          ]);
                       }
                    Session::flash('success', 'Listing updated.');
                  }else{
                    Session::flash('status', 'Please select a picture to add.');
                  }
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

    public function removeImage (Request $request){
      if(Auth::check()){
        if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
          DB::table('breeder_pictures')->where('id',$request->img)->delete();
        }else{
          $userid = Auth::id();
          $listing = \App\Breeder::where('id', $request->lid)->where('userId','=',$userid)->first();
          if(count($listing) == '1'){
            DB::table('breeder_pictures')->where('id',$request->img)->where('breeder_id',$listing->id)->delete();
          }else{
            return redirect()->route('listingremoved');
          }
        }
        Session::flash('success', 'Listing updated.');
        return redirect()->route('view-breeder',['url' => $request->baseurl]);
      }else{
        return redirect()->route('member-only');
      }
    }

    public function removeListing(Request $request){
      if(Auth::check()){
        if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
          DB::table('listings')->where('id',$request->img)->delete();
        }else{
          $userid = Auth::id();
          DB::table('listings')->where('id',$request->img)->where('userId',$userid)->delete();
        }
        Session::flash('success', 'Listing updated.');
        return redirect()->route('view-breeder',['url' => $request->baseurl]);
      }else{
        return redirect()->route('member-only');
      }
    }


}
