@extends('layouts.adminlayout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Usuarios</h2></div>
		<div class="col-xs-6 col-sm-6 col-md-6 text-right">
			<form action="{{ URL::to('users/create') }}">
	        	<button type="submit" class="btn btn-success"> Nuevo Usuario</button>
			</form>
		</div>
	</div>

		<div class="table-responsive">
<table id="myTable" class="display table" width="100%" >
		    <thead>
		        <tr>
		            <td>ID</td>
		            <td>Nombre</td>
		            <td>Apellido Paterno</td>
		            <td>Apellido Materno</td>
		            <td>Correo</td>
		            <td>Correo Alterno</td>
		            <td>Matrícula</td>
		            <td>Carrera</td>
		            <td>Acciones</td>
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($users as $key => $user)
		        <tr>
		            <td>{{ $user->id }}</td>
		            <td>{{ $user->first_name }}</td>
		            <td>{{ $user->first_last_name }}</td>
		            <td>{{ $user->second_last_name }}</td>
		            <td>{{ $user->email1 }}</td>
		            <td>{{ $user->email2 }}</td>
		            <td>{{ $user->school_id }}</td>
		            <td>{{ $user->career }}</td>
		            <td>

		            <a  href="{{ URL::to('users/' . $user->id) . '/delete' }}"><i class="fa fa-trash fa-lg content_icon_admin"  data-toggle="tooltip" data-placement="left" title="Eliminar" type="submit"></i></a>

	                <a  href="{{ URL::to('users/' . $user->id) }}"> <i class="fa fa-eye fa-lg"  data-toggle="tooltip" data-placement="left" title="Mostrar"></i> </a>
	                
	                <a  href="{{ URL::to('users/' . $user->id . '/edit') }}"> <i class="fa fa-pencil-square-o fa-lg"  data-toggle="tooltip" data-placement="left" title="Editar"></i></a>

	            	</td>
		        </tr>	        
		        @endforeach
		    </tbody>
		</table>
	</div>
	</div>
@stop
