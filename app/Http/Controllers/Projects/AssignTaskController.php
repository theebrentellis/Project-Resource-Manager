<?php

namespace App\Http\Controllers\Projects;

use App\Project;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignTaskController extends Controller
{
    public function addTask(Request $request)
    {
        echo "<pre>";
        print_r($request);
    }
}
