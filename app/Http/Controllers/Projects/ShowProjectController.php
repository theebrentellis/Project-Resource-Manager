<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProjectController extends Controller
{
    public function showProject($id){

        // $project = Project::find($id)->with('users')->first();

        $project = Project::find($id);

        // dd($project);
        
        return view("projects.showProject", compact('project'));

        // return $project;
    }

    public function editProject(){

        // return view("projects.showProject", compact('project'));
    }

    public function deleteProject()
    {
        // return view(home);
    }
}
