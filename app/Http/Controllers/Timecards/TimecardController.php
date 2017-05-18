<?php

namespace App\Http\Controllers\Timecards;

use App\TimeCard;

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
        $timecards = TimeCard::with('user', 'role')->get();

        return view('timecards.timecards', ['timecards' => $timecards]);
    }

    public function edit(Request $request)
    {
        $timecard = TimeCard::findOrFail($request->id);

        if($request->completed){
            $timecard->completed = $request->completed;
            $timecard->save();
        }

        return redirect('timecards');
    }
}
