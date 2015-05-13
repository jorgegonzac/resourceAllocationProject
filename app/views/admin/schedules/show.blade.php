@extends('layouts.adminlayout')
@section('content')

{{ HTML::style('css/style_show.css')}}


<div class="form" style="width:800px; margin:0 auto;">


    <div class="text-center">
        <h3>Información de </h3><h1>{{ $schedule->name }}</h1>
    </div>

    <div class="sep"></div>

    <table class='table borderless' >
        <tr>
            <td><strong>Nombre:</strong> </td>
            <td>{{ $schedule->name   }}</td>
        </tr>
        <tr>
            <td><strong>Día de la semana:</strong> </td>
            <td>{{ $schedule->weekday }}</td>
        </tr>
        <tr>
            <td><strong>Hora de Inicio:</strong> </td>
            <td>{{ $schedule->start_hour }}</td>
        </tr>
        <tr>
            <td><strong>Hora de Fin:</strong></td>
            <td> {{ $schedule->end_hour }}</td>
        </tr>        
    </table>

    <div class="text-center">
        <form action="{{ URL::to('schedules') }}">
                <button type="submit" class="btn btn-info"> Regresar</button>
        </form>
    </div>

</div>

@stop