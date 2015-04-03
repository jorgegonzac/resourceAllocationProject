<!-- HEADER PARA ADMIN LOGO / SEARCH / HOME / LOGOUT -->
<div class="row bg_gris_admin">
	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">		<!--LOGO TEC-->
		<a href="">
			<p class="logo_header_admin">LOGOTIPO</p>
		</a>
	</div> 	
	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"></div> 		<!--ESPACIO BLANCO-->
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 padding_header">		<!--SEARCH BAR-->
		{{ Form::open() }}
			{{ Form::text('searchbar', null, array('class' => 'search_bar_admin', 'placeholder' => 'Search', 'id' => 'searchBar')) }}
		{{ Form::close() }}
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!-- HOME -->
		<a href="admin">
			<p class="home_header_admin">HOME</p>
		</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--  LOGOUT  -->
		<a href="logout">
			<p class="logout_header_admin">LOGOUT</p>
		</a>
	</div>
</div>