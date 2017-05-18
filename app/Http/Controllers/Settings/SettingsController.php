<?php

namespace App\Http\Controllers\Settings;

use App\User;
use App\UserRole;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
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
        $user = Auth::user();

        $users = User::with('userRoles.roles')->get();

        return view('settings.settings', ['user' => $user, 'users' => $users]);
    }

    public function update()
    {

    }
}
