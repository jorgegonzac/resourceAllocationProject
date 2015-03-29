@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $schedule->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nombre:</strong> {{ $schedule->name   }}<br>
            <strong>Día de la semana:</strong> {{ $schedule->weekday }}<br>
            <strong>Periodo:</strong> {{ $schedule->period }}<br>
            <strong>Hora de Inicio:</strong> {{ $schedule->start_hour }}<br>
            <strong>Hora de Fin:</strong> {{ $schedule->end_hour }}<br>
        </p>
    </div>

    <form action="{{ URL::to('schedules') }}">
            <button type="submit" class="btn btn-info"> Regresar</button>
    </form>


</div>

@stop