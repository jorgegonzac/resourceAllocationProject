<!-- ARCHIVO PARA SCRIPTS JQUERY E INCLUDES DE BOOTSTRAP ETC ETC -->
<link rel="icon" href="favicon.jpg"/>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- CSS are placed here -->
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap-theme.css') }}
{{ HTML::style('css/component.css')}}
{{ HTML::style('css/demo.css')}}
{{ HTML::style('css/normalize.css')}}
{{ HTML::style('css/styles.css')}}
{{ HTML::style('css/material-fullpalette.css')}}
{{ HTML::style('css/material.css')}}
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

<!-- {{ HTML::style('css/bootstrap.min.css')}} -->

<!-- JS are placed here -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
{{ HTML::script('js/jquery.dataTables.min.js') }}
{{ HTML::script('js/hovers.js') }}
{{ HTML::script('js/snap.svg-min.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/bootstrap.min.js') }}


<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<script type="text/javascript"> 
	function display_c(){
		var refresh=1000; // Refresh rate in milli seconds
		mytime=setTimeout('display_ct()',refresh)
	}

	function display_ct() {
		var strcount
		var x = new Date()
		document.getElementById('ct').innerHTML = x;
		tt=display_c();
	}



</script>


<script>

	
function showStudentInfo(){

		$.get('../../account', function(data){
			$.get('../../activeBookings', function(data2){
				$.get('../../activeWaiting', function(data3){
				console.log(data);
				console.log(data2);
				console.log(data3);
	            $('.userInfo').empty();
	            $('.userInfo').append(data);
	            $('.activeBook').empty();
	            $('.activeBook').append(data2);
	            $('.activeWait').empty();
	            $('.activeWait').append(data3);
	            $("#userModal").modal('show');
	            });
            });
        });
 }


	$(document).ready(function(){
	    $('#myTable').dataTable();
	});
	$(document).ready(function(){
		$('#selectLaboratory').on('change', function(){
			var id = $(this).val();
			var returnResources = 1;
			var returnAll = 0;
			if (id == 0){
				returnAll = 1;
			}
			$.post('../index',{ id : id, returnResources : returnResources, returnAll : returnAll }).done(function(data){
				console.log(data);
				$('.clearfix').empty();
				$('.clearfix').append('');
				$.each(data, function(key, value){
		    		$(".clearfix").append("<a href=\"{{ URL::to('index/ " + value.id + " /showBookingForm') }}\"data-path-hover=\"M 0,0 0,38 90,58 180.5,38 180,0 z\"><figure><img src=\""+value.image+"\"style=\"width:250px;height:437px\" /><svg viewBox=\"0 0 180 320\" preserveAspectRatio=\"none\"><path d=\"M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z \"/></svg><figcaption><h2>"+value.name+"</h2><p>"+value.description+"</p></figcaption><button>Apartar</button></figure></a>");
		    	});
		    	$('.clearfix').append('');
			});
		});
	});





	$(document).ready(function(){
		$('#selectTimetable').on('change', function(){
			var id = $(this).val();
			$.post('assign',{ id : id }).done(function(data){
				console.log(data);
				if (data[0].length === 0){
					$('.assigned_schedules').empty();
					$('.assigned_schedules').append('<h4 class="error">*Este calendario no tiene ningún horario asignado.</h4><h3>Selecciona alguno de los que se proporcionan a continuación:</h3>');
					if(data[1].length === 0){
						$('.unassigned_schedules').append('<h4 class="error">*No hay ningún calendario dado de alta.</h4>');
					}else{
						$('#selectSchedule').empty();
						$('#selectSchedule').append('<option selected disabled>Selecciona un horario a asignar</option>');
						$('#selectSchedule').show();
						$.each(data[1], function(key, value){
							$('#selectSchedule').append($("<option></option>").attr("value",value.id).text(value.name)); 
						});	
					}
				}else{
					$('.assigned_schedules').empty();
					//Append header
					$('.assigned_schedules').append('<div class=' + '"row"' + '><div class=' + '"col-lg-1"' + '>ID</div><div class=' + '"col-lg-2"' + '>Nombre</div><div class=' + '"col-lg-2"' + '>Día de la semana</div><div class='+'"col-lg-2"'+'>Hora de Inicio</div><div class='+'"col-lg-2"'+'>Hora de Fin</div><div class='+'"col-lg-1"'+'>Acciones</div></div>');
					$.each(data[0], function(key, value){
						//Append body
						$('.assigned_schedules').append('<div class=' +'"row"'+'><div class='+'"col-lg-1"'+'>'+value.id+'</div><div class='+'"col-lg-2"'+'>'+value.name+'</div><div class='+'"col-lg-2"'+'>'+value.weekday+'</div><div class='+'"col-lg-2"'+'>'+value.start_hour+'</div><div class='+'"col-lg-2"'+'>'+value.end_hour+'</div><div class='+'"col-lg-1"'+'><a href=""><p>Desasignar</p></a></div></div>');
					});
					//Validar que haya disponibles
					$('#selectSchedule').empty();
					$('#selectSchedule').append('<option selected disabled>Selecciona un horario a asignar</option>');
					$('#selectSchedule').show();
					$.each(data[1], function(key, value){
						$('#selectSchedule').append($("<option></option>").attr("value",value.id).text(value.name)); 
					});
				}	
			});
		});
	});

		

</script>

<script>

	$(document).ready(function() {
	    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
	        e.preventDefault();
	        $(this).siblings('a.active').removeClass("active");
	        $(this).addClass("active");
	        var index = $(this).index();
	        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
	        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
	    });
	});

</script>

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

	




