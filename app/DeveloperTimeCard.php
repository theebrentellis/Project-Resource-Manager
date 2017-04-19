<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperTimeCard extends Model
{
    public function projectTimeCards()
    {
        return $this->hasMany('App\ProjectTimeCard');
    }
}
