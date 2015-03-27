@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $category->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Nombre:</strong> {{ $category->name   }}<br>
            <strong>Descripción:</strong> {{ $category->description }}<br>
        </p>
    </div>

    <form action="{{ URL::to('categories') }}">
            <button type="submit" class="btn btn-info"> Regresar</button>
    </form>


</div>

@stop