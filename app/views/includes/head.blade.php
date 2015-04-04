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

<!-- JS are placed here -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

{{ HTML::script('js/hovers.js') }}
{{ HTML::script('js/snap.svg-min.js') }}
{{ HTML::script('js/bootstrap.js') }}




<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script>
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
				$('.resources').empty();
				$('.resources').append('<section id="grid" class="grid clearfix">');
				$.each(data, function(key, value){
		    		$(".resources").append("<a href='{{ URL::to('index/ " + value.id + " /showBookingForm') }}' "+'data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z"><figure><img src="'+value.image+'" style="width:250px;height:437px" /><svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg><figcaption><h2>'+value.name+'</h2><p>'+value.description+'</p></figcaption><button>Apartar</button></figure></a>');
		    	});
		    	$('.resources').append('</section>');
			});
		});
	});


	$(document).ready(function(){
		$('#selectTimetable').on('change', function(){
			var id = $(this).val();
			$.post('assign',{ id : id }).done(function(data){
				if (data[0].length === 0){
					$('.assigned_schedules').empty();
					$('.assigned_schedules').append('<h4 class="error">*Este calendario no tiene ningún horario asignado.</h4><h3>Selecciona alguno de los que se proporcionan a continuación:</h3>');
				}else{
					$('.assigned_schedules').empty();
					//Append header
					$('.assigned_schedules').append('<div class=' + '"row"' + '><div class=' + '"col-lg-1"' + '>ID</div><div class=' + '"col-lg-2"' + '>Nombre</div><div class=' + '"col-lg-2"' + '>Día de la semana</div><div class='+'"col-lg-2"'+'>Hora de Inicio</div><div class='+'"col-lg-2"'+'>Hora de Fin</div><div class='+'"col-lg-1"'+'>Acciones</div></div>');
					$.each(data[0], function(key, value){
						//Append body
						$('.assigned_schedules').append('<div class=' +'"row"'+'><div class='+'"col-lg-1"'+'>'+value.id+'</div><div class='+'"col-lg-2"'+'>'+value.name+'</div><div class='+'"col-lg-2"'+'>'+value.weekday+'</div><div class='+'"col-lg-2"'+'>'+value.start_hour+'</div><div class='+'"col-lg-2"'+'>'+value.end_hour+'</div><div class='+'"col-lg-1"'+'><a href=""><p>Desasignar</p></a></div></div>');
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






