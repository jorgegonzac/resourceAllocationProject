@extends('layouts.layout')
@section('content')
	<!-- NAVEGACIÓN DEL USUARIO
		1.- SELECT DE LOS LABORATORIOS (CON BASE DE DATOS)
		2.- SEARCH BAR
	-->
	<div class="row">
		<!-- SELECT LABS -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
			{{ Form::open() }}
				{{ Form::select('laboratories', $laboratories, null, array('class'=>'form-control btn-primary' )) }}
			{{ Form::close() }}
		</div>
		<!-- SEARCH BAR -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			{{ Form::open() }}
				{{ Form::text('searchbar', null, array('class' => 'search-query span2', 'placeholder' => 'Search')) }}
			{{ Form::close() }}
		</div>
		<div class="resources">
			</br>
			<h1>RECENT RESOURCES</h1>
			@foreach($recentBookings as $recentBooking)
				<a href="">
					<p>{{$recentBooking->resource->name}}</p>
				</a>
			@endforeach
		</div>
	</div>
@stop