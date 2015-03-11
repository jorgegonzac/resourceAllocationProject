<!-- ARCHIVO PARA SCRIPTS JQUERY E INCLUDES DE BOOTSTRAP ETC ETC -->
<link rel="icon" href="favicon.jpg"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!-- CSS are placed here -->
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap-theme.css') }}
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script>
	$(document).ready(function(){
		$('#selectLaboratory').on('click', function(){
			var id = $(this).val();
			var returnResources = 1;
			var returnAll = 0;
			if (id >= 100){
				returnAll = 1;
			}
			$.post('/',{ id : id, returnResources : returnResources, returnAll : returnAll }).done(function(data){
				console.log(data);
				$('.resources').empty();
				$('.resources').append('<br><br>');
				$.each(data, function(key, value){
		    		$(".resources").append('<div class="col-md-4"><h1><a href=' + '""' + '><p>' + value.name + '</p> <img src="'+ value.image + '" alt="'+ value.name +'" style="width:304px;height:228px"></a></h1>');
		    	});
			});
		});
	});
</script>