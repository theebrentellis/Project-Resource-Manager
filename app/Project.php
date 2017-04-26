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

    public function getProjectAssignedTime()
    {
        $total = 0;

        foreach($this->timeCards as $time_card) {
            $total += $time_card->time;
        }

        return $total;
    }
}
