<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = ['listingName', 'userId','breedId','zipcode','about','randomKey','DOB','numberAvailable'];

}
