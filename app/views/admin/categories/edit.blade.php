@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}

<style type="text/css">
.form{height: 300px;}
</style>

<div class="form" style="width:800px; margin:0 auto;">
	
	<div class="text-center">
		<h2> Editar Categoría</h2>
	</div>

	<div class="sep"></div>

	<div class="container-form">
		<div class="inputs">

			{{ Form::model($category, array('method' => 'PATCH', 'route' => array('categories.update', $category->id))) }}

			<div class="form-group">
				{{ Form::label('name', 'Nombre:&nbsp;') }}
				{{ Form::text('name') }}
				<div class="errors">
					{{ $errors->first('name', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Descripción:&nbsp;') }}
				{{ Form::text('description') }}
			</div>
		</div>
		<div class="text-center">
			{{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}
			
			{{ Form::close() }}

			<form action="{{ URL::to('categories') }}">
		        	<button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>
	</div>
</div>
@stop