<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

	<div class="container">

		<div class="navbar-header">

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			</button>	
			<a class="navbar-brand" href="#"><img src="/images/logotec.png" style="width:40px;height:40px"/></a>
		</div>	

		<div class="navbar-collapse collapse">

			<ul class="nav navbar-nav navbar-left">
				<br>
				<select id="selectLaboratory" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<option value="-1" selected disabled>Selecciona una opción</option>
					<option value="0"> Todos Los Laboratorios</option>
		   			@foreach($laboratories as $laboratory)
			   			<option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
		   			@endforeach
				</select>

			</ul>


			<ul class="nav navbar-nav navbar-right">

				<li>
					<br>
					<div class".search_bar_user">
						<form method="get" action="../../search" class="search-form">
			                <div class="form-group has-feedback">
			            		<label for="label" class="sr-only">Search</label>
			            		<input type="text" class="form-control" name="label" id="label" placeholder="    Buscar">
			              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
			            	</div>
		            	</form>
		            </div>
		           

	            </li>


	            <li>
	            	<a href="../../index"><i class="fa fa-home fa-3x" style="color:white"></i></a>
	            </li>
	            <li>
	            	<a href="../index"><i class="fa fa-user fa-3x" style="color:white"></i></a>
	            </li>
	            <li>
	            	<a href="../../logout"><i class="fa fa-power-off fa-3x" style="color:white"></i></a>
	            </li>

			</ul>


		</div>


	</div>

</div>