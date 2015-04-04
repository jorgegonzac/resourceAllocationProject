@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2>Editar Recurso</h2>

	{{ Form::model($resource, array('method' => 'PATCH', 'route' => array('resources.update', $resource->id), 'files' => true)) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre:') }}
			{{ Form::text('name') }}
			{{ $errors->first('name', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Descripción:') }}
			{{ Form::text('description') }} <br>
			{{ $errors->first('description', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('laboratory', 'Laboratorio:') }}
			<select name="laboratory">
			    <option selected disabled>Selecciona un laboratorio</option>
			    @foreach($laboratories as $lab)
			    <option value="{{ $lab->id }}">{{ $lab->name }}</option>
			    @endforeach
			</select>
			<br>
			{{ $errors->first('laboratory', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('category', 'Categoria:') }}
			<select name="category">
			    <option selected disabled>Selecciona una categoria</option>
			    @foreach($categories as $category)
			    <option value="{{ $category->id }}">{{ $category->name }}</option>
			    @endforeach
			</select>
			<br>
			{{ $errors->first('category', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('timetable', 'Calendario:') }}
			<select name="timetable">
			    <option selected disabled>Selecciona un calendario</option>
			    @foreach($timetables as $timetable)
			    <option value="{{ $timetable->id }}">{{ $timetable->description }}</option>
			    @endforeach
			</select>
			<br>
			{{ $errors->first('timetable', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('tags', 'Tags:') }}
			{{ Form::text('tags', '', array('placeholder' => 'Tag1%Tag2%Tag3')) }} <br>
			{{ $errors->first('tags', '<span class="error">:message</span>') }}
		</div>

		<div class="pull-right text-center">
			{{ Form::label('image', 'Imagen:')}}
			<img src="{{$resource->image}}" style="width:60px;height:60px" />
			{{ Form::file('image') }} <br>
			{{ $errors->first('image', '<span class="error">:message</span>') }}
		</div>

		<br><br><br><br><br><br><br>
		<div class="text-center">
		    {{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}
		</div>

	{{ Form::close() }}

		<form action="{{ URL::to('resources') }}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>

</div>
@stop