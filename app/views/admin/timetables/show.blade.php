@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_show.css')}}

<style type="text/css">
	.form{max-width: 830px;}
	.form 	.sep{width: 800px;}
</style>

<div class="form" style="width:800px; margin:0 auto;">
    <div class="text-center">
    	<h3>Información de </h3><h1>{{ $timetable[0]->description }}</h1>
    </div>

    <div class="sep"></div>
    <div class="container-form">
	    <table class='table borderless' >
	        <tr>
	            <td><strong>Nombre:</strong> </td>
	            <td>{{ $timetable[0]->description }}</td>
	        </tr>
	        <tr>
	            <td><strong>Numero de Horarios:</strong> 
	            <td>{{ sizeof($timetable[0]->schedules) }}</td>
	        </tr>
		</table>   
	</div>
		   	<p align="center"><strong>Horarios</strong></p>
		   	<div class="col-sm-15 col-sm-15 col-md-12 col-lg-12">
		    	<table class="table table-striped table-bordered">
		    		<thead>
				        <tr>
				        	<td align="center">Horas:</td>
				            <td align="center">Lunes</td>
				            <td align="center">Martes</td>
				            <td align="center">Miércoles</td>
				            <td align="center">Jueves</td>
				            <td align="center">Viernes</td>
				            <td align="center">Sábado</td>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php $i = 0; ?>
				        @foreach($horas as $hora)
				        <tr>
							<td align="center">{{$hora}}</td>
							<td align="center">{{$lunes[$hora]}}</td>
							<td align="center">{{$martes[$hora]}}</td>
							<td align="center">{{$miercoles[$hora]}}</td>
							<td align="center">{{$jueves[$hora]}}</td>
							<td align="center">{{$viernes[$hora]}}</td>
							<td align="center">{{$sabado[$hora]}}</td>
				        </tr>
				        <?php $i++; ?>
				        @endforeach
				    </tbody>
		    	</table>
		    </div>
		

	<div class="text-center">
	   	<form action="{{ URL::to('timetables') }}">
	        <button type="submit" class="btn btn-info">Regresar</button>
	    </form>
	</div>

</div>

@stop