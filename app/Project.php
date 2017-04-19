<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'totalHours', 'dueDate', 'project_time_card_id'
    ];
    // public function users()
    // {
    //     return $this->belongsToMany('App\User', 'user_project')->withTimestamps();
    // }
    public function timeCards()
    {
        return $this->hasMany('App\ProjectTimeCard');
    }
}
