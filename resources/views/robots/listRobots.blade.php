@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>My Robots</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('createRobotForm') }}"><button type="button" class="btn btn-primary">Build Robot</button></a>
            <a href="{{ route('importRobotsForm') }}"><button type="button" class="btn btn-primary">Import Robots</button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Weight</th>
                        <th>Speed</th>
                        <th>Power</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($robots as $robot)
                    <tr>
                        <td>{{ $robot->name }}</td>
                        <td>{{ $robot->weight }}</td>
                        <td>{{ $robot->speed }}</td>
                        <td>{{ $robot->power }}</td>
                        <td>
                            <a href="{{ route('updateRobotForm', ['robot' => $robot->id]) }}">
                                <button type="button" class="btn btn-primary">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('deleteRobot', ['robot' => $robot->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
