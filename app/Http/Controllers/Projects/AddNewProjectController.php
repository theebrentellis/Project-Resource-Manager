<?php

namespace App\Http\Controllers\Projects;

use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddNewProjectController extends Controller
{
    public function addNew(Request $request){

        // $this->validate($request, [
        //     "newProjectName" => 'required|unique:projects',
        //     "newProjectDescription" => 'required'
        // ]);
        
        $project = new Project;

        $project->name = $request->newProjectName;
        $project->description = $request->newProjectDescription;
        $project->totalHours = $request->newProjectHours;
        $project->dueDate = $request->newProjectDueDate;

        $project->save();

        return redirect('home');
    }
}
