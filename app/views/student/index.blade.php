@extends('layouts.userslayout')
@section('content')

	<!-- <div class="row"> -->


		<div class="resources">
			<section id="grid" class="grid clearfix">
			<h2> {{ $msg }}</h2>
			@foreach( $bookings as $booking)
					<a  href="{{ URL::to('index/' . $booking->id . '/showBookingForm') }}" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
						{{ Form::hidden('id', $booking->id) }}
						<figure>
							<img src="{{$booking->image}}" style="width:250px;height:437px" />
							<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
							<figcaption>
								<h2>{{$booking->name}}</h2>
								<p>{{$booking->description}}</p>
							</figcaption>
							<button>Apartar</button>
						</figure>
					</a>
			
			@endforeach
				</section>


		</div>


		
	
	
 	<script type="text/javascript">


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
	
		</div>
		</section>

@stop