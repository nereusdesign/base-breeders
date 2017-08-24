<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
      return view('view-breeds');
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

}
