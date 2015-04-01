@extends('layouts.adminlayout')
@section('content')

<div class="text-center">

	<h2>Crear Nuevo Horario</h2>

	{{ Form::open(array('route' => 'schedules.store')) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre:') }}
			{{ Form::text('name') }}
<<<<<<< HEAD
			<br>
=======
>>>>>>> diana
			{{ $errors->first('name', '<span class="error">:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('schedule_day', 'Elige el día de la semana para el periodo:')}}<br>
							
			{{ Form::radio('day', 'Lunes', '', array('id' => 'radio_monday', 'checked' => 'checked')) }}
			{{ Form::label('Lunes') }}

			{{ Form::radio('day', 'Martes', '', array('id' => 'radio_tuesday')) }}
			{{ Form::label('Martes') }}

			{{ Form::radio('day', 'Miercoles', '', array('id' => 'radio_wednesday')) }}
			{{ Form::label('Miercoles') }}

			{{ Form::radio('day', 'Jueves', '', array('id' => 'radio_thursday')) }}
			{{ Form::label('Jueves') }}

			{{ Form::radio('day', 'Viernes', '', array('id' => 'radio_friday')) }}
			{{ Form::label('Viernes') }}

			{{ Form::radio('day', 'Sabado', '', array('id' => 'radio_saturday')) }}
			{{ Form::label('Sabado') }}
<<<<<<< HEAD
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
		<div>
			<h3>Hora de Inicio:</h3>
		</div>


		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			{{ Form::select('hora_inicio', $horasInicio, null, array('class' => 'form-control')) }}
		</div>
		<br><br>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
		<div>
			<h3>Hora de Fin:</h3>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
			{{ Form::select('hora_fin', $horasFin, null, array('class' => 'form-control')) }}
		</div><br><br>
		@if($errors->any)
			{{ $errors->first('invalid_hour', '<span class="error">:message</span>') }}
		@endif
		<br><br>
			
		</div>

		<div class="text-center">
			{{ Form::button('Crear', array('type' => 'submit', 'class' => 'btn btn-success')) }}
		
		{{ Form::close() }}


			<form action="{{ URL::to('schedules') }}">
		       	<button type="submit" class="btn btn-danger"> Cancelar</button>
			</form>
		</div>
	    
=======

			{{ Form::radio('day', 'Domingo', '', array('id' => 'radio_sunday')) }}
			{{ Form::label('Domingo') }}
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<table class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <td colspan="28">Hora de Inicio</td>
			        </tr>
			        <tr>
			            <td colspan="28">Seleccionar Opción:</td>
			        </tr>
			    </thead>
			    <tbody>
			    	<tr>
			    	<?php $minutos = '00'; $hora = 8; $i = 1;?>
			    		<td id="inicio_{{$i}}">
		            		{{$hora}}:{{$minutos}}</br>
		            		{{ Form::radio('inicio', $hora . ':' . $minutos, '', array('id' => 'radio_inicio_' . $i , 'checked' => 'checked')) }}
		            	</td>
		            	<?php 
		            		if($minutos == '00'){
		            			$minutos = '30';
		            		}else{
		            			$minutos = '00';
		            			$hora++;
		            		}
		            	$i++;
		            	?>
		            @while($hora < 22)
		            	<td id="inicio_{{$i}}">
		            		{{$hora}}:{{$minutos}}</br>
		            		{{ Form::radio('inicio', $hora . ':' . $minutos, '', array('id' => 'radio_inicio_' . $i )) }}
		            	</td>
		            	<?php 
		            		if($minutos == '00'){
		            			$minutos = '30';
		            		}else{
		            			$minutos = '00';
		            			$hora++;
		            		}
		            	$i++;?>
		            @endwhile
		            </tr>
			    </tbody>
			</table>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<table class="table table-striped table-bordered">
			    <thead>
			        <tr>
			            <td colspan="28">Hora de Fin</td>
			        </tr>
			        <tr>
			            <td colspan="28">Seleccionar Opción:</td>
			        </tr>
			    </thead>
			    <tbody>
			    	<tr>
			    	<?php $minutos = '30'; $hora = 8; $i = 1;?>
			    		<td id="fin_{{$i}}">
		            		{{$hora}}:{{$minutos}}</br>
		            		{{ Form::radio('fin', $hora . ':' . $minutos, '', array('id' => 'radio_fin_' . $i , 'checked' => 'checked')) }}
		            	</td>
		            	<?php 
		            		if($minutos == '00'){
		            			$minutos = '30';
		            		}else{
		            			$minutos = '00';
		            			$hora++;
		            		}
		            	$i++;
		            	?>
		            @while($hora < 22)
		            	<td id="fin_{{$i}}">
		            		{{$hora}}:{{$minutos}}</br>
		            		{{ Form::radio('fin', $hora . ':' . $minutos, '', array('id' => 'radio_fin_' . $i )) }}
		            	</td>
		            	<?php 
		            		if($minutos == '00'){
		            			$minutos = '30';
		            		}else{
		            			$minutos = '00';
		            			$hora++;
		            		}
		            	$i++;?>
		            @endwhile
		            	<td id="fin_{{$i}}">
		            		{{$hora}}:{{$minutos}}</br>
		            		{{ Form::radio('fin', $hora . ':' . $minutos, '', array('id' => 'radio_fin_' . $i )) }}
		            	</td>
		            </tr>
			    </tbody>
			</table>
			@if($errors->any)
				{{ $errors->first('invalid_hour', '<span class="error">:message</span>') }}
			@endif
		</div>

	    {{ Form::button('Crear',array('type' => 'submit', 'class' => 'btn btn-success')) }}
	
	{{ Form::close() }}


		<form action="{{ URL::to('schedules') }}">
	       	<button type="submit" class="btn btn-danger"> Cancelar</button>
		</form>
>>>>>>> diana
</div>
@stop