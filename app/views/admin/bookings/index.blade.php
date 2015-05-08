@extends('layouts.adminlayout')
@section('content')

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Reservaciones Activas</h2></div>
	</div>

				<div class="bookingModal text-center">                   
                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-dialog-center modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
				                    <img src="/images/loading.gif" id="loading-indicator" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

	<div class="table-responsive">

		<table id="myTable" class="display table" width="100%" >
		    <thead>
		        <tr>
		            <td>Recurso</td>
		            <td>Matrícula</td>
		            <td>Fecha de Inicio</td>
		            <td>Fecha de Fin</td>
		            <td>Acciones</td>		            
		        </tr>
		    </thead>
		    <tbody>
		    	@foreach($bookings as $key => $booking)
		        <tr>
		            <td>{{ $booking->name }}</td>
		            <td>{{ $booking->user_id }}</td>
		            <td>{{ $booking->start_date }}</td>
		            <td>{{ $booking->end_date }}</td>

		            <td>
		            	{{ Form::open(array('url' => 'bookings/' . $booking->id)) }}
		                    {{ Form::hidden('_method', 'DELETE') }}
		                    {{ Form::button('<i class="fa fa-reply fa-lg" onclick="showLoadingIndicator()" data-toggle="tooltip" data-placement="left" title="Reasignar"></i>', array('type' => 'submit', 'class' => 'content_icon_admin')) }}
	                	{{ Form::close() }}

	                	<a  href="{{ URL::to('bookings/' . $booking->id . '/close') }}"> <i class="fa fa-check-square-o fa-lg" onclick="showLoadingIndicator()" data-toggle="tooltip" data-placement="left" title="Check out"></i> </a>
	            	</td>
		        </tr>	        
		        @endforeach
		    </tbody>
		</table>
	</div>
	</div>
@stop
