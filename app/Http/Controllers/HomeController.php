<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with(array("timeCards" => function($query){
            $query->addSelect(array('project_id', 'totalTime'));
        }))->get();

        $developers = User::all();

        return view('home', compact(['projects', 'developers']));
    }
}
