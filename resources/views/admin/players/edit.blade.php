@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('edit players')}}</h1>
                    <a href="{{ route('admin.players.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.players.update', $player->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="surname">{{ __('surname') }}</label>
                        <input type="text" class="form-control" id="surname" placeholder="{{ __('surname') }}" name="surname" value="{{ old('surname', $player->surname) }}" />
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('name') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('name') }}" name="name" value="{{ old('name', $player->name) }}" />
                    </div>
                    <div class="form-group">
                        <label for="birth_date">{{ __('birth_date') }}</label>
                        <input type="date" class="form-control" id="birth_date" placeholder="{{ __('birth_date') }}" name="birth_date" value="{{ old('birth_date', $player->birth_date) }}" />
                    </div>
                    <div class="form-group">
                        <label for="team">{{ __('Team') }}</label>
                        <select name="team_id" id="team" class="form-control" required>
                            @foreach($teams as $id => $team)
                                <option value="{{ $id }}" {{ (in_array($id, old('team', [])) || isset($player) && $player->team->id == $id) ? 'selected' : '' }}>{{ $team }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection