<?php

namespace App\Http\Controllers\API;

use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function projectDueDates()
    {
        $allProjects = Project::all();

        $events = array();
        
        foreach($allProjects as $key => $value){
            $e = array();

            $e['title'] = $allProjects[$key]->name;
            $e['start'] = $allProjects[$key]->dueDate;

            array_push($events, $e);
        }

        return $events;
    }

    public function developerSchedules()
    {
        $projectDueDates = Project::all();

        $developerSchedule = array();

        return $developerSchedule;
    }
}
