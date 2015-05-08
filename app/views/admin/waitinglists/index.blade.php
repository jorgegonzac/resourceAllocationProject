@extends('layouts.adminlayout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Lista de Espera</h2></div>
<!--
		<div class="col-xs-6 col-sm-6 col-md-6 text-right">
			<form action="{{ URL::to('categories/create') }}">
	        	<button type="submit" class="btn btn-success"> Nueva categoría</button>
			</form>
		</div>
-->
	</div>

	<div class="table-responsive">

		<table id="myTable" class="display table" width="100%" >
		    <thead>
		        <tr>
		            <td>Recurso</td>
		            <td>Matrícula</td>
		            <td>Fecha de Inicio</td>
		            <td>Fecha de Fin</td>
		            <td>Acciones</td>		            
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($waitings as $key => $waiting)
		        <tr>
		            <td>{{ $waiting->name }}</td>
		            <td>{{ $waiting->user_id }}</td>
		            <td>{{ $waiting->start_date }}</td>
		            <td>{{ $waiting->end_date }}</td>

		            <td>
		            	{{ Form::open(array('url' => 'waitinglists/' . $waiting->id)) }}
		                    {{ Form::hidden('_method', 'DELETE') }}
		                    {{ Form::button('<i class="fa fa-remove fa-lg " data-toggle="tooltip" data-placement="left" title="Eliminar"></i>', array('type' => 'submit', 'class' => 'content_icon_admin')) }}
	                	{{ Form::close() }}
	            	</td>
		        </tr>	        
		        @endforeach
		    </tbody>
		</table>
	</div>
	</div>
@stop
