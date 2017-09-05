<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class EditorController extends Controller
{
      public function index()
      {
        return redirect()->route('editor.view');
      }

      public function view()
      {
        return view('dog-and-cat-news');
      }

      public function add(){
        $dogarr = \App\Breed::where('breedType','dog')->orderBy('breedName')->pluck('breedName','id');
        $catarr = \App\Breed::where('breedType','cat')->orderBy('breedName')->pluck('breedName','id');
        return view('editor.add',['dogarr' => $dogarr,'catarr' => $catarr]);
      }

      public function processAdd(Request $request){
            if($request->breed == '0'){
                $this->validate($request, [
                    'title' => 'required',
                    'about' => 'required',
                ]);
            }else{
              $this->validate($request, [
                  'title' => 'required',
                  'about' => 'required',
                  'breed' => 'required|exists:breeds,id'
              ]);
            }

            $livedate = date('Y-m-d H:i:s');
            if(count($request->subtext)){
              $subtext = $request->subtext;
            }else{
              $subtext = "";
            }

            $post = \App\Post::create([
              'headline' => $request->title,
              'subtext' => $subtext,
              'body' => $request->about,
              'isLive' => '0',
              'liveDate' => $livedate,
              'breedId' => $request->breed,
            ]);
            $urlbase = make_base_url(substr($request->title,0,50)." ".$post->id);
            DB::table('posts')->where('id',$post->id)->update(['urlBase' => $urlbase]);
            return view('view-article',['post' => $post]);
      }
}
