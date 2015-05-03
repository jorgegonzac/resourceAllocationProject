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
				        	<td>Horas:</td>
				            <td>Lunes</td>
				            <td>Martes</td>
				            <td>Miercoles</td>
				            <td>Jueves</td>
				            <td>Viernes</td>
				            <td>Sábado</td>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php $i = 0; ?>
				        @foreach($horas as $hora)
				        <tr>
							<td>{{$hora}}</td>
							<td>{{$lunes[$hora]}}</td>
							<td>{{$martes[$hora]}}</td>
							<td>{{$miercoles[$hora]}}</td>
							<td>{{$jueves[$hora]}}</td>
							<td>{{$viernes[$hora]}}</td>
							<td>{{$sabado[$hora]}}</td>
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