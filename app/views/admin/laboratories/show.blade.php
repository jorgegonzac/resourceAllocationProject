@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $laboratory->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nombre:</strong> {{ $laboratory->name   }}<br>
            <strong>Edificio:</strong> {{ $laboratory->building }}<br>
            <strong>Encargado:</strong> {{ $laboratory->user->first_name." ".$laboratory->user->first_last_name." ".$laboratory->user->second_last_name }}<br>
            <strong>Correo de Contacto:</strong> {{ $laboratory->user->email1}}
        </p>
    </div>

    <form action="{{ URL::to('laboratories') }}">
            <button type="submit" class="btn btn-info"> Regresar</button>
    </form>


</div>

@stop