<?php

namespace App\Http\Controllers\API;

use App\User;
use App\TimeCard;
use App\Project;
use App\UserRole;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
        $users = User::with('userRoles.role')->get();

        return $users;
    }

    public function show(Request $request)
    {
        
    }
}
