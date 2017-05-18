<?php

namespace App\Http\Controllers;

use DB;

use App\User;
use App\Project;
use App\TimeCard;

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
        $projects = Project::with('timeCards')->get();

        return view('home', compact(['projects']));
    }
}
