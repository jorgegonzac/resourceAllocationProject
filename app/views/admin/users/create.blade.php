@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Crear Nuevo Usuario</h2>

	{{ Form::open(array('route' => 'users.store')) }}

		<div class="form-group">
			{{ Form::label('first_name', 'Nombre:') }}
			{{ Form::text('first_name') }}
		</div>

		<div class="form-group">
			{{ Form::label('first_last_name', 'Apellido Paterno:') }}
			{{ Form::text('first_last_name') }}
		</div>

		<div class="form-group">
			{{ Form::label('second_last_name', 'Apellido Materno:') }}
			{{ Form::text('second_last_name') }}
		</div>

		<div class="form-group">
			{{ Form::label('email1', 'Correo:') }}
			{{ Form::text('email1') }}
			{{ $errors->first('email1', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('email2', 'Correo alternativo:') }}
			{{ Form::text('email2') }}
			{{ $errors->first('email2', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Contraseña:') }}
			{{ Form::text('password') }}
		</div>

		<div class="form-group">
			{{ Form::label('school_id', 'Matrícula:') }}
			{{ Form::text('school_id') }}
			{{ $errors->first('school_id', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('career', 'Carrera:') }}
			{{ Form::text('career') }}
		</div>

		<div class="text-center">
		    {{ Form::button('Crear',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		</div>
	{{ Form::close() }}


		<form action="{{ URL::to('users') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>
@stop