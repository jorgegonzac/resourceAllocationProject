@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Editar Laboratorio</h2>

	{{ Form::model($laboratory, array('method' => 'PATCH', 'route' => array('laboratories.update', $laboratory->id))) }}

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

		<div class="text-center">
		    {{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		</div>

	{{ Form::close() }}

		<form action="{{ URL::to('laboratories') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>
@stop