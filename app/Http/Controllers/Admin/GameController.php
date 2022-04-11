<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\GameRequest;

class GameController extends Controller
{
   
    public function index(): View
    {
        $games = Game::all();

        return view('admin.games.index', compact('games'));
    }

    public function create(): View
    {
        $teams = Team::all()->pluck('name', 'id');

        return view('admin.games.create', compact('teams'));
    }

    public function store(GameRequest $request): RedirectResponse
    {
        Game::create($request->validated());

        return redirect()->route('admin.games.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Game $game): View
    {
        return view('admin.games.show', compact('game'));
    }

    public function edit(Game $game): View
    {
        $teams = Team::all()->pluck('name', 'id');

        return view('admin.games.edit', compact('game', 'teams'));
    }

    public function update(GameRequest $request, Game $game): RedirectResponse
    {
        $game->update($request->validated());

        return redirect()->route('admin.games.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Game::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
