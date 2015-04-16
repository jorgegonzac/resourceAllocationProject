@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Crear Nuevo Laboratorio</h2>

	{{ Form::open(array('route' => 'laboratories.store')) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre:') }}
			{{ Form::text('name') }}
			{{ $errors->first('name', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('building', 'Edificio:') }}
			{{ Form::text('building') }}
			{{ $errors->first('building', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('user', 'Encargado:') }}
			<select name="user">
			    <option selected disabled>Selecciona un Encargado</option>
			    @foreach($users as $user)
			    <option value="{{ $user->id }}">{{ $user->first_name." ".$user->first_last_name }}</option>
			    @endforeach
			</select>
			<br>
			{{ $errors->first('user', '<span class="error">:message</span>') }}
		</div>


		<div class="text-center">
		    {{ Form::button('Crear',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		</div>
	{{ Form::close() }}


		<form action="{{ URL::to('laboratories') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>
@stop