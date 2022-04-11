@extends('layouts.client')

@section('content')
<div class="row mt-5 justify-content-center">
    <div class="col-8 mb-4">
        <div class="card">
            <h5 class="card-header">
              List of players
            </h5>
            <ul class="list-group list-group-flush">
                @foreach($players as $player)
                  <li class="list-group-item">{{ $player->name }} <span class="float-end badge bg-info">{{ $player->team->name }}</span></li>   
                @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection