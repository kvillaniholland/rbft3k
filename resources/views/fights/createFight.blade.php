@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Start Fight</h1>
        </div>
    </div>
    <form method="POST" action="{{ route('createFight') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Your Robot</h3>
                <div class="form-group">
                    <select name="attacker_id" class="form-control">
                        @foreach ($userRobots as $robot)
                        <option value="{{ $robot->id }}">{{ $robot->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Your Opponent</h3>
                <div class="form-group">
                    <select name="defender_id" class="form-control">
                        @foreach ($opponentRobots as $robot)
                        <option value="{{ $robot->id }}">{{ $robot->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-danger">Fight!</button>
        </div>
    </form>
</div>
@endsection
