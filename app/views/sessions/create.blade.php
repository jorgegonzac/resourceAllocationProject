@extends('layouts.layout')
@section('content')

	<h1>LOGOTIPO TEC</h1>

	{{ Form::open(['route' => 'sessions.store']) }}
					
		<div>

			{{ Form::label('school_id', 'Matricula:') }}
			
			{{ Form::text('school_id', '', array('placeholder' => 'A00123456','maxlength' => 9)) }}

			{{ $errors->first('school_id', '<div class=school_id_error>:message</div>') }}

		</div>

		<div>

			{{ Form::label('password', 'Contraseña:')}}
			
			{{ Form::password('password', array('placeholder' => '************')) }}

			{{ $errors->first('password', '<div class=password_error>:message</div>') }}

		</div>

		<div>
			@if($errors->any)
			{{ $errors->first('failed_login') }}
			@endif
		</div>

		<div>{{ Form::submit('Login')}}</div>

	{{ Form::close() }}

@stop