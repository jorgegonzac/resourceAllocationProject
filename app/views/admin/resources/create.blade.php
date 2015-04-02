@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2>Crear Nuevo Recurso</h2>

	{{ Form::open(array('route' => 'resources.store')) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre:') }}
			{{ Form::text('name') }}
			{{ $errors->first('name', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('building', 'Descripción:') }}
			{{ Form::text('building') }}
			{{ $errors->first('building', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('building', 'Imagen:') }}
			{{ Form::text('building') }}
			{{ $errors->first('building', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('building', 'Categoria:') }}
			{{ Form::text('building') }}
			{{ $errors->first('building', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('building', 'Laboratorio:') }}
			{{ Form::text('building') }}
			{{ $errors->first('building', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('building', 'Tags:') }}
			{{ Form::text('building') }}
			{{ $errors->first('building', '<span class="error">:message</span>') }}
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