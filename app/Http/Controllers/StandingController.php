<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StandingController extends Controller
{
    public function index(){
        $teams = Team::all()->sortByDesc('points');

        return view('standings', compact('teams'));
    }
}
