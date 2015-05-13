@extends('layouts.bookinglayout')
@section('content')
<style>

h3{
    color:black;
}


.form_booking{
    vertical-align: center;
    margin-left: auto;
    margin-right: auto;
}

.timetable
{
    width:300px;
    vertical-align: center;
    margin: 0 auto;
    padding: 20px;
}

th{
    text-align: center;
    font-size: large;
}

td{
    text-align: justify;
}

.resource_image{
    width:400px;
    height:400px;
}
@media (min-width:701px) {
    .resource_image {
        width:400px;
        height: 400px;
    }
}

@media (max-width: 700px) {
    .resource_image {
        width:200px;
        height: 200px;
    }
}



</style>


<div class="content_booking">
    <!-- jumbotron with resource information -->
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
        <div class="jumbotron">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    {{ '<p id="is_deleted">'.$resource->deleted_at.'</p>' }}
                    <h1 align="center">{{ $resource->name }} </h1>
                    <p align="center"> Categoría: {{ $category->name }}</p>
                    <p align="center"> Descripción: {{ $resource->description }} </p>

                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
                    
                    <img src="{{$resource->image}}" class="resource_image"/>

                </div>
            </div> 
        </div>
    </div>

    <!-- end of jumbotron with resource information -->

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
        <div class="panel">
            <div class="panel-body">
                <div class="row-fluid">

                    <div class="col-md-6 col-xs-12" >        

                          <h3 id= "type" align="center">1. Selecciona día que deseas apartarlo...</h3>
                            <div class="funkyradio" align="center" >
                               
                                @foreach($timetables[0]->schedules as $key=> $schedule)
                                   @if( strcasecmp($schedule->weekday,"Lunes") == 0) 
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="weekday" id=" {{ $schedule->name }} ">
                                        <label for=" {{ $schedule->name }} ">Lunes</label>
                                    </div>
                                    @endif
                                @endforeach                     

                               
                                @foreach($timetables[0]->schedules as $key=> $schedule)
                                   @if( strcasecmp($schedule->weekday,"Martes") == 0) 
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="weekday" id=" {{ $schedule->name }} " />
                                        <label for=" {{ $schedule->name }} ">Martes</label>
                                    </div>
                                    @endif
                                @endforeach                     

                                @foreach($timetables[0]->schedules as $key=> $schedule)
                                   @if( strcasecmp($schedule->weekday,"Miercoles") == 0) 
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="weekday" id=" {{ $schedule->name }} " />
                                        <label for=" {{ $schedule->name }} ">Miércoles</label>
                                    </div>
                                    @endif
                                @endforeach                     

                                @foreach($timetables[0]->schedules as $key=> $schedule)
                                   @if( strcasecmp($schedule->weekday,"Jueves") == 0) 
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="weekday" id=" {{ $schedule->name }} " />
                                        <label for=" {{ $schedule->name }} ">Jueves</label>
                                    </div>
                                    @endif
                                @endforeach                     

                                @foreach($timetables[0]->schedules as $key=> $schedule)
                                   @if( strcasecmp($schedule->weekday,"Viernes") == 0) 
                                    <div class="funkyradio-primary">
                                        <input type="radio" name="weekday" id=" {{ $schedule->name }} " />
                                        <label for=" {{ $schedule->name }} ">Viernes</label>
                                    </div>
                                    @endif
                                @endforeach                     

                            </div>
                    </div>

                    <div class="col-md-6 col-xs-12 hours_table">

                    </div>
                    
                </div>

                <div class="bookingModal text-center">                   
                    <img src="/images/loading.gif" id="loading-indicator" style="display:none" />
                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-dialog-center modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Resumen de Reservas</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="booking_msg">
                                    </div>
                                    <p class="text-warning"><small>Es importante que te presentes en la fecha y hora indicada.</small></p>
                                </div>
                                <div class="modal-footer">

                                    <div class="row-spacer"> 
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> 
                                           <button type="button" class="btn btn-default" onClick="history.go(0)" value="Refresh" data-dismiss="modal">Nueva Reserva</button> 
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top:20px;"> 
                                            <form action="{{ URL::to('index') }}">
                                                    <button type="submit" class="btn btn-primary"> Aceptar</button>
                                            </form>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div align="center">
                        <button type="submit" class="btn btn-primary btn-raised booking" onclick="saveBookings()">Apartar</button>

                        <form action="{{ URL::to('index') }}">
                                <button type="submit" class="btn btn-danger"> Cancelar</button>
                        </form>
                </div>

            </div>

        </div>
    </div>




</div>



@stop