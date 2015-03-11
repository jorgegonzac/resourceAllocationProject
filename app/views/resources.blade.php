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
	</div>
	
	<div class="row">
		<div class="resources">
			<h1>RECENT RESOURCES</h1>
			@foreach( $recentBookings as $recentBooking)
				<div class="col-sm-6 col-md-3">
					<div class="panel panel-default panel-card">
	                    <div class="panel-heading">
	                        <img src="{{$recentBooking->image}}" style="width:200px;height:228px"/>
	                        <button class="btn btn-primary btn-sm" role="button">Apartar</button>
	                    </div>
	                    <div class="panel-body text-center">
	                        <h4 class="panel-header">
	                        	<a href="">
	                        		{{$recentBooking->name}}
	                        	</a>
	                        </h4>
	                        <small>{{$recentBooking->description}}</small>
	                    </div>
	                    <div class="panel-thumbnails">
	                        <div class="row">
	                            <div class="col-xs-4">
	                            	<img src="{{$recentBooking->image}}" style="width:200px;height:228px"/>
	                            </div>
	                        </div>
	                    </div>
                	</div>
				</div>
			@endforeach
		</div>
	</div>
@stop