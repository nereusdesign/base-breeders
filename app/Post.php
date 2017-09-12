<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['headline', 'subtext', 'body','isLive','liveDate','urlBase'];

    public function timeAgo(){
      return time_elapsed_string($this->liveDate);
    }

    public function headline(){
      return  neat_trim($this->headline,'35','...');
    }

    public function summary(){
      return  neat_trim(html_entity_decode(strip_tags($this->body)),'250','...');
    }

    public function cleanDesc(){
      return neat_trim($this->summary(),150);
    }
}
