<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\TimeCard;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRoles()
    {
        return $this->hasMany('App\UserRole', 'user_id');
    }

    public function roles()
    {
        return $this->hasManyThrough('App\Role', 'App\UserRole', 'user_id', 'id');
    }

    public function timeCards()
    {
        return $this->hasMany('App\TimeCard');
    }

    public function getTotalAssignedTime()
    {
        $total = 0;

        foreach($this->timeCards as $time_card){
            $total += $time_card->time;
        }

        return $total;
    }

    public function getProjectAssignedTime()
    {
        $total = 0;

        return $total;
    }
}
