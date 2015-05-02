@extends('layouts.adminlayout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Laboratorios</h2></div>
		<div class="col-xs-6 col-sm-6 col-md-6 text-right">
			<form action="{{ URL::to('laboratories/create') }}">
	        	<button type="submit" class="btn btn-success"> Nuevo Laboratorio</button>
			</form>
		</div>
	</div>

		<div class="table-responsive">
<table id="myTable" class="display table" width="100%" >
		    <thead>
		        <tr>
		            <td>Nombre</td>
		            <td>Edificio</td>		  
		            <td>Encargado</td>
		            <td>Acciones</td>          
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($laboratories as $key => $lab)
		        <tr>
		            <td>{{ $lab->name }}</td>
		            <td>{{ $lab->building }}</td>
		            <td>{{ $lab->user->first_name." ".$lab->user->first_last_name." " }}</td>
		            <td>

	                {{ Form::open(array('url' => 'laboratories/' . $lab->id)) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::button('<i class="fa fa-trash fa-lg" data-toggle="tooltip" data-placement="left" title="Eliminar"></i>', array('type' => 'submit', 'class' => 'content_icon_admin')) }}

	                {{ Form::close() }}
	                <a  href="{{ URL::to('laboratories/' . $lab->id) }}"> <i class="fa fa-eye fa-lg" data-toggle="tooltip" data-placement="left" title="Mostrar"></i> </a>
	                <a  href="{{ URL::to('laboratories/' . $lab->id . '/edit') }}"> <i class="fa fa-pencil-square-o fa-lg" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>

	            	</td>
		        </tr>	        
		        @endforeach
		    </tbody>
		</table>
	</div>
	</div>
@stop
