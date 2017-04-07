<?php

namespace App\Http\Controllers\API;

use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DueDatesCalendarController extends Controller
{
    public function index()
    {
        $allProjects = Project::all();

        $events = array();

        foreach($allProjects as $key => $value){
            $e = array();

            $e['title'] = $allProjects[$key]->name;
            $e['start'] = $allProjects[$key]->dueDate;
            $e['description'] = $allProjects[$key]->description;
            $e['dueDate'] = $allProjects[$key]->dueDate;

            array_push($events, $e);
        }

        return $events;
    }
}
