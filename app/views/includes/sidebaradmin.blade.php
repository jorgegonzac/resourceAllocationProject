
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	<div class="nav-side-menu">
	    <div class="brand"><img src="../../images/logotec.png" style="width:30px;height:30px"/>                Nombre de Lab</div>
	    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	  
	        <div class="menu-list">
	  
	            <ul id="menu-content" class="menu-content collapse out">
	            	<!-- Inicio/dashboard -->
	                <li>
	                  <a href="../../admin">
	                  <i class="fa fa-dashboard fa-lg"></i>Inicio
	                  </a>
	                </li>
	<!-- usuarios -->

	                 <li>
	                  <a href="../../users">
	                  <i class="fa fa-users fa-lg"></i>Usuarios
	                  </a>
	                </li>
	<!-- labs -->

	                 <li>
	                  <a href="../../laboratories">
	                  <i class="fa fa-flask fa-lg"></i>Laboratorios
	                  </a>
	                  </li>
	<!-- categorias -->

	                <li>
	                  <a href="../../categories">
	                  <i class="fa fa-tags fa-lg"></i>Categorias
	                  </a>
	                </li>
	<!-- Recursos -->

	                <li>
	                  <a href="../../resources">
	                  <i class="fa fa-book fa-lg"></i>Recursos
	                  </a>
	                </li>
	<!-- calendarios -->
	                <li>
	                  <a href="../../timetables">
	                  <i class="fa fa-calendar fa-lg"></i>Calendarios
	                  </a>
	                </li>
	<!-- Horarios -->

	                <li>
	                  <a href="../../schedules">
	                  <i class="fa fa-clock-o fa-lg"></i>Horarios
	                  </a>
	                </li>
	<!-- Reservaciones -->
	                <li>
	                  <a href="../../bookings">
	                  <i class="fa fa-shopping-cart fa-lg"></i>Reservaciones
	                  </a>
	                </li>
	<!-- Lista de espera -->

	                <li>
	                  <a href="../../waitinglists">
	                  <i class="fa fa-list-alt fa-lg"></i>Lista de espera
	                  </a>
	                </li>
	<!-- logout -->
	                <li>
		            	<a href="logout"><i class="fa fa-power-off fa-lg"></i>Salir
		            	</a>
		            </li>
	            </ul>
	     </div>
	</div>
</div>



<!-- <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	<ul class="sidebar_admin">
		<a href="admin">
			<li>Inicio</li>
		</a>
		<a href="../../users">
			<li>Usuarios</li>
		</a>
		<a href="../../laboratories">
			<li>Laboratorios</li>
		</a>
		<a href="../../categories">
			<li>Categorias</li>
		</a>
		<a href="../../resources">
			<li>Recursos</li>
		</a>
		<a href="../../timetables">
			<li>Calendarios</li>
		</a>
		<a href="../../schedules">
			<li>Horarios</li>
		</a>
		<a href="../../bookings">
			<li>Reservaciones</li>
		</a>
		<a href="../../waitinglists">
			<li>Listas de Espera</li>
		</a>
	</ul>
</div> -->
@yield('content')
