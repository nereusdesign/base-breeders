<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Breed;
use App\Breeder;
use App\breederPictures;

class SearchController extends Controller
{

  private function isZipOk($z){
      $zip = strtoupper(preg_replace("/[^A-Za-z0-9 ]/", '', $z));
      $check = DB::table('zip_code')->where('zip_code', $zip)->first();
      if(empty($check)){
        return false;
      }
  }


  public function findcatbreeder(){
    $catarr = DB::table('breeds')->select('breedType','breedName','id')->where('breedType','=','cat')->orderBy('breedName','asc')->get();
    foreach ($catarr as $value) {
      $breeds[$value->id] = $value->breedName;
    }
    return view('find-cat-breeders', ['breeds' => $breeds]);
  }

  public function finddogbreeder(){
    $catarr = DB::table('breeds')->select('breedType','breedName','id')->where('breedType','=','dog')->orderBy('breedName','asc')->get();
    foreach ($catarr as $value) {
      $breeds[$value->id] = $value->breedName;
    }
    return view('find-dog-breeders', ['breeds' => $breeds]);
  }

  public function findallbreeder(){
    $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->get();
    $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->get();
    foreach ($catarr as $value) {
      $cbreeds[$value->id] = $value->breedName;
    }
    foreach ($dogarr as $value) {
      $dbreeds[$value->id] = $value->breedName;
    }
    return view('find-breeders', ['breed1' => $dbreeds,'breed2' => $dbreeds]);
  }

    public function allByBreed($url){
          $breeddetails = \App\Breed::where('url', $url)->first();
          if(!empty($breeddetails)){
            $breeders = \App\Breeder::where('breedId',$breeddetails->id)->get();
            if(empty($breeders)){
              //none
              $hasbreeders = false;
            }else{
              //check for pictures
              $hasbreeders = true;
              foreach($breeders as $b){
                $getpic = null;
                $bid = $b->id;
                $getpic = \App\breederPictures::where([['isMain','=',$bid],['isMain','=','1']])->first();
                if(!empty($getpic)){
                  $picture[$bid] = $getpic->filename;
                }
              }
              if($hasbreeders){
                return view('search-results',['hasresults' => '1','breed' => $breeddetails,'breeders' => $breeders,'pictures' => $picture]);
              }else{
                return view('search-results',['hasresults' => '0','breed' => $breeddetails]);
              }
            }
          }else{
            return redirect()->route('listingremoved');
          }
    }

    public function FindBreeders(Request $request){
      if(!empty($request->zip)){
          $fixedzip = fixedzip($request->zip);
          $request->replace(array('zip' => $fixedzip,'breed' => $request->breed));
          $this->validate($request, [
              'zip' => 'exists:zip_code,zip_code',
              'breed' => 'required|numeric',
          ]);
          $byloc = true;
      }else{
          $this->validate($request, [
              'breed' => 'required|numeric',
          ]);
          $byloc = false;
      }
          $breeddetails = \App\Breed::where('id', $request->breed)->first();

          if(count($breeddetails)){
            if($byloc){
              $loc = DB::table('zip_code')->where('zip_code',$request->zip)->first();
              $lat = $loc->lat;
              $lon = $loc->lon;
              $breeders = DB::select("SELECT breeders.*,zip_code.lat,zip_code.lon,zip_code.zip_code,zip_code.city,zip_code.state_prefix,zip_code.country,2 * ASIN(SQRT(POWER(SIN(RADIANS(zip_code.lat) - RADIANS($lat)) / 2, 2) + (COS(RADIANS(zip_code.lat)) * COS(RADIANS($lat)) * POWER(SIN((RADIANS(zip_code.lon) - RADIANS($lon)) / 2), 2)))) AS distance FROM `breeders` INNER JOIN `zip_code` ON breeders.zipcode = zip_code.zip_code WHERE breeders.breedId = '".$request->breed."' ORDER BY distance LIMIT 30");
            }else{
              $breeders = \App\Breeder::where('breedId',$breeddetails->id)->get();
            }
            if(count($breeders)){
                  //check for pictures
                  $hasbreeders = true;
                  $picture = null;
                  foreach($breeders as $b){
                      $getpic = null;
                      $bid = $b->id;
                      $getpic = \App\breederPictures::where([['isMain','=',$bid],['isMain','=','1']])->first();
                      if(count($getpic)){
                        $picture[$bid] = $getpic->filename;
                      }else{
                        $picture[$bid] = 'no-picture';
                      }
                  }
            }else{
              $hasbreeders = false;
            }
            if($hasbreeders){
                return view('search-results',['hasresults' => '1','breed' => $breeddetails,'breeders' => $breeders,'pictures' => $picture]);
              }else{
                return view('search-results',['hasresults' => '0','breed' => $breeddetails]);
              }
          }else{
            return redirect()->route('listingremoved');
          }
    }

}
