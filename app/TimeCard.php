<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Project;
use App\User;

class TimeCard extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'time_cards';

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
    protected $fillable = ['project_id', 'user_id', 'role_id', 'time', 'date', 'completed', 'notes', 'comments'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
