<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use Auth;

class BreedsController extends Controller
{
    public function index()
    {
      return redirect()->route('breeds.view');
    }

    public function view()
    {
      //get all the breeds so view breeds can list it
      $dogarr = \App\Breed::where('breedType','dog')->select('breedName','id')->orderBy('breedName')->get();
      $catarr = \App\Breed::where('breedType','cat')->select('breedName','id')->orderBy('breedName')->get();
      return view('view-breeds',['dogs' => $dogarr,'cats' => $catarr]);
    }

    public function viewDogs()
    {
      //get all the breeds so view breeds can list it
      $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->get();
      return view('view-breeds',['dogs' => $dogarr]);
    }

    public function viewCats()
    {
      //get all the breeds so view breeds can list it
      $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->get();
      return view('view-breeds',['cats' => $catarr]);
    }

    public function listing($url)
    {
      //get all the breeds so view breeds can list it
      $info = \App\Breed::where('url',$url)->first();
      if($info->breedType == 'dog'){
        $vis[] = "apartment";
        $vis[] = "cat";
        $vis[] = "exercise";
        $vis[] = "training";
        $vis[] = "height";
        $vis[] = "pureMixed";
      }elseif ($info->breedType == 'cat') {
        $vis[] = "affectionate";
        $vis[] = "playfulness";
        $vis[] = "lapCat";
      }

        if(isset($info)){
          return view('breed-info',['info' => $info,'vis' => $vis]);
        }else{
          //flash an error message to session_destroy
          return redirect()->route('breeds.view');
        }
    }

    public function edit()
    {
      if(Auth::user()){
          if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              return view('breeds.edit');
          }else{
              return redirect()->route('breeds.view');
          }
      }else{
        return redirect()->route('breeds.view');
      }
    }

    public function add()
    {
      if(Auth::user()){
          if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              return view('breeds.add');
          }else{
              return redirect()->route('breeds.view');
          }
      }else{
        return redirect()->route('breeds.view');
      }
    }

    public function delete()
    {
      if(Auth::user()){
          if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              return view('breeds.delete');
          }else{
              return redirect()->route('breeds.view');
          }
      }else{
        return redirect()->route('breeds.view');
      }
    }

    public function processAdd(Request $request){
        if(Auth::user()){
            if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
              if(!isset($request->dogOrCat)){
                return redirect()->route('breeds.view');
              }
              switch($request->dogOrCat){
                case "dog":
                        $this->validate($request, [
                          'breed' => 'required',
                          'size' => 'required',
                          'minheight' => 'required|numeric',
                          'maxheight' => 'required|numeric',
                          'minweight' => 'required|numeric',
                          'maxweight' => 'required|numeric',
                          'minlife' => 'required|numeric',
                          'maxlife' => 'required|numeric',
                          'colors' => 'required',
                          'origin' => 'required',
                          'classification' => 'required|in:Cross Breed,Purebred',
                          'temperament' => 'required',
                          'photos' => 'required|mimes:jpeg,bmp,png|max:8000',
                          'overview' => 'required',
                          'aptStars' => 'required|numeric|digits_between:1,5',
                          'childStars' => 'required|numeric|digits_between:1,5',
                          'dogsStars' => 'required|numeric|digits_between:1,5',
                          'catsStars' => 'required|numeric|digits_between:1,5',
                          'exerciseStars' => 'required|numeric|digits_between:1,5',
                          'trainabilityStars' => 'required|numeric|digits_between:1,5',
                          'groomingStars' => 'required|numeric|digits_between:1,5',
                          'sheddingStars' => 'required|numeric|digits_between:1,5',
                          'vocalizationStars' => 'required|numeric|digits_between:1,5',
                        ]);
                        break;
                        case "cat":
                        $this->validate($request, [
                          'breed' => 'required',
                          'size' => 'required',
                          'minheight' => 'required|numeric',
                          'maxheight' => 'required|numeric',
                          'minweight' => 'required|numeric',
                          'maxweight' => 'required|numeric',
                          'minlife' => 'required|numeric',
                          'maxlife' => 'required|numeric',
                          'colors' => 'required',
                          'origin' => 'required',
                          'lapcat' => 'required|in:Yes,No',
                          'temperament' => 'required',
                          'photos' => 'required|mimes:jpeg,bmp,png|max:8000',
                          'childStars' => 'required|numeric|digits_between:1,5',
                          'dogsStars' => 'required|numeric|digits_between:1,5',
                          'groomingStars' => 'required|numeric|digits_between:1,5',
                          'sheddingStars' => 'required|numeric|digits_between:1,5',
                          'vocalizationStars' => 'required|numeric|digits_between:1,5',
                          'affectionateStars' => 'required|numeric|digits_between:1,5',
                          'playfulnessStars' => 'required|numeric|digits_between:1,5',
                        ]);
                        break;
                        default:
                          return redirect()->route('breeds.view');
                }
                $breed = \App\Breed::create([
                  'breedType' => $request->dogOrCat,
                  'pureMixed' => $request->classification,
                  'originLocation' => $request->origin,
                  'breedName' => $request->breed,
                  'otherNames' => $request->nicknames,
                  'size' => $request->size,
                  'temperamentList' => $request->temperament,
                  'colorsList' => $request->colors,
                  'stars_child' => $request->childStars,
                  'child' => $request->child,
                  'stars_dog' => $request->dogsStars,
                  'dog' => $request->dogs,
                  'stars_grooming' => $request->groomingStars,
                  'grooming' => $request->grooming,
                  'stars_shedding' => $request->sheddingStars,
                  'shedding' => $request->shedding,
                  'stars_vocalize' => $request->vocalizationStars,
                  'vocalize' => $request->vocalization,
                  'overview' => $request->overview,
                  'stars_apartment' => $request->aptStars,
                  'apartment' => $request->apt,
                  'stars_cat' => $request->catsStars,
                  'cat' => $request->cats,
                  'stars_exercise' => $request->exerciseStars,
                  'exercise' => $request->exercise,
                  'stars_training' => $request->trainabilityStars,
                  'training' => $request->trainability,
                  'stars_affectionate' => $request->affectionateStars,
                  'affectionate' => $request->affectionate,
                  'stars_playfulness' => $request->playfulnessStars,
                  'playfulness' => $request->playfulness,
                  'lapCat' => $request->lapcat,
                  'ready' => '0',
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'lifeSpan' => ' unknown',
                  'height' => 'unknown',
                  'weight' => 'unknown',
                  'picture' => 'default.png',
                  'url' => time()
                ]);

                  $breed->lifeSpan = $breed->lifespan($request->minlife,$request->maxlife);
                  $breed->height = $breed->height($request->minheight,$request->maxheight);
                  $breed->weight = $breed->weight($request->minweight,$request->maxweight);
                  $breed->url = make_base_url($breed->breedName.' '.$breed->id);
                  $breed->save();
                  return redirect()->route('breeds.view');

            }else{
                return redirect()->route('breeds.view');
            }
        }else{
          return redirect()->route('breeds.view');
        }
    }

}
