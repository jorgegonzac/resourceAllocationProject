@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}

<style type="text/css">
.form{height: 300px;}
</style>

<div class="form" style="width:800px; margin:0 auto;">

	<div class="text-center">
		<h2>Asignar Horarios a Calendario</h2>
	</div>

	<div class="sep"></div>

	<div class="container-form">
		{{ Form::open(array('route' => 'timetables.store')) }}
		<div class="inputs">	
			<div class="col-lg-2"></div>
			<div class="text-center">
			<h3>Selecciona un calendario:</h3>
			<div class="col-lg-5"></div>
				<select name="timetable" id="selectTimetable" class="btn btn-default">
					<option selected disabled>Selecciona un calendario</option>
		   			@foreach($timetables as $timetable)
			   			<option value="{{$timetable->id}}">{{ $timetable->description }}</option>
		   			@endforeach
				</select>
			</div>
			<br>
			<div class="col-lg-20 col-md-20 assigned_schedules" class="text-center" >
			
			</div>

			<div class="col-lg-6"></div>
			<div class="col-lg unassigned_schedules">
				<div class="text-center">
					<select name="schedule" id="selectSchedule" class="btn btn-default">
					</select>
				</div>	
			</div>
		</div>
			

		<div class="text-center"> 			
			{{ Form::button('Asignar', array('type' => 'submit', 'class' => 'btn btn-success', 'name' => 'asignar')) }}
			{{ Form::close() }}
			<form action="{{ URL::to('timetables') }}">
		       	<button type="submit" class="btn btn-primary">Regresar</button>
			</form>
		</div>
	</div>
</div>

@stop