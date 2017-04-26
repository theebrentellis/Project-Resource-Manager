<?php

namespace App\Http\Controllers;

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
        $projects = Project::with(array("timeCards" => function($query){
            $query->addSelect(array('project_id', 'time'));
        }))->get();

        $time_cards = TimeCard::all();

        $developers = User::with(array("timeCards" => function($query){
            $query->addSelect(array('user_id', 'time', 'project_id'));
        }))->get();

        return view('home', compact(['projects', 'developers', 'time_cards']));
    }
}
