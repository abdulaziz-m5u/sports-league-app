<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index(){
        $games = Game::whereNull('result1')->get();
        $results = Game::whereNotNull('result1')->get();

        return view('games', compact('games', 'results'));
    }
}
