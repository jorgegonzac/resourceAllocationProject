@extends('layouts.adminlayout')
@section('content')

<style>
.cont{


	padding-left:300px;
}

</style>
<div class="cont"><h2>Bienvenido</h2> 
	@if(Session::get('super')==1)
		<h4>Super Usuario</h4>
	@else
		<h4>Administrador del {{ Session::get('lab_name') }} </h4>
		@foreach( $resource as $r)

			<p>{{$r}}</p>		
			
		@endforeach
		@foreach( $total as $t)

			<p>{{$t}}</p>		
			
		@endforeach
	@endif

	<canvas id = "mostUsed" width = "600" height="300" ></canvas>

</div>
@stop

