<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProjectController extends Controller
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
    
    public function showProject($id){

        // $project = Project::find($id)->with('users')->first();

        $project = Project::find($id);
        
        return view("projects.showProject", compact('project'));
    }
}
