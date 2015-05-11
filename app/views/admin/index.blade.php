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

		<div class="row">
		  <div class="col-xs-12">
		  	<h3 align="center">Recursos más usados</h3>
		  	<div class="sample shadow-z-2">
		  		
		  		<canvas id = "mostUsed" ></canvas>
		  	</div>
		 </div>


	
		  <br><br>

		  
		  <div class="row">
		  <div class="col-xs-12">
		  	<h3 align="center">Usuarios más activos</h3>
		  	<div class="sample shadow-z-2">
		  	
		  		<canvas id = "mostUser"  ></canvas>
		  	</div>
		  </div>
		</div>

		<br><br>

		<div class="row">
		  <div class="col-xs-12">
		  	<h3 align="center">Reservaciones por mes</h3>
		  	<div class="sample shadow-z-2">
		  		
		  		<canvas id = "mostMonth"></canvas>
		  	</div>
		  </div>
		 
		</div>

		<br><br>

		<div class="row">
		  <div class="col-xs-12">
		  	<h3 align="center">Reservaciones por día</h3>
		  	<div class="sample shadow-z-2">
		  		
		  		<canvas id = "mostDay"></canvas>
		  	</div>
		  </div>
		 
		</div>
		
		
		<script >

			(function(){
				var ctx = document.getElementById('mostUsed').getContext('2d');
				var ctx1 = document.getElementById('mostUser').getContext('2d');
				var ctx2 = document.getElementById('mostMonth').getContext('2d');
				var ctx3 = document.getElementById('mostDay').getContext('2d');

				Chart.defaults.global.responsive = true;

				var chartResources = {

					labels:{{json_encode($resource)}},

					datasets:[{

						data:{{json_encode($total)}}

					}]

				};

				var chartUsers = {

					labels:{{json_encode($userName)}},

					datasets:[{

						data:{{json_encode($userCount)}}

					}]

				};

				var chartMonth = {

					labels: {{json_encode($month)}},

					datasets:[{

						data:{{json_encode($monthCount)}}

					}]

				};

				var chartDay = {

					labels: ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],

					datasets:[{

						data:{{json_encode($dayCount)}}

					}]

				};

				new Chart(ctx).Bar(chartResources);
				new Chart(ctx1).Bar(chartUsers);
				new Chart(ctx2).Line(chartMonth);
				new Chart(ctx3).Bar(chartDay);

				


			})();


		</script>

	@endif

	
</div>

</div>




@stop

