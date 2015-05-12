@extends('layouts.adminlayout')
@section('content')
<div margin="30">
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6"> <h2>Bienvenido</h2> </div>
	</div>
	@if(Session::get('super')==1)
		<h4>Super Usuario</h4>

		<div class="row">
			<div class="col-xs-12">
		  		<h3 align="center">Recursos más usados</h3>
		  		<div class="sample shadow-z-2">
		  			<canvas id = "mostUsedSuper"></canvas>
		  		</div>
		  	</div>

		  	<br>

		  	<div class="col-xs-12">
		  		<h3 align="center">Categorias usadas</h3>
		  		<div class="sample shadow-z-2">
		  			<canvas id = "categoriesUsed" ></canvas>
		  		</div>
		  	</div>

		  	<br>

		  	<div class="col-xs-12">
		  		<h3 align="center">Reservas por usuario</h3>
		  		<div class="sample shadow-z-2">
		  			<canvas id = "userUsed" ></canvas>
		  		</div>
		  	</div>
		  	<br>

		  	<div class="col-xs-12">
		  		<h3 align="center">Reservas por mes</h3>
		  		<div class="sample shadow-z-2">
		  			<canvas id = "monthSup" ></canvas>
		  		</div>
		  	</div>

		  	<br>

			<div class="col-xs-12">
		  		<h3 align="center">Reservas por día</h3>
		  		<div class="sample shadow-z-2">
		  			<canvas id = "daySup" ></canvas>
		  		</div>
		  	</div>

			<script>
			  	(function(){
					var ctx4 = document.getElementById('mostUsedSuper').getContext('2d');
					var ctx5 = document.getElementById('categoriesUsed').getContext('2d');
					var ctx6 = document.getElementById('userUsed').getContext('2d');
					var ctx7 = document.getElementById('monthSup').getContext('2d');
					var ctx8 = document.getElementById('daySup').getContext('2d');

					Chart.defaults.global.responsive = true;

					var chartResourcesSuper = {
						labels:{{json_encode($resourceSuper)}},

						datasets:[{
							fillColor: "#66C2FF",
							data:{{json_encode($totalSuper)}}
						}]

					};

					var chartCategory = {
						labels:{{json_encode($category)}},

						datasets:[{
							fillColor: "#66C2FF",
							data:{{json_encode($totalCat)}}
						}]
					};

					var chartUserSuper = {
						labels:{{json_encode($userSuper)}},
						
						datasets:[{
							fillColor: "#66C2FF",
							data:{{json_encode($totalUser)}}
						}]
					};

					var chartMonthSup = {
						labels: {{json_encode($monthSuper)}},

						datasets:[{
							fillColor: "#66C2FF",
							scaleBackdropPaddingY : 9,
							tooltipYPadding: 6,
							 strokeColor: "#0066FF",
							 pointColor: "",
							data:{{json_encode($totalmonthSup)}}
						}]
					};

					var chartDaySup = {
						labels: ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],

						datasets:[{
							fillColor: "#66C2FF",
							data:{{json_encode($totalDay)}}


						}]

					};

					new Chart(ctx4).Bar(chartResourcesSuper);
					new Chart(ctx5).Line(chartCategory);
					new Chart(ctx6).Bar(chartUserSuper);
					new Chart(ctx7).Line(chartMonthSup);
					new Chart(ctx8).Bar(chartDaySup);

				})();

			</script>

		</div>


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

		  
		
		  <div class="col-xs-12">
		  	<h3 align="center">Usuarios más activos</h3>
		  	<div class="sample shadow-z-2">
		  	
		  		<canvas id = "mostUser"  ></canvas>
		  	</div>
		  </div>
		

		<br><br>

		  <div class="col-xs-12">
		  	<h3 align="center">Reservaciones por mes</h3>
		  	<div class="sample shadow-z-2" margin="30px">
		  		
		  		<canvas id = "mostMonth"></canvas>
		  	</div>
		  </div>
		 


		<br><br>

		
		  <div class="col-xs-12">
		  	<h3 align="center">Reservaciones por día</h3>
		  	<div class="sample shadow-z-2">
		  		
		  		<canvas id = "mostDay"></canvas>
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
						fillColor: "#66C2FF",
						data:{{json_encode($total)}}
						

					}]

				};

				var chartUsers = {

					labels:{{json_encode($userName)}},

					datasets:[{

						fillColor: "#66C2FF",

						data:{{json_encode($userCount)}}

					}]

				};

				var chartMonth = {

					labels: {{json_encode($month)}},

					datasets:[{
						fillColor: "#66C2FF",
						scaleBackdropPaddingY : 9,
						tooltipYPadding: 6,
						 strokeColor: "#0066FF",
						 pointColor: "",
						data:{{json_encode($monthCount)}}

					}]

				};

				var chartDay = {

					labels: ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],

					datasets:[{
						fillColor: "#66C2FF",

						data:{{json_encode($dayCount)}}


					}]

				};

				new Chart(ctx).Bar(chartResources);
				new Chart(ctx1).Bar(chartUsers);
				new Chart(ctx2).Line(chartMonth);
				new Chart(ctx3).Line(chartDay);

			})();


		</script>
	</div>

	@endif

	


</div>




@stop

