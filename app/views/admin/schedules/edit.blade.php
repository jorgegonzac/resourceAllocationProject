@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2> Editar Horario</h2>

	{{ Form::model($schedule, array('method' => 'PATCH', 'route' => array('schedules.update', $schedule->id))) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre:') }}
			{{ Form::text('name') }}
			<br>
			{{ $errors->first('name', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('schedule_day', 'Elige el día de la semana para el periodo:')}}<br>
							
			{{ Form::radio('day', 'Lunes', '', array('id' => 'radio_monday', 'checked' => 'checked')) }}
			{{ Form::label('Lunes') }}

			{{ Form::radio('day', 'Martes', '', array('id' => 'radio_tuesday')) }}
			{{ Form::label('Martes') }}

			{{ Form::radio('day', 'Miercoles', '', array('id' => 'radio_wednesday')) }}
			{{ Form::label('Miercoles') }}

			{{ Form::radio('day', 'Jueves', '', array('id' => 'radio_thursday')) }}
			{{ Form::label('Jueves') }}

			{{ Form::radio('day', 'Viernes', '', array('id' => 'radio_friday')) }}
			{{ Form::label('Viernes') }}

			{{ Form::radio('day', 'Sabado', '', array('id' => 'radio_saturday')) }}
			{{ Form::label('Sabado') }}
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
		<div>
			<h3>Hora de Inicio:</h3>
		</div>


		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			{{ Form::select('hora_inicio', $horasInicio, null, array('class' => 'form-control')) }}
		</div>
		<br><br>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
		<div>
			<h3>Hora de Fin:</h3>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			{{ Form::select('hora_fin', $horasFin, null, array('class' => 'form-control')) }}
		</div><br><br>
		@if($errors->any)
			{{ $errors->first('invalid_hour', '<span class="error">:message</span>') }}
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
@stop