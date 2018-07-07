@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Recent Fights</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Winner</th>
                            <th>Loser</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recent_fights as $fight)
                        <tr>
                            <td>{{ $fight->getWinner()->name }}</td>
                            <td>{{ $fight->getLoser()->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Top Robots</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Fights</th>
                            <th>Wins</th>
                            <th>Losses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($top_robots as $robot)
                        <tr>
                            <td>{{ $robot->name }}</td>
                            <td>{{ $robot->wins_count + $robot->losses_count }}</td>
                            <td>{{ $robot->wins_count}}</td>
                            <td>{{$robot->losses_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
