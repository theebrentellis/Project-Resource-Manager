<?php

namespace App\Http\Controllers\Projects;

use App\User;
use App\Project;
use App\TimeCard;

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

    public function editProject($id, Request $request)
    {
        $project = Project::findorFail($id);

        if($request->edit == "editProject"){
            
            $project->description = $request->editProjectDescription;
            $project->dueDate = $request->editProjectDueDate;
            $project->totalHours = $request->editProjectBuildHours;

            $project->save();

            return redirect()->action(
                'Projects\ShowProjectController@showProject', ['id' => $project->id]
            );
        }
        if($request->edit == "deleteProject"){
            
            $project->delete();

            $projectTimecards = TimeCard::where('project_id', '=', $project->id);

            $projectTimecards->delete();

            return redirect('home');
        }
    }
}
