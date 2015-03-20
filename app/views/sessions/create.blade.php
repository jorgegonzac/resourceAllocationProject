@extends('layouts.layout')
@section('content')

	<h1>LOGOTIPO TEC</h1>
	{{ Form::open(array('route' => 'sessions.store')) }}
					
		<div>
			<p>{{ Form::text('id', null, array('placeholder' => 'Matricula')) }}</p>
		</div>
		<div>
			<p>{{ Form::password('password', array('placeholder' => 'Contraseña')) }}</p>
		</div>
			{{ Form::submit('Login')}}

	{{ Form::close() }}

@stop