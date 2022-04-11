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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('edit games')}}</h1>
                    <a href="{{ route('admin.games.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.games.update', $game->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="team">{{ __('Team') }}</label>
                        <select name="team1_id" id="team" class="form-control" required>
                            @foreach($teams as $id => $team)
                                <option value="{{ $id }}" {{ (in_array($id, old('team', [])) || isset($game) && $game->team1->id == $id) ? 'selected' : '' }}>{{ $team }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="team">{{ __('Team') }}</label>
                        <select name="team2_id" id="team" class="form-control" required>
                            @foreach($teams as $id => $team)
                                <option value="{{ $id }}" {{ (in_array($id, old('team', [])) || isset($game) && $game->team2->id == $id) ? 'selected' : '' }}>{{ $team }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_time">{{ __('start_time') }}</label>
                        <input type="text" class="form-control datetime" id="start_time" placeholder="{{ __('start_time') }}" name="start_time" value="{{ old('start_time', $game->start_time) }}" />
                    </div>
                    <div class="form-group">
                        <label for="result1">{{ __('result1') }}</label>
                        <input type="number" class="form-control" id="result1" placeholder="{{ __('result1') }}" name="result1" value="{{ old('result1', $game->result1) }}" />
                    </div>
                    <div class="form-group">
                        <label for="result2">{{ __('result2') }}</label>
                        <input type="number" class="form-control" id="result2" placeholder="{{ __('result2') }}" name="result2" value="{{ old('result2', $game->result2) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection


@push('script-alt')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    
    <script>
        $(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')
  window._stripe_key = $('meta[name="stripe-key"]').attr('content')

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })

  $('.date').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    },
    stepping: 10
  })

  $('.timepicker').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    },
    stepping: 10
  })

})
    </script>
@endpush