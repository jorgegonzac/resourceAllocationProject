@extends('layouts.userslayout')
@section('content')
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