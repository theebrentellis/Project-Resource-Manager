<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditProjectController extends Controller
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
    
    public function showProject($id)
    {
        $project = Project::find($id);

        return view('projects.editProject', compact('project'));
    }

    public function editProject(Request $request)
    {
        $project = Project::find($request->editProjectId);
        
        $project->description = $request->editProjectDescription;
        $project->dueDate = $request->editProjectDueDate;
        $project->totalHours = $request->editProjectBuildHours;

        $project->save();

        return redirect('home');
    }

    public function addDeveloper($id)
    {
        $project = Project::find($id);

        $developers = User::all();

        return view('projects.addProjectDeveloper', compact(['project', 'developers']));
    }
}
