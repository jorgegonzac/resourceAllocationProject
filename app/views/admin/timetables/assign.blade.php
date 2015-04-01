@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2>Asignar Horarios Calendario</h2>
	{{ Form::open(array('route' => 'timetables.store')) }}
	
	<h3>Selecciona un calendario:</h3>
	<div class="col-lg-3"></div>
	<div class="col-lg-4">
		<select id="selectTimetable" class="btn btn-primary form-control">
			<option value="100000">Elige un calendario</option>
   			@foreach($timetables as $timetable)
	   			<option value="{{$timetable->id}}">{{ $timetable->description }}</option>
   			@endforeach
		</select>
	</div>
	<br><br>
	<div class="asignar_horario">
	</div>

	<br>

	{{ Form::close() }}

	<form action="{{ URL::to('timetables') }}">
       	<button type="submit" class="btn btn-primary">Regresar</button>
	</form>

</div>

@stop