@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_form.css')}}


<div class="form" style="width:800px; margin:0 auto;">
	<div class="text-center">
		<h2> Editar Usuario</h2>
	</div>

	<div class="sep"></div>

	{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

	<div class="container-form">
		<div class="inputs">
			<div class="form-group">
				{{ Form::label('first_name', 'Nombre:&nbsp;') }}
				{{ Form::text('first_name') }}
			</div>

			<div class="form-group">
				{{ Form::label('first_last_name', 'Apellido Paterno:&nbsp;') }}
				{{ Form::text('first_last_name') }}
			</div>

			<div class="form-group">
				{{ Form::label('second_last_name', 'Apellido Materno:&nbsp;') }}
				{{ Form::text('second_last_name') }}
			</div>

			<div class="form-group">
				{{ Form::label('email1', 'Correo:&nbsp;') }}
				{{ Form::text('email1') }}
				<div class="errors">
					{{ $errors->first('email1', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('email2', 'Correo alternativo:&nbsp;') }}
				{{ Form::text('email2') }}
				<div class="errors">
					{{ $errors->first('email2', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('school_id', 'Matrícula:&nbsp;') }}
				{{ Form::text('school_id') }}
				<div class="errors">
					{{ $errors->first('school_id', '<span class="error">:message</span>') }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('career', 'Carrera:&nbsp;') }}
				{{ Form::text('career') }}
			</div>
			
			<div class="form-group" class="text-center">        
                Selecciona un rol:
                <select name="rol" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
                    <option selected disabled>Selecciona un rol</option>
                    <option  value="2"> Estudiante</option>
                    <option  value="1"> Administrador</option>
                    <option  value="3"> Super Administrador</option>
                </select>
                <div class="errors">
                    {{ $errors->first('rol', '<span class="error">:message</span>') }}
                </div>
            </div>	
		</div>

		<div class="text-center">
		    {{ Form::button('Guardar',array('type' => 'submit', 'class' => 'btn btn-success')) }}
			{{ Form::close() }}

		<form action="{{ URL::to('users')}}">
	        	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>


		</div>
	</div>
</div>
@stop