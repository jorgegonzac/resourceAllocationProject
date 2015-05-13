@extends('layouts.adminlayout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Horarios</h2></div>
		<div class="col-xs-6 col-sm-6 col-md-6 text-right">
			<form action="{{ URL::to('schedules/create') }}">
	        	<button type="submit" class="btn btn-success">Nuevo Horario</button>
			</form>
		</div>
	</div>
	<div class="table-responsive">
<table id="myTable" class="display table" width="100%" >
	    <thead>
	        <tr>
	            <td>ID</td>
	            <td>Nombre</td>
	            <td>Día de la semana</td>
	            <td>Hora de Inicio</td>
	            <td>Hora de Fin</td>
	            <td>Acciones</td>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($schedules as $schedule)
		        <tr>
		            <td>{{ $schedule->id }}</td>
		            <td>{{ $schedule->name }}</td>
		            <td>{{ $schedule->weekday }}</td>
		            <td>{{ $schedule->start_hour }}</td>
		            <td>{{ $schedule->end_hour }}</td>
		            <td>
	                {{ Form::open(array('url' => 'schedules/' . $schedule->id)) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::button('<i class="fa fa-trash fa-lg" data-toggle="tooltip" data-placement="left" title="Eliminar"></i>', array('type' => 'submit', 'class' => 'content_icon_admin')) }}

	                {{ Form::close() }}
	                <a  href="{{ URL::to('schedules/' . $schedule->id) }}"> <i class="fa fa-eye fa-lg" data-toggle="tooltip" data-placement="left" title="Mostrar"></i> </a>
	                <a  href="{{ URL::to('schedules/' . $schedule->id . '/edit') }}"> <i class="fa fa-pencil-square-o fa-lg" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>
	            	</td>
		        </tr>	        
	        @endforeach
	    </tbody>
	</table>
</div>
</div>
@stop
