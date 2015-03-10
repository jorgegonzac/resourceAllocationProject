@extends('layouts.layout')
@section('content')
	<!-- NAVEGACIÓN DEL USUARIO
		1.- SELECT DE LOS LABORATORIOS (CON BASE DE DATOS)
		2.- SEARCH BAR
	-->
	<div class="row">
		<!-- SELECT LABS -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 ">
			<select id="selectLaboratory" class="btn btn-primary form-control">
				<option value="100">Todos Los Laboratorios</option>
     			@foreach($laboratories as $laboratory)
     			<option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
     			@endforeach
			</select>
		</div>
		<!-- SEARCH BAR -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			{{ Form::open() }}
				{{ Form::text('searchbar', null, array('class' => 'search-query span2', 'placeholder' => 'Search', 'id' => 'searchBar')) }}
			{{ Form::close() }}
		</div>
		</br>
		<div class="resources">
			<h1>RECENT RESOURCES</h1>
			@foreach($recentBookings as $recentBooking)
				<h1>
					<a href="">
						<p>{{$recentBooking->resource->name}}</p>
					</a>
				</h1>
			@endforeach
		</div>
	</div>
@stop