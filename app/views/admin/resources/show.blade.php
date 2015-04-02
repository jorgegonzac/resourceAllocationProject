@extends('layouts.adminlayout')
@section('content')

<div class="text-center">
    <h3>Mostrando información de </h3><h1>{{ $resource->name }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>ID:</strong>    {{ $resource->id }}<br>
            <strong>Nombre:</strong> {{ $resource->name }}<br>
            <strong>Edificio:</strong> {{ $resource->description }}<br>
            <strong>Imagen:</strong> <img src="{{$resource->image}}" style="width:120px;height:120px"/>
        </p>
    </div>

    <form action="{{ URL::to('resources') }}">
            <button type="submit" class="btn btn-info">Regresar</button>
    </form>


</div>

@stop