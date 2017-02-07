<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditProjectController extends Controller
{
    public function editProject($id)
    {
        $project = Project::find($id);

        return view('projects.editProject', compact('project'));
    }

    public function addDeveloper($id)
    {
        $project = Project::find($id);

        $developers = User::all();

        return view('projects.addProjectDeveloper', compact(['project', 'developers']));
    }
}
