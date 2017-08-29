<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class breederPictures extends Model
{
    protected $fillable = ['breeder_id', 'filename','isMain'];
    public function breeder()
    {
        return $this->belongsTo('App\Breeder');
    }
}
