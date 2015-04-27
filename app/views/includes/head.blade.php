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
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

{{ HTML::script('js/hovers.js') }}
{{ HTML::script('js/snap.svg-min.js') }}
{{ HTML::script('js/jquery.dataTables.min.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/bootstrap.min.js') }}


<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script>
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
			
			$.ajax({
				url: "../lab",
				type: 'get',
				cache: false,
				data: { 'id' : id, 'returnResources' : returnResources, 'returnAll' : returnAll },
				datatype: 'html',
				success: function(data){
					$('.resources').html(data);
				}
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
	$(document).ready(function(){
		$("div.search_bar_user").click(function(e){
			alert();
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
