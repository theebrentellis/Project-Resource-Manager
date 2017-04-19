<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'label'];
}
