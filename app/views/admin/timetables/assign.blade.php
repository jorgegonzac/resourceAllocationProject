@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2>Asignar Horarios Calendario</h2>
	{{ Form::open(array('route' => 'timetables.store')) }}
	
	<div class="col-lg-2"></div>
	<h3>Selecciona un calendario:</h3>
	<div class="col-lg-5"></div>
	<div class="col-lg-4">
		<select id="selectTimetable" class="btn btn-primary form-control">
			<option selected disabled>Selecciona un calendario</option>
   			@foreach($timetables as $timetable)
	   			<option value="{{$timetable->id}}">{{ $timetable->description }}</option>
   			@endforeach
		</select>
	</div>
	<br><br><br><br>
	<div class="col-lg-10 col-md-10 assigned_schedules">
		
	</div>

	<div class="col-lg-5"></div>
	<div class="col-lg-4 unassigned_schedules">
		<select id="selectSchedule" class="btn btn-primary form-control">
		</select>
	</div>

	<br>

	{{ Form::close() }}

	{{ Form::button('Asignar', array('type' => 'submit', 'class' => 'btn btn-success', 'name' => 'asignar')) }}
	
	<form action="{{ URL::to('timetables') }}">
       	<button type="submit" class="btn btn-primary">Regresar</button>
	</form>

</div>

@stop