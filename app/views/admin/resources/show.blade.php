@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_show.css')}}


<div class="form" style="width:800px; margin:0 auto;">


    <div class="text-center">
        <h3>Recurso </h3><h1>{{ $resource->name }}</h1>
    </div>

    <div class="sep"></div>

    <table class='table borderless' >
        <tr>
            <td><strong>ID:</strong> </td>
            <td>{{ $resource->id }}</td>
        </tr>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td> {{ $resource->name }}<br></td>
        </tr>
        <tr>
            <td><strong>Description:</strong></td>
            <td> {{ $resource->description }}</td>
        </tr>
        <tr>
            <td><strong>Laboratorio:</strong></td>
            @if($resource->laboratory)
            <td>{{ $resource->laboratory->name }}</td>
            @else
            <td>{{ 'El laboratorio de este recurso<br>fue eliminado.'}}</td>
            @endif
        </tr>
        <tr>
            <td><strong>Categoria:</strong></td>
            @if($resource->category)
            <td>{{ $resource->category->name }}</td>
            @else
            <td>{{ 'La categoria de este recurso<br>fue eliminada.'}}</td>
            @endif
        </tr>
        <tr>
            <td><strong>Calendario:</strong> </td>
            @if($resource->timetable[0])
            <td>{{$resource->timetable[0]}}</td>
            @else
            <td>{{ 'El calendario de este recurso<br>fue eliminado.' }}</td>
            @endif
        </tr>
        <tr>
            <td><strong>Tags:</strong></td>
            <td> {{ $resource->tags }}</td>
        </tr>
        <tr>
            <td><strong>Imagen:</strong> </td>
            <td><img src="{{$resource->image}}" style="width:120px;height:120px"/></td>
        </tr>
    </table>

    <div class="text-center">
        <form action="{{ URL::to('resources') }}">
                <button type="submit" class="btn btn-info">Regresar</button>
        </form>
    </div>


</div>

@stop