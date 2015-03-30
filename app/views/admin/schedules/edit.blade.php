@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Editar Horario</h2>

	{{ Form::open(array('route' => 'schedules.store')) }}

			<div class="form-group">
				{{ Form::label('name', 'Nombre:') }}
				{{ Form::text('name') }}
				{{ $errors->first('name', '<span class="error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Descripción:') }}
				{{ Form::text('description') }}
			</div>

			<div class="text-center">
			    {{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}
			</div>
			
	{{ Form::close() }}

		<form action="{{ URL::to('schedules') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>
</div>
@stop