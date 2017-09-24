<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ListingUploadRequest extends FormRequest
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



    protected function prepareForValidation() {
        $this['date'] = $this->year."-".$this->month."-".$this->day;
        $this['cleanDate'] = date('M d Y',strtotime($this['date']));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
          'listingName' => 'required',
          'date' => 'date',
          'numAvailable' => 'required|numeric'
        ];
      $photos = count($this->input('photos'));
      foreach(range(0, $photos) as $index) {
          $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:8000';
      }

      return $rules;
    }
}
