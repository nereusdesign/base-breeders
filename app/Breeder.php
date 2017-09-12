<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    protected $fillable = ['breederName','email','breedId','zipcode','randomKey','phone','url','baseUrl','userId','about'];
}
