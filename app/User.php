<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','randomKey','payKey'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function displayAccountStatus(){
      switch ($this->accountActive) {
        case '1':
          $status = "<span class='has-text-success has-text-weight-bold'>(Active)</span>";
          break;
        default:
          $status = "<span class='has-text-warning has-text-weight-bold'>(Pending)</span>";
          break;
      }
      return $status;
    }


}
