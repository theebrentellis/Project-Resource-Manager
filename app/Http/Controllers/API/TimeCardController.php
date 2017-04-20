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
        $timeCard->developer_id = $request->dev_id;
        $timeCard->date = $request->date;
        $timeCard->totalTime = $request->hours;
        $timeCard->notes = $request->notes;

        $timeCard->save();

        return redirect('home');
    }
}
