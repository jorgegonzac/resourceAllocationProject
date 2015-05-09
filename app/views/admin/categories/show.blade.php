@extends('layouts.adminlayout')
@section('content')

{{ HTML::style('css/style_show.css')}}


<div class="form" style="width:800px; margin:0 auto;">


    <div class="text-center">
        <h3>Categoría</h3><h1>{{ $category->name }}</h1>
    </div>

    <div class="sep"></div>

    <table class='table borderless' >
        <tr>
            <td><strong>Nombre:</strong> </td>
            <td>{{ $category->name   }}</td>
        </tr>
        <tr>
            <td><strong>Descripción:</strong> </td>
            <td>{{ $category->description }}</td>
        </tr>
    </table>

    <div class="text-center">
        <form action="{{ URL::to('categories') }}">
                <button type="submit" class="btn btn-info"> Regresar</button>
        </form>
    </div>

</div>

@stop