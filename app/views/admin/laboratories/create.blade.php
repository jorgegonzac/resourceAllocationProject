@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}

<style type="text/css">
.form{height: 370px;}
</style>

<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2> Crear Nuevo Laboratorio</h2>
	</div>

	<div class="sep"></div>

	{{ Form::open(array('route' => 'laboratories.store')) }}

	<div class="container-form">
		<div class="inputs">
			<div class="form-group">
				{{ Form::label('name', 'Nombre:&nbsp;') }}
				{{ Form::text('name') }}
				<div class="errors">
					{{ $errors->first('name', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('building', 'Edificio:&nbsp;') }}
				{{ Form::text('building') }}
				<div class="errors">
					{{ $errors->first('building', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group" class="text-center">		
				&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="user" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
				    <option selected disabled>Selecciona un Encargado</option>
				    @foreach($users as $user)
				    <option  value="{{ $user->id }}">{{ $user->first_name." ".$user->first_last_name }}</option>
				    @endforeach
				</select>
				<div class="errors">
					{{ $errors->first('user', '<span class="error">:message</span>') }}
				</div>
			</div>

			
			
		</div>
		


		<div class="text-center">
		    {{ Form::button('Crear',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		
		{{ Form::close() }}

			<form action="{{ URL::to('laboratories') }}">
		        <button class="btn btn-danger">Cancelar</button>
			</form>
		</div>

	</div>
</div>
@stop