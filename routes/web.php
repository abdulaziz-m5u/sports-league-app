<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('games');
});

Route::get('games', [\App\Http\Controllers\GameController::class, 'index'])->name('games');
Route::get('players', [\App\Http\Controllers\PlayerController::class, 'index'])->name('players');
Route::get('standings', [\App\Http\Controllers\StandingController::class, 'index'])->name('standings');

Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

    // team
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);
    Route::delete('teams_mass_destroy', [\App\Http\Controllers\Admin\TeamController::class, 'massDestroy'])->name('teams.mass_destroy');

    // team
    Route::resource('players', \App\Http\Controllers\Admin\PlayerController::class);
    Route::delete('players_mass_destroy', [\App\Http\Controllers\Admin\PlayerController::class, 'massDestroy'])->name('players.mass_destroy');
    
    // team
    Route::resource('games', \App\Http\Controllers\Admin\GameController::class);
    Route::delete('games_mass_destroy', [\App\Http\Controllers\Admin\GameController::class, 'massDestroy'])->name('games.mass_destroy');
});

Auth::routes(['register' => false]);

