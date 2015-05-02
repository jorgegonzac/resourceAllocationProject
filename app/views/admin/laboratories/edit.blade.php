@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}

<style type="text/css">
.form{height: 370px;}
</style>

<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2> Editar Laboratorio</h2>
	</div>
	
	<div class="sep"></div>

	<div class="container-form">
		{{ Form::model($laboratory, array('method' => 'PATCH', 'route' => array('laboratories.update', $laboratory->id))) }}

		<div class="inputs">
			<div class="form-group">
				{{ Form::label('name', 'Nombre:') }}
				{{ Form::text('name') }}
				<div class="errors">
					{{ $errors->first('name', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('building', 'Edificio:') }}
				{{ Form::text('building') }}
				<div class="errors">
					{{ $errors->first('building', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('user', 'Encargado:') }}
				<select name="user" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" >
				    <option disabled>Selecciona un encargado</option>
				    @foreach($users as $user)
				    	@if ($user->id == $laboratory->user_id)
					    	<option selected value="{{ $user->id }}">{{ $user->first_name." ".$user->first_last_name }}</option>
					    @else				    	
					    	<option value="{{ $user->id }}">{{ $user->first_name." ".$user->first_last_name }}</option>
					    @endif
				    @endforeach
				</select>
				<div class="errors">
					{{ $errors->first('user', '<span class="error">:message</span>') }}
				</div>
			</div>
		</div>

		<div class="text-center">
		    {{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}

			{{ Form::close() }}

			<form action="{{ URL::to('laboratories') }}">
		        	<button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>
	</div>
</div>
@stop