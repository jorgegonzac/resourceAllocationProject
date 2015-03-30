@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $user->school_id }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nombre:</strong> {{ $user->first_name   }}<br>
            <strong>Apellido paterno:</strong> {{ $user->first_last_name }}<br>
            <strong>Apellido materno:</strong> {{ $user->second_last_name }}<br>
            <strong>Correo:</strong> {{ $user->email1 }}<br>
            <strong>Correo alternativo:</strong> {{ $user->email2 }}<br>
            <strong>School id:</strong> {{ $user->school_id }}<br>
            <strong>Career:</strong> {{ $user->career }}
        </p>
    </div>

    <form action="{{ URL::to('users') }}">
            <button type="submit" class="btn btn-info"> Regresar</button>
    </form>


</div>

@stop