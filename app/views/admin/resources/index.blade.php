@extends('layouts.adminlayout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Recursos</h2></div>
		<div class="col-xs-6 col-sm-6 col-md-6 text-right">
			<form action="{{ URL::to('resources/create') }}">
	        	<button type="submit" class="btn btn-success">Nuevo Recurso</button>
			</form>
		</div>
	</div>

		<div class="table-responsive">
<table id="myTable" class="display table" width="100%" >
		    <thead>
		        <tr>
		        	<td>ID</td>
		            <td>Nombre</td>
		            <td>Descripción</td>
		            <td>Laboratorio</td>
		            <td>Categoria</td>
		            <td>Calendario</td>
		            <td>Tags</td>          
		            <td>Imagen</td>	 
		            <td>Acciones</td>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($resources as $resource)
		        <tr>
		            <td>{{ $resource->id }}</td>
		            <td>{{ $resource->name }}</td>
		            <td>{{ $resource->description }}</td>
		            <td>{{ $resource->laboratory->name }}</td>
		            <td>{{ $resource->category->name }}</td>
		            <td>{{ $resource->timetables[0]->description }}</td>
		            <td>{{ $resource->tags }}</td>
		            <td><img src="{{$resource->image}}" style="width:60px;height:60px" /></td>
		            <td>
	                {{ Form::open(array('url' => 'resources/' . $resource->id)) }}
	                    {{ Form::hidden('_method', 'DELETE') }}
	                    {{ Form::button('<i class="fa fa-trash fa-lg" data-toggle="tooltip" data-placement="left" title="Eliminar"></i>', array('type' => 'submit', 'class' => 'content_icon_admin')) }}

	                {{ Form::close() }}
	                <a  href="{{ URL::to('resources/' . $resource->id) }}"> <i class="fa fa-eye fa-lg" data-toggle="tooltip" data-placement="left" title="Mostrar"></i> </a>
	                <a  href="{{ URL::to('resources/' . $resource->id . '/edit') }}"> <i class="fa fa-pencil-square-o fa-lg" data-toggle="tooltip" data-placement="left" title="Editar"></i></a>

	            	</td>
		        </tr>	        
		        @endforeach
		    </tbody>
		</table>
	</div>
	</div>
@stop
