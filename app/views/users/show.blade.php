@extends('layouts.layout')
@section('content')

	<h1>Showing {{ $user->first_name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $user->first_name }}</h2>
        <p>
        	<strong>Last name:</strong> {{ $user->last_name	}}<br>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>School id:</strong> {{ $user->school_id }}<br>
            <strong>Career id:</strong> {{ $user->career_id }}
        </p>
    </div>


@stop