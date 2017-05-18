<?php

namespace App\Http\Controllers\API;

use App\Role;
use App\User;
use App\TimeCard;
use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roles = Role::all();

        return $roles;
    }
}
