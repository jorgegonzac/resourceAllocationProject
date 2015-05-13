@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}

<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2> Editar Horario</h2>
	</div>

	<div class="sep"></div>

	<div class="container-form">

		{{ Form::model($schedule, array('method' => 'PATCH', 'route' => array('schedules.update', $schedule->id))) }}

		<div class="inputs">
			<div class="form-group">
				{{ Form::label('name', 'Nombre:&nbsp;') }}
				{{ Form::text('name') }}
				<div class="errors">
					{{ $errors->first('name', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group" style="width:350px; margin:0 auto;">
				{{ Form::label('schedule_day', 'Elige el día de la semana para el periodo:')}}<br>
								
				{{ Form::radio('day', 'Lunes', '', array('id' => 'radio_monday', 'checked' => 'checked')) }}
				{{ Form::label('Lunes') }}

				{{ Form::radio('day', 'Martes', '', array('id' => 'radio_tuesday')) }}
				{{ Form::label('Martes') }}

				{{ Form::radio('day', 'Miercoles', '', array('id' => 'radio_wednesday')) }}
				{{ Form::label('Miercoles') }}<br>

				{{ Form::radio('day', 'Jueves', '', array('id' => 'radio_thursday')) }}
				{{ Form::label('Jueves') }}

				{{ Form::radio('day', 'Viernes', '', array('id' => 'radio_friday')) }}
				{{ Form::label('Viernes') }}

				{{ Form::radio('day', 'Sabado', '', array('id' => 'radio_saturday')) }}
				{{ Form::label('Sabado') }}<br>
			</div>
			
			<br>
			
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">{{ Form::label( 'Inicio:') }}</div>
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
				{{ Form::select('hora_inicio', $horasInicio, null, array('class' => 'btn btn-default dropdown-toggle')) }}
			</div>
			<br><br><br>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">{{ Form::label( 'Fin:') }}</div>
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
				{{ Form::select('hora_fin', $horasFin, null, array('class' => 'btn btn-default dropdown-toggle')) }}
			</div><br><br>
			@if($errors->any)
				<div class="errors">
					{{ $errors->first('invalid_hour', '<span class="error">:message</span>') }}
				</div>
			@endif
			<br><br>
		</div>

		<div class="text-center">
			{{ Form::button('Editar', array('type' => 'submit', 'class' => 'btn btn-success')) }}
		
			{{ Form::close() }}

			<form action="{{ URL::to('schedules') }}">
		        <button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>
	</div>
</div>
@stop