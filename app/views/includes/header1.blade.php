<!-- HEADER FOR INDEX AND LAB VIEW -->

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
					<option value="100">Todos Los Laboratorios</option>
		   			@foreach($laboratories as $laboratory)
			   			<option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
		   			@endforeach
				</select>

			</ul>


			<ul class="nav navbar-nav navbar-right">

				<li>
					<br>
					<div class".search_bar_user">
						<form action="" class="search-form">
			                <div class="form-group has-feedback">
			            		<label for="search" class="sr-only">Search</label>
			            		<input type="text" class="form-control" name="search" id="search" placeholder="    Buscar">
			              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
			            	</div>
		            	</form>
		            </div>
		           

	            </li>


	            <!-- <li class="dropdown">

	            	<a href="#" id="selectLaboratory" class="dropdown-toggle" data-toggle="dropdown">Themes <b class="caret"></b></a>

	            	<ul class="dropdown-menu">

	            		<li><a href=""><option value="100">Todos Los Laboratorios</option></a></li>
		   			@foreach($laboratories as $laboratory)
			   			<li><a href=""><option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option></a></li>
		   			@endforeach




	            	</ul>



	            </li>
 -->

	            <li>
	            	<a href="../../index"><i class="fa fa-home fa-2x" style="color:white"></i></a>
	            </li>
	            <li>
	            	<a href="#" onclick="showStudentInfo()"><i class="fa fa-user fa-2x" style="color:white"></i></a>
	            </li>
	            <li>
	            	<a href="../../logout"><i class="fa fa-power-off fa-2x" style="color:white"></i></a>
	            </li>

			</ul>


		</div>


	</div>

</div>

	<!-- Modal -->
	<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
	  <div class="modal-dialog modal-dialog-center modal-lg">
	    <div class="modal-content">
	    	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title">Información del usuario</h2>
                <span id='ct'></span>

            </div>
	        <br>
	        <div class="bs-example bs-example-tabs">
	            <ul id="myTab" class="nav nav-tabs">
	              <li class="active"><a href="#account" data-toggle="tab">Cuenta de Usuario</a></li>
	              <li class=""><a href="#bookings" data-toggle="tab">Reservaciones Activas</a></li>
	              <li class=""><a href="#waiting" data-toggle="tab">Lista de Espera</a></li>
	            </ul>
        	</div>
	      
	    	<div class="modal-body">
		    	<div id="myTabContent" class="tab-content">
		    			<!-- ACCOUNT USER INFO -->
				        <div class="tab-pane fade active in" id="account">
				        	<div class="userInfo"></div>
				        	<center>
							    <button type="button" class="btn btn-primary">Guardar</button>
						    </center>
			        	</div>

			        	<!-- ACTIVE BOOKINGS -->

			        	<div class="tab-pane fade" id="bookings">
				        	<div class="activeBook"></div>
			        	</div>
						<!-- ACTIVE waiting list -->
			        	<div class="tab-pane fade" id="waiting">
				        	<div class="activeWait"></div>
			        	</div>
		        	
		    	
		    	</div>
			  	<div class="modal-footer">
	      		</div>
	    	</div>
	  </div>
	</div>
</div>





