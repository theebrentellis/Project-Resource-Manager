<?php

namespace App;

use App\TimeCard;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';
    
    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'totalHours', 'dueDate', 'client_id'
    ];
    
    public function timeCards()
    {
        return $this->hasMany('App\TimeCard');
    }

    public function aTime()
    {
        $time = 0;

        foreach($this->timeCards as $time_card) {
            if(!$time_card->completed){
                $time += $time_card->time;
            }
        }

        return $time;
    }

    public function cTime() 
    {
        $time = 0;
        
        foreach($this->timeCards as $time_card){
            if($time_card->completed){
                $time += $time_card->time;
            }
        }

        return $time;
    }

    public function percentTime()
    {
        $time = 0;

        return round($this->cTime()/$this->totalHours*100);
    }
}
