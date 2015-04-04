<!-- ARCHIVO PARA SCRIPTS JQUERY E INCLUDES DE BOOTSTRAP ETC ETC -->
<link rel="icon" href="favicon.jpg"/>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- CSS are placed here -->

{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.css') }}
{{ HTML::style('css/styles.css')}}
{{ HTML::style('css/material-fullpalette.css')}}
{{ HTML::style('css/material.css')}}
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>

<!-- JS are placed here -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

{{ HTML::script('js/jquery.dataTables.min.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

<!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>