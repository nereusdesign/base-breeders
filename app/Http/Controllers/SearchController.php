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
    $catarr = DB::table('breeds')->select('breedType','breedName','id','url')->where('breedType','=','cat')->orderBy('breedName','asc')->get();
    foreach ($catarr as $value) {
      $breeds[$value->id] = $value->breedName;
      $links[$value->id] = $value->url;
    }
    return view('find-cat-breeders', ['breeds' => $breeds,'links' => $links]);
  }

  public function finddogbreeder(){
    $catarr = DB::table('breeds')->select('breedType','breedName','id','url')->where('breedType','=','dog')->orderBy('breedName','asc')->get();
    foreach ($catarr as $value) {
      $breeds[$value->id] = $value->breedName;
      $links[$value->id] = $value->url;
    }
    return view('find-dog-breeders', ['breeds' => $breeds,'links' => $links]);

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
          $urlclean = str_replace('-breeders','',$url);
          $breeddetails = \App\Breed::where('url', $urlclean)->first();
          if($breeddetails){
            $breeders = \App\Breeder::where('breedId',$breeddetails->id)->select('breeders.*','zip_code.*','breeds.id as bid','breeds.url as burl','breeds.breedName')->join('zip_code', 'breeders.zipcode', '=', 'zip_code.zip_code')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->get();
              $picture = null;
              foreach($breeders as $b){
                $getpic = null;
                $bid = $b->id;
                $getpic = \App\breederPictures::where([['breeder_id','=',$bid],['isMain','=','1']])->first();
                if($getpic){
                  $picture[$bid] = 'storage/'.$getpic->filename;
                }else{
                  $picture[$bid] = 'storage/photos/default.jpg';
                }
              }
                return view('search-results',['hasresults' => '1','info' => $breeddetails,'breeders' => $breeders,'pictures' => $picture]);
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

          if($breeddetails){
            if($byloc){
              $loc = DB::table('zip_code')->where('zip_code',$request->zip)->first();
              $lat = $loc->lat;
              $lon = $loc->lon;
              $breeders = DB::select("SELECT breeders.*,zip_code.lat,zip_code.lon,zip_code.zip_code,zip_code.city,zip_code.state_prefix,zip_code.country,2 * ASIN(SQRT(POWER(SIN(RADIANS(zip_code.lat) - RADIANS($lat)) / 2, 2) + (COS(RADIANS(zip_code.lat)) * COS(RADIANS($lat)) * POWER(SIN((RADIANS(zip_code.lon) - RADIANS($lon)) / 2), 2)))) AS distance FROM `breeders` INNER JOIN `zip_code` ON breeders.zipcode = zip_code.zip_code WHERE breeders.breedId = '".$request->breed."' ORDER BY distance LIMIT 30");
            }else{
              $breeders = \App\Breeder::where('breedId',$breeddetails->id)->select('breeders.*','zip_code.*','breeds.id as bid','breeds.url as burl','breeds.breedName')->join('zip_code', 'breeders.zipcode', '=', 'zip_code.zip_code')->join('breeds', 'breeders.breedId', '=', 'breeds.id')->inRandomOrder()->get();
            }


            $picture = null;
            foreach($breeders as $b){
              $getpic = null;
              $bid = $b->id;
              $getpic = \App\breederPictures::where([['breeder_id','=',$bid],['isMain','=','1']])->first();
              if($getpic){
                $picture[$bid] = 'storage/'.$getpic->filename;
              }else{
                $picture[$bid] = 'storage/photos/default.jpg';
              }
            }
            return view('search-results',['hasresults' => '1','info' => $breeddetails,'breeders' => $breeders,'pictures' => $picture]);




          }else{
            return redirect()->route('listingremoved');
          }
    }

}
