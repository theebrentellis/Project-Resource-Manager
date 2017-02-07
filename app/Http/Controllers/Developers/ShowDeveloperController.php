<?php

namespace App\Http\Controllers\Developers;

use App\User;
use App\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowDeveloperController extends Controller
{
    public function showDev($id)
    {
        $dev = User::find($id);

        $projects = Project::all();

        return view("developers.showDeveloper", compact(["dev", "projects"]));
    }
}
