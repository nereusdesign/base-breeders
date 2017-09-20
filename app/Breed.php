<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['breedType','pureMixed','originLocation','breedName','otherNames','picture','size','lifeSpan', 'temperamentList', 'height', 'weight', 'colorsList', 'stars_child', 'child', 'stars_dog', 'dog', 'stars_grooming','grooming', 'stars_shedding', 'shedding', 'stars_vocalize', 'vocalize', 'overview', 'stars_apartment', 'apartment', 'stars_cat', 'cat', 'stars_exercise', 'exercise', 'stars_training', 'training', 'stars_affectionate', 'affectionate', 'stars_playfulness', 	'playfulness', 'lapCat', 'ready', 'url', 'created_at', 'updated_at'];

    public function lifespan($min, $max){
      return $min."-".$max;
    }
    public function height($min, $max){
      return $min."-".$max;
    }
    public function weight($min, $max){
      return $min."-".$max;
    }
}
