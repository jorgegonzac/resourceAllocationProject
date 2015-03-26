@extends('layouts.layout')
@section('content')

<h2> USERS CREATE</h2>

{{ Form::open(array('route' => 'users.store')) }}
	<div>
		{{ Form::label('first_name', 'First name:') }}
		{{ Form::text('first_name') }}
	</div>

	<div>
		{{ Form::label('last_name', 'Last name:') }}
		{{ Form::text('last_name') }}
	</div>

	<div>
		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email') }}
	</div>

	<div>
		{{ Form::label('school_id', 'School id:') }}
		{{ Form::text('school_id') }}
	</div>

	<div>
		{{ Form::label('career_id', 'Career id:') }}
		{{ Form::text('career_id') }}
	</div>

	<div>
		{{ Form::submit() }}
	</div>
{{ Form::close() }}



@stop