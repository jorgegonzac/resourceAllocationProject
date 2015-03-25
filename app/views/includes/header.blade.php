<!-- HEADER PARA USUARIOS LOGO / LABORATORIOS / SEARCH / HOME / USER INTERFACE / LOGOUT -->
<div class="row bg_gris">
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--LOGO TEC-->
		<a href="">
			<p class="logo_header">LOGOTIPO</p>
		</a>
	</div> 	
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4  padding_header">		<!--SELECT LABS-->
		<select id="selectLaboratory" class="btn btn-primary form-control">
			<option value="100">Todos Los Laboratorios</option>
   			@foreach($laboratories as $laboratory)
	   			<option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
   			@endforeach
		</select>
	</div> 	
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 padding_header">		<!--SEARCH BAR-->
		{{ Form::open() }}
			{{ Form::text('searchbar', null, array('class' => 'search_bar_user', 'placeholder' => 'Search', 'id' => 'searchBar')) }}
		{{ Form::close() }}
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!-- HOME -->
		<a href="">
			<p class="home_header">HOME</p>
		</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--USER ACCOUNT (MODAL)-->
		<a href="">
			<p class="account_header">ACCOUNT</p>
		</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">		<!--  LOGOUT  -->
		<a href="logout">
			<p class="logout_header">LOGOUT</p>
		</a>
	</div>
</div>