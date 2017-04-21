<?php

namespace App\Http\Controllers\API;

use App\TimeCard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeCardController extends Controller
{
    public function store(Request $request)
    {
        $timeCard = new TimeCard;

        $timeCard->project_id = $request->project_id;
        $timeCard->user_id = $request->developer_id;
        $timeCard->date = $request->date;
        $timeCard->time = $request->hours;
        $timeCard->notes = $request->notes;

        $timeCard->save();

        return redirect('home');
    }
}
