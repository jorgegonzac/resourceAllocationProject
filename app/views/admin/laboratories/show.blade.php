@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $laboratory->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nombre:</strong> {{ $laboratory->name   }}<br>
            <strong>Edificio:</strong> {{ $laboratory->building }}<br>
        </p>
    </div>

    <form action="{{ URL::to('laboratories') }}">
            <button type="submit" class="btn btn-info"> Regresar</button>
    </form>


</div>

@stop