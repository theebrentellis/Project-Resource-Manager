<?php

namespace App\Http\Controllers\API;

use App\TimeCard;
use App\User;
use App\Role;
use App\Project;
use App\UserRole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeCardController extends Controller
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
        $time_cards = TimeCard::with('user', 'role', 'project')->get();

        return $time_cards;
    }
    
    public function store(Request $request)
    {
        $timeCard = new TimeCard;

        $timeCard->project_id = $request->project_id;
        $timeCard->user_id = $request->developer_id;
        $timeCard->role_id = $request->role_id;
        $timeCard->date = $request->date;
        $timeCard->time = $request->hours;
        $timeCard->notes = $request->notes;

        $timeCard->save();

        return redirect('home');
    }
}
