@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Crear Nueva Categoría</h2>

	{{ Form::open(array('route' => 'categories.store')) }}

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
		    {{ Form::button('Crear',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		</div>
	{{ Form::close() }}


		<form action="{{ URL::to('categories') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>
@stop