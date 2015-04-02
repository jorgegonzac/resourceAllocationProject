<!-- HEADER PARA USUARIOS LOGO / LABORATORIOS / SEARCH / HOME / USER INTERFACE / LOGOUT -->
<nav class="row bg_gris">
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--LOGO TEC-->
		<a href="">
			<p class="logo_header"><img src="images/logotec.png" style="width:45px;height:45px"/></p>
		</a>
	</div> 	
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4  padding_header">		<!--SELECT LABS-->
		<select id="selectLaboratory" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<option value="100">Todos Los Laboratorios</option>
   			@foreach($laboratories as $laboratory)
	   			<option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
   			@endforeach
		</select>

	</div> 	
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 padding_header">		<!--SEARCH BAR-->
		<div class="search_bar_user">
			<!-- search box -->
	        <div class="col-md-4 col-md-offset-3">
	            <form action="" class="search-form">
	                <div class="form-group has-feedback">
	            		<label for="search" class="sr-only">Search</label>
	            		<input type="text" class="form-control" name="search" id="search" placeholder="    Buscar">
	              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
	            	</div>
	            </form>
	        </div>
	        <!-- end searchbox -->
	    </div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!-- HOME -->
		<a href="inicio">
			<p class="home_header"><i class="fa fa-home fa-2x" style="color:white"></i></p>
		</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--USER ACCOUNT (MODAL)-->
		<a href="">
			<p class="account_header"><i class="fa fa-user fa-2x" style="color:white"></i></p>
		</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--  LOGOUT  -->
		<a href="logout">
			<p class="logout_header"><i class="fa fa-power-off fa-2x" style="color:white"></i></p>
		</a>
	</div>
</nav>