@extends('layouts.client')

@section('content')
        <div class="row mt-5">
            <h3>Latest Games</h3>
            @foreach($games as $game)
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                      Date:  {{ $game->start_time }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $game->team1->name }}</li>
                        <li class="list-group-item">{{ $game->team2->name }}</li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
        
        <div class="row mt-5">
        <h3>Result</h3>
            @foreach($results as $result)
            <div class="col-lg-6 mb-5">
                <div class="card">
                    <div class="card-header">
                      Date:  {{ $result->start_time }}
                      <span class="float-end badge bg-dark">Score</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $result->team1->name }} <span class="float-end badge bg-success">{{ $result->result1 }}</span></li>
                        <li class="list-group-item">{{ $result->team2->name }} <span class="float-end badge bg-danger">{{ $result->result2 }}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach

        </div>
@endsection