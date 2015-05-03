@extends('layouts.adminlayout')
@section('content')

{{ HTML::style('css/style_form.css')}}


<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2>Nuevo Recurso</h2>
	</div>
	<div class="sep"></div>

	<div class="container-form">
		<div class="inputs">
			{{ Form::open(array('route' => 'resources.store', 'files' => true)) }}

			<div class="form-group">
				{{ Form::label('name', 'Nombre:') }}
				{{ Form::text('name') }} <br>
				<div class="errors">
					{{ $errors->first('name', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Descripción:') }}
				{{ Form::text('description') }} <br>
				<div class="errors">
					{{ $errors->first('description', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				<!--{{ Form::label('laboratory', 'Laboratorio:') }}-->
									
					<select name="laboratory" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    <option selected disabled>Selecciona un laboratorio</option>
					    @foreach($laboratories as $lab)
					    <option value="{{ $lab->id }}">{{ $lab->name }}</option>
					    @endforeach
					</select>
				

				<div class="errors">
					{{ $errors->first('laboratory', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
							
					<select name="category" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    <option selected disabled>Selecciona una categoria</option>
					    @foreach($categories as $category)
					    <option value="{{ $category->id }}">{{ $category->name }}</option>
					    @endforeach
					</select>
				

				<div class="errors">
					{{ $errors->first('category', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">				
				
					<select name="timetable" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    <option selected disabled>Selecciona un calendario</option>
					    @foreach($timetables as $timetable)
					    <option value="{{ $timetable->id }}">{{ $timetable->description }}</option>
					    @endforeach
					</select>

				<div class="errors">
					{{ $errors->first('timetable', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('tags', 'Tags:&nbsp;') }}
				{{ Form::text('tags', '', array('placeholder' => 'Tag1%Tag2%Tag3')) }}
				<div class="errors">
					{{ $errors->first('tags', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="pull-right text-center">
				{{ Form::label('image', 'Imagen:')}}
				{{ Form::file('image') }}
				<div class="errors">
					{{ $errors->first('image', '<span class="error">:message</span>') }}
				</div>
			</div>
		</div>

		<div class="text-center">
		    {{ Form::button('Crear',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		
			{{ Form::close() }}
			<form action="{{ URL::to('resources') }}">
		        	<button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>

	</div>
</div>
@stop