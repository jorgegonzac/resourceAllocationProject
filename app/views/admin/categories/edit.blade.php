@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Editar Categoría</h2>

	{{ Form::model($category, array('method' => 'PATCH', 'route' => array('categories.update', $category->id))) }}

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

		<form action="{{ URL::to('categories') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>
@stop