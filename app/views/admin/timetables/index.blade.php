@extends('layouts.adminlayout')
@section('content')
	
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> 
			<h2>Calendarios</h2>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 text-right">
			<a href="assign" class="btn btn-primary form-control">
				<p>Asignar Horario a Calendario</p>
			</a>
			<form action="{{ URL::to('timetables/create') }}">
	        	<button type="submit" class="btn btn-success">Nuevo Calendario</button>
			</form>
		</div>
	</div>
	<div class="table-responsive">
<table id="myTable" class="display table" width="100%" >
	    <thead>
	        <tr>
	            <td>ID</td>
	            <td>Nombre</td>
	            <td>Número de Horarios</td>
	            <td>Acciones</td>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($timetables as $timetable)
		        <tr>
		            <td>{{ $timetable->id }}</td>
		            <td>{{ $timetable->description }}</td>
		            <td>{{ sizeof($timetable->schedules)}}</td>
		            <td>
	                {{ Form::open(array('url' => 'timetables/' . $timetable->id)) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::button('<i class="fa fa-trash fa-lg" data-toggle="tooltip" data-placement="left" title="Eliminar"></i>', array('type' => 'submit', 'class' => 'content_icon_admin')) }}

	                {{ Form::close() }}
	                <a  href="{{ URL::to('timetables/' . $timetable->id) }}"> <i class="fa fa-eye fa-lg" data-toggle="tooltip" data-placement="left" title="Mostrar"></i> </a>
	            	</td>
		        </tr>	        
	        @endforeach
	    </tbody>
	</table>
</div>
</div>

@stop
