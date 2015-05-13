@extends('layouts.adminlayout')
@section('content')
<div margin="30">
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Bienvenido</h2> </div>
	</div>
	@if(Session::get('super')==1)
		<h4>Super Usuario</h4>

	@else

		<h4>Administrador del {{ Session::get('lab_name') }} </h4>

	@endif

	


</div>




@stop

