<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    protected $fillable = ['breederName','email','breedId','zip_code','randomKey','phone','url','baseUrl'];
}
