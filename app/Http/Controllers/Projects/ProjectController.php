<?php

namespace App\Http\Controllers\Projects;

use App\Project;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
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
