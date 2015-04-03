@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $timetable[0]->description }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nombre:</strong> {{ $timetable[0]->description }}<br>
            <strong>Numero de Horarios:</strong> {{ sizeof($timetable[0]->schedules) }}<br>
        </p>
    </div>
    
   	<h2>Horarios</h2>
   	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-10">
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

   	<form action="{{ URL::to('timetables') }}">
        <button type="submit" class="btn btn-info">Regresar</button>
    </form>

    </div>
</div>

@stop