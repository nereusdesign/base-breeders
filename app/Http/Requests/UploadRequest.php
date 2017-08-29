<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if(Auth::check()){
          if(Auth::user()->hasRole(['breeder','superadministrator', 'administrator'])){
              return true;
          }else{
              return false;
          }
      }else{
        return false;
      }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      if(Auth::user()->hasRole(['superadministrator', 'administrator'])){
        $rules = [
            'breeder' => 'required',
            'email' => 'required|email',
            'breed' => 'required|numeric|exists:breeds,id',
            'zipcode' => 'required|exists:zip_code,zip_code',
            'phone' => 'numeric|phone',
            'user' => 'required|numeric|exists:users,id'
        ];
      }else{
        $rules = [
            'breeder' => 'required',
            'email' => 'required|email',
            'breed' => 'required|exists:breeds,id',
            'zipcode' => 'required|exists:zip_code,zip_code',
            'phone' => 'numeric|phone'
        ];
      }
      $photos = count($this->input('photos'));
      foreach(range(0, $photos) as $index) {
          $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:8000';
      }

      return $rules;
    }
}
