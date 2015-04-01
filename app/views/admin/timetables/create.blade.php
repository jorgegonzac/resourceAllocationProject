@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2>Crear Nuevo Calendario</h2><br>

	{{ Form::open(array('route' => 'timetables.store')) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre:') }}
			{{ Form::text('name') }}
			{{ $errors->first('name', '<div class="error">:message</div>') }}
		</div>

		<br>
		<div class="text-center">
		    {{ Form::button('Crear Calendario',array('type' => 'submit', 'class' => 'btn btn-success', 'name' => 'crear_calendario')) }}
		</div>

	{{ Form::close() }}


		<form action="{{ URL::to('timetables') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>

@stop