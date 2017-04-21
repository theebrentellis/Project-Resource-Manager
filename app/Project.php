<?php

namespace App;

use App\TimeCard;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'totalHours', 'dueDate'
    ];
    
    public function timeCards()
    {
        return $this->hasMany('App\TimeCard');
    }

    public function getProjectAssignedTime()
    {
        $total = 0;

        foreach($this->timeCards as $time_card) {
            $total += $time_card->time;
        }

        return $total;
    }
}
