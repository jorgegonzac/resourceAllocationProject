@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}

<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2>Editar Recurso</h2>
	</div>

	<div class="sep"></div>

	<div class="container-form">
		{{ Form::model($resource, array('method' => 'PATCH', 'route' => array('resources.update', $resource->id), 'files' => true)) }}

		<div class="inputs">
			
			<div class="form-group">
				{{ Form::label('name', 'Nombre:&nbsp;') }}
				{{ Form::text('name') }}
				{{ $errors->first('name', '<span class="error">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Descripción:&nbsp;') }}
				{{ Form::text('description') }}
				{{ $errors->first('description', '<span class="error">:message</span>') }}
			</div>

			<div class="form-group">
				<!--{{ Form::label('laboratory', 'Laboratorio:') }}-->
				@if(Session::get('super') == 1)
					<select name="laboratory" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    <option disabled>Selecciona un laboratorio</option>
						@foreach($laboratories as $laboratory)
							@if($laboratory->id == $resource->laboratory_id)
							    <option selected value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
						    @else
							    <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
						    @endif
						@endforeach
					</select>
				@else
					<select name="laboratory" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					    <option selected  value="{{ Session::get('lab_id') }}">{{ Session::get('lab_name') }}</option>
					</select>
				@endif				
				{{ $errors->first('laboratory', '<span class="error">:message</span>') }}
			</div>

			<div class="form-group">
				<!--{{ Form::label('category', 'Categoria:') }}-->
				<select name="category" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				    <option selected disabled>Selecciona una categoria</option>
				    @foreach($categories as $category)
				    	@if($category->id == $resource->category_id)
						    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
						@else
						    <option value="{{ $category->id }}">{{ $category->name }}</option>						
						@endif
				    @endforeach
				</select>
				
				{{ $errors->first('category', '<span class="errors">:message</span>') }}
			</div>

			<div class="form-group">
				<!--{{ Form::label('timetable', 'Calendario:') }}-->
				<select name="timetable" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				    <option selected disabled>Selecciona un calendario</option>
				    @foreach($timetables as $timetable)
				    	@if($timetable->id == $resource->timetables[0]->id)
						    <option selected value="{{ $timetable->id }}">{{ $timetable->description }}</option>
				    	@else
						    <option value="{{ $timetable->id }}">{{ $timetable->description }}</option>
				    	@endif
				    @endforeach
				</select>
				<br>
				{{ $errors->first('timetable', '<span class="errors">:message</span>') }}
			</div>

			<div class="form-group">
				{{ Form::label('tags', 'Tags:&nbsp;') }}
				{{ Form::text('tags', $resource->tags, array('placeholder' => 'Tag1%Tag2%Tag3', )) }} <br>
				{{ $errors->first('tags', '<span class="errors">:message</span>') }}
			</div>

			<div class="pull-right text-center">
				{{ Form::label('image', 'Imagen:')}}
				<img src="{{$resource->image}}" style="width:60px;height:60px" />
				{{ Form::file('image') }} <br>
				{{ $errors->first('image', '<span class="errors">:message</span>') }}
			</div>
		</div>

		<div class="text-center">
		    {{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}
			{{ Form::close() }}

			<form action="{{ URL::to('resources') }}">
		        	<button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>

	</div>
</div>
@stop