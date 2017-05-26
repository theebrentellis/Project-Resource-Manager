<?php

namespace App\Http\Controllers\Timecards;

use App\TimeCard;
use App\User;
use App\Project;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TimecardController extends Controller
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
        $timecards = TimeCard::all();

        // dd($timecards);

        return view('timecards.timecards', ['timecards' => $timecards]);
    }

    public function edit($id, Request $request)
    {
        $timecard = TimeCard::findOrFail($id);

        if($request->completed){
            $timecard->completed = $request->completed;
            $timecard->save();
        }
        if($request->edit == "edit"){
            $users = User::with('roles')->get();
            $projects = Project::withTrashed()->get();

            dd($projects);
            
            $roles = Role::all();
            return view('timecards.editTimecards', ['timecard' => $timecard, 'users' => $users, 'projects' => $projects, 'roles' => $roles]);
        }
        if($request->edit == "updateTimecard"){

            $timecard->notes = $request->editTimecardNotes;
            $timecard->time = $request->editTimecardTime;
            $timecard->date = $request->editTimecardDate;

            $timecard->save();

            return redirect('home');
        }
        if($request->delete == 'deleteTimecard'){
            $timecard->delete();
            return redirect('home');
        }

        return redirect('timecards');
    }
}
