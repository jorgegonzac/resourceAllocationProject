@extends('layouts.adminlayout')
@section('content')

{{ HTML::style('css/style_form.css')}}

<style type="text/css">
.form{height: 300px;}

.asignar-escondido{display: none !important;}
</style>

<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2>Nuevo Calendario</h2>
	</div>

	<div class="sep"></div>

	<div class="container-form">
	{{ Form::open(array('route' => 'timetables.store')) }}

		<div class="inputs">
			<div class="form-group">
				{{ Form::label('name', '&nbsp;Nombre:&nbsp;&nbsp;') }}
				{{ Form::text('name') }}
				{{ Form::text('asignar', '...', array('class' => 'asignar-escondido')) }}
				{{ $errors->first('name', '<div class="errors">:message</div>') }}
			</div>
			
		</div>		

		<div class="text-center">
			{{ Form::button('Crear Calendario',array('type' => 'submit', 'class' => 'btn btn-success', 'name' => 'crear_calendario')) }}
			{{ Form::close() }}
			<form action="{{ URL::to('timetables') }}">
		        	<button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>
	</div>
</div>

@stop