<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTimeCard extends Model
{
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_time_card_id');
    }
    public function developerTimeCard()
    {
        return $this->hasMany("App\DeveloperTimeCard", "");
    }
}
