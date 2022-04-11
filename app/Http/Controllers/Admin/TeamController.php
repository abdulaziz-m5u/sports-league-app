<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\TeamRequest;

class TeamController extends Controller
{
   
    public function index(): View
    {
        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    public function create(): View
    {
        return view('admin.teams.create');
    }

    public function store(TeamRequest $request): RedirectResponse
    {
        Team::create($request->validated());

        return redirect()->route('admin.teams.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Team $team): View
    {
        $games = Game::where('team1_id' , $team->id)->orWhere('team2_id', $team->id)->get();

        return view('admin.teams.show', compact('team', 'games'));
    }

    public function edit(Team $team): View
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(TeamRequest $request, Team $team): RedirectResponse
    {
        $team->update($request->validated());

        return redirect()->route('admin.teams.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Team $team): RedirectResponse
    {
        $team->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Team::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
