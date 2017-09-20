<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listingPictures extends Model
{
  protected $fillable = ['listing_id', 'filename','isMain'];
  public function listing()
  {
      return $this->belongsTo('App\Listing');
  }
}
