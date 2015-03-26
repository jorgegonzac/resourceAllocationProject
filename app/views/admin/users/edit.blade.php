@extends('layouts.userslayout')
@section('content')

{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
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