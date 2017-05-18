<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
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
    
    public function index(){

        $projects = Project::all();

        return view("projects/project", compact("projects"));
    }

    public function addNewDeveloper(Request $request){

        $input = $request->all();

        $projectId = $request->project;

        $devId = $request->addProjectDeveloper;

        $project = Project::find($projectId);

        $project->users()->attach($devId);

        return view('projects.showProject', compact(['project']));
    }    
}
