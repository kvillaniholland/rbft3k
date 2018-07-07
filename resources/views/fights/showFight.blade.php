@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Fight Results</h1>
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3>Winner</h3>
                {{ $winner }} ({{ $winning_user }})
            </div>
            <div class="col-md-4">
                <h3>Loser</h3>
                {{ $loser }} ({{ $losing_user }})
            </div>
        </div>
</div>
@endsection
