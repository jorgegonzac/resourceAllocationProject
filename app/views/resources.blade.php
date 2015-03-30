@extends('layouts.userslayout')
@section('content')
<<<<<<< HEAD
	<!-- NAVEGACIÓN DEL USUARIO
		1.- SELECT DE LOS LABORATORIOS (CON BASE DE DATOS)
		2.- SEARCH BAR
	-->
	<div class="row">
		<!-- SELECT LABS -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 ">
			<select id="selectLaboratory" class="btn btn-primary form-control">
				<option value="100">Todos Los Laboratorios</option>
     			@foreach($laboratories as $laboratory)
     			<option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
     			@endforeach
			</select>
		</div>
		<!-- SEARCH BAR -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			{{ Form::open() }}
				{{ Form::text('searchbar', null, array('class' => 'search-query span2', 'placeholder' => 'Search', 'id' => 'searchBar')) }}
			{{ Form::close() }}
		</div>
	</div>
	
=======
	<div class="row">
>>>>>>> develop
		<div class="resources">
			<section id="grid" class="grid clearfix">
			<h1>RECENT RESOURCES</h1>
			@foreach( $recentBookings as $recentBooking)

					
					<a href="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
						<figure>
							<img src="{{$recentBooking->image}}" style="width:250px;height:437px" />
							<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
							<figcaption>
								<h2>{{$recentBooking->name}}</h2>
								<p>{{$recentBooking->description}}</p>
								<button>View</button>
							</figcaption>
						</figure>
					</a>
					
				<!-- <div class="col-sm-6 col-md-3">
					<div class="panel panel-default panel-card">
	                    <div class="panel-heading"> -->
	                       <!--  <img src="{{$recentBooking->image}}" style="width:200px;height:228px"/> -->
	                      <!--   <button class="btn btn-primary btn-sm" role="button">Apartar</button>
	                    </div>
	                     <div class="panel-figure">
                        <img class="img-responsive img-circle" src="{{$recentBooking->image}}" style="width:150px;height:150px" />
                    	</div>
	                    <div class="panel-body text-center">
	                        <h4 class="panel-header">
	                        	<a href="">
	                        		{{$recentBooking->name}}
	                        	</a>
	                        </h4>
	                        <small>{{$recentBooking->description}}</small>
	                    </div>
	                    <div class="panel-thumbnails">
	                        <div class="row">
	                            <div class="col-xs-4">
	                            	<img src="{{$recentBooking->image}}" style="width:200px;height:228px"/>
	                            </div>
	                        </div>
	                    </div>
                	</div>
				</div> -->
			
			@endforeach
			</section>
		</div>
		<script>
			(function() {
	
				function init() {
					var speed = 300,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
@stop