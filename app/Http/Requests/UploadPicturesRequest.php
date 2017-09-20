<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UploadPicturesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if(Auth::check()){
        return true;
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
      $pictures = count($this->input('pictures'));
      foreach(range(0, $pictures) as $index) {
          $rules['pictures.' . $index] = 'required|image|mimes:jpeg,bmp,png|max:8000';
      }
      return $rules;
    }
}
