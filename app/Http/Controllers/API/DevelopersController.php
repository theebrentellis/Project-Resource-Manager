<?php

namespace App\Http\Controllers\API;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevelopersController extends Controller
{
    public function index()
    {
        $allDevelopers = User::all();

        $developers = array();

        foreach($allDevelopers as $key => $value){
            $d = array();

            $d['id'] = $allDevelopers[$key]->id;
            $d['name'] = $allDevelopers[$key]->name;

            array_push($developers, $d);
        }

        return $developers;
    }
}
