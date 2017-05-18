<?php

namespace App\Http\Controllers\API;

use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
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
        $allProjects = Project::all();

        $projects = array();

        foreach($allProjects as $key => $value){
            $p = array();

            $p['id'] = $allProjects[$key]->id;
            $p["name"] = $allProjects[$key]->name;

            array_push($projects, $p);
        }

        return $projects;
    }
}
