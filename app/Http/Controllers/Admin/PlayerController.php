<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\PlayerRequest;
use App\Models\Team;

class PlayerController extends Controller
{
   
    public function index(): View
    {
        $players = Player::all();

        return view('admin.players.index', compact('players'));
    }

    public function create(): View
    {
        $teams = Team::all()->pluck('name','id');

        return view('admin.players.create', compact('teams'));
    }

    public function store(PlayerRequest $request): RedirectResponse
    {
        Player::create($request->validated());

        return redirect()->route('admin.players.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Player $player): View
    {
        return view('admin.players.show', compact('player'));
    }

    public function edit(Player $player): View
    {
        $teams = Team::all()->pluck('name','id');

        return view('admin.players.edit', compact('player', 'teams'));
    }

    public function update(PlayerRequest $request, Player $player): RedirectResponse
    {
        $player->update($request->validated());

        return redirect()->route('admin.players.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Player $player): RedirectResponse
    {
        $player->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Player::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
