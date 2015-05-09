@extends('layouts.adminlayout')
@section('content')
{{ HTML::style('css/style_show.css')}}


<div class="form" style="width:800px; margin:0 auto;">

    <div class="text-center">
        <h3>Información de {{ $user->school_id }}</h3>
    </div>
    <div class="sep"></div>

    <table class='table borderless' >
        <tr>
            <td><strong>Nombre:</strong> </td>
            <td>{{ $user->first_name  }}</td>
        </tr>
        <tr>
            <td><strong>Apellido paterno:</strong> </td>
            <td>{{ $user->first_last_name }}</td>
        </tr>
        <tr>
            <td><strong>Apellido materno:</strong> </td>
            <td>{{ $user->second_last_name }}</td>
        </tr>
        <tr>
            <td><strong>Correo:</strong> </td>
            <td>{{ $user->email1 }}</td>
        </tr>
        <tr>
            <td><strong>Correo alternativo:</strong></td>
            <td>{{ $user->email2 }}<br></td>
        </tr>
        <tr>
            <td><strong>Matricula:</strong> </td>
            <td>{{ $user->school_id }}<br></td>
        </tr>
        <tr>
            <td><strong>Carrera:</strong> </td>
            <td>{{ $user->career }}</td>
        </tr>

        <tr>
            <td><strong>Rol:</strong> </td>
            <td>{{ $user->role_description }}</td>
        </tr>

    </table>

    <div class="text-center">
    <form action="{{ URL::to('users') }}">
        <button type="submit" class="btn btn-info"> Regresar</button>
    </form>

    </div>
</div>

@stop