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
        
        return view("projects.showProject", compact('project'));
    }
}
