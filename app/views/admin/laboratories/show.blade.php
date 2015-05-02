@extends('layouts.adminlayout')
@section('content')

{{ HTML::style('css/style_show.css')}}

<style type="text/css">
.form{height: 300px;}
</style>

<div class="form" style="width:800px; margin:0 auto;">
    <div class="text-center">
        <h3>Información de </h3><h1>{{ $laboratory->name }}</h1>
    </div>

    <div class="sep"></div>

        <table class='table borderless' >
            <tr>
                <td><strong>Nombre:</strong></td> 
                <td>{{ $laboratory->name   }}</td>
            </tr>
            <tr>
                <td><strong>Edificio:</strong> </td>
                <td>{{ $laboratory->building }}</td>
            </tr>
            <tr>
                <td><strong>Encargado:</strong> </td>
                <td>{{ $laboratory->user->first_name." ".$laboratory->user->first_last_name." ".$laboratory->user->second_last_name }}</td>
            </tr>
            <tr>
                <td><strong>Correo de Contacto:</strong> </td>
                <td>{{ $laboratory->user->email1}}</td>
            </tr>
        
        </table>
    <div class="text-center">
        <form action="{{ URL::to('laboratories') }}">
                <button type="submit" class="btn btn-info"> Regresar</button>
        </form>
    </div>

</div>

@stop