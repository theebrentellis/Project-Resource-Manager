<?php

namespace App;

use App\User;
use App\UserRole;
use App\TimeCard;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'label'];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function timeCard()
    {
        return $this->belongsTo('App\TimeCard');
    }
    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
