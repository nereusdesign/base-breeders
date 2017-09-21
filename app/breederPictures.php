<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class breederPictures extends Model
{
    protected $table = 'breeder_pictures';
    protected $fillable = ['breeder_id', 'filename','isMain'];
    public function breeder()
    {
        return $this->belongsTo('App\Breeder');
    }
}
