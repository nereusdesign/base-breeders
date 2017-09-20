<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['breedType','pureMixed','originLocation','breedName','otherNames','picture','size','lifeSpan', 'temperamentList', 'height', 'weight', 'colorsList', 'stars_child', 'child', 'stars_dog', 'dog', 'stars_grooming','grooming', 'stars_shedding', 'shedding', 'stars_vocalize', 'vocalize', 'overview', 'stars_apartment', 'apartment', 'stars_cat', 'cat', 'stars_exercise', 'exercise', 'stars_training', 'training', 'stars_affectionate', 'affectionate', 'stars_playfulness', 	'playfulness', 'lapCat', 'ready', 'url', 'created_at', 'updated_at'];

    public function lifespan($min, $max){
      return $min."-".$max. "years";
    }
    public function height($min, $max){
      $mincm = convert_to_cm(0,$min);
      $maxcm = convert_to_cm(0,$max);
      return $min."-".$max." inches (".$mincm."-".$maxcm." cm)";
    }
    public function weight($min, $max){
      $minkg = convert_to_kg($min);
      $maxkg = convert_to_kg($max);
      return $min."-".$max." pounds (".$minkg."-".$maxkg." kg)";
    }

              /**
           * Converts a height value given in feet/inches to cm
           *
           * @param int $feet
           * @param int $inches
           * @return int
           */
          public static function convert_to_cm($feet, $inches = 0) {
          	$inches = ($feet * 12) + $inches;
          	return (int) round($inches / 0.393701);
          }

          public static function convert_to_kg($lbs = 0) {
          	return (int) ceil($lbs / 2.20462);
          }

}
