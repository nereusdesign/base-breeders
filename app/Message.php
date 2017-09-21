<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['msg_from', 'msg_from_email','msg_to','msg','msg_creation_date','sent'];
}
