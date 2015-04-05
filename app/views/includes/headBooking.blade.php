<!-- ARCHIVO PARA SCRIPTS JQUERY E INCLUDES DE BOOTSTRAP ETC ETC -->
<link rel="icon" href="favicon.jpg"/>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- CSS are placed here -->
{{ HTML::style('css/bootstrap.css') }}
{{ HTML::style('css/bootstrap-theme.css') }}
{{ HTML::style('css/styles.css')}}
{{ HTML::style('css/material-fullpalette.css')}}
{{ HTML::style('css/material.css')}}


<!-- JS are placed here -->

{{ HTML::script('js/hovers.js') }}
{{ HTML::script('js/snap.svg-min.js') }}

<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<script>

	function validateMaxChecks(check){
		 chk_arr =  document.getElementsByName('time_checkbox[]');
		 chklength = chk_arr.length;             
		 cum_checked = 0;
		for(k=0;k< chklength;k++)
		{
		    if(chk_arr[k].checked){
		    	cum_checked++;
		    	if(cum_checked > 3){
			    	check.checked = false;
			    	alert("Error: No puede seleccionar tres horarios consecutivos.");
			    	break;
		    	}
		    }else{
		    	cum_checked = 0;
		    }		    
		    
		} 
	}
	function saveBookings(){
		chk_arr =  document.getElementsByName('time_checkbox[]');
		chklength = chk_arr.length;       
		unselected = 1;      
		var array_schedules = new Array();
		for(k=0;k< chklength;k++){
			if(chk_arr[k].checked){
				unselected = 0;
				console.log(chk_arr[k].value);
				array_schedules[array_schedules.length] = chk_arr[k].value;
			}
		}
		if(unselected == 1){
			alert("Error: Seleccione primero un horario. ");
			return;
		}

		resource_id = '{{$resource->id}}';
		// save the bookings
        $.post('../../booking', { schedules: array_schedules, resource_id: resource_id }).done(function(data){
            $('.booking_msg').empty();
            $('.booking_msg').append(data);
            $("#myModal").modal('show');
        });


	}	


	$(document).ready(function(){
		$("input[name='weekday']").click(function(){
				var radio_id = $(this).attr('id');

			$("div.hours_table").html(function(){

				var header = "<h3 id= 'type' align='center'>2. Selecciona el horario...</h3>";
    			var	start_hour;
    			var end_hour;
    			var weekday;
    			var boddy;

                @foreach($timetables[0]->schedules as $key=> $schedule)
                	var schedule_name = " {{$schedule->name}} " ;
                	if(	schedule_name == radio_id ){
                		start_hour = " {{$schedule->start_hour}} ";
                		end_hour = " {{$schedule->end_hour}} ";
                		weekday = " {{$schedule->weekday}} ";
                	}
                @endforeach

             	//var today = new Date();
             	var today = new Date('2015-04-03 10:30:00');
             	var today_date = today.toDateString();
             	var day = today.getDay();	 //today's day

				var dd = today.getDate();
				var mm = today.getMonth()+1; //January is 0!
				var yyyy = today.getFullYear();

				if(dd<10) {
				    dd='0'+dd
				} 

				if(mm<10) {
				    mm='0'+mm
				} 
				//today's date
				today = yyyy+'-'+mm+'-'+dd;

             	/*	Generate the schedules in the view	*/
             	var start_date = new Date(today_date+start_hour);
             	var end_date = new Date(today_date+end_hour);
             	var aux_date = new Date(start_date);
             	weekday = weekday.toLowerCase();
             	weekday = weekday.substring(1,weekday.length-1);

             	var aux_day; //weekday's day
             	if(weekday.toString() == new String("lunes")){
             		aux_day = 1;
             	}else if(weekday.toString() == new String("martes")){
             		aux_day = 2;             		
             	}else if(weekday.toString() == new String("miercoles")){
             		aux_day = 3;             		
             	}else if(weekday.toString() == new String("jueves")){
             		aux_day = 4;             		
             	}else if(weekday.toString() == new String("viernes")){
             		aux_day = 5;             		
             	}
             	//compare days to know if the user can book on this weekday
             	if(aux_day < day)
             	{
             			boddy = "<h3 style='color:red'>Seleccione un día valido.</h3>"
             	}else{

             		var diff_days = day - aux_day; 
             		var this_day = new Date();
             		//add diff_days to today's date to calculate the booking day date
             		this_day.setDate( this_day.getDate() + diff_days);

             		boddy = " <div class='timetable'> <table class='table table-striped table-hover '>  <tbody>";
             		var booking_start_date;
             		var booking_end_date;
             		var this_day_format;
             		
             		var this_day_dd 	= this_day.getDate();
					var this_day_mm 	= this_day.getMonth()+1; //January is 0!
					var this_day_yyyy 	= this_day.getFullYear();
					var this_day_hh		= this_day.toTimeString();

					if(this_day_dd<10) {
					    this_day_dd='0'+this_day_dd
					} 

					if(this_day_mm<10) {
					    this_day_mm='0'+this_day_mm
					} 
					this_day_format = this_day_yyyy + "-" + this_day_mm + "-"+this_day_dd;
					this_day_hh		= this_day_hh.split(" ");
					this_day_format = this_day_format + " " + this_day_hh[0]; // here i save the actual date with format
					var invalid_hours = 0;
					var hours_ranges = 0;
	             	while(aux_date < end_date){
	             		hours_ranges++;
	             		//calculate interval
		             	var aux_date_2 = new Date(aux_date);  //top interval
		             	aux_date.setMinutes( aux_date.getMinutes() + 30 );    //bottom interval       		
	             		var start_hour_split = aux_date_2.toTimeString().split(" ");
	             		var end_hour_split = aux_date.toTimeString().split(" ");


	             		//Validate if there is a booking on that date
	             		var invalid_date = 0;	//0  if its valid, 1 if its invalid because booking and 2 if its invalide because actual hour
						var obj_start_date	= new Date(aux_date_2);
						var obj_end_date	= new Date(aux_date);
//						var obj_actual_date = new Date(this_day_format);
						var obj_actual_date = new Date('2015-04-03 10:30:00');

	             		@foreach($bookings as $key=> $booking)	
				            booking_start_date  = "{{ $booking->start_date }}";
				            booking_end_date 	= "{{ $booking->end_date }}";
	             			if(!invalid_date){

		             			//convert dates to objects date to compare
								var obj_start_book_date 	= new Date(booking_start_date);
								var obj_end_book_date	= new Date(booking_end_date);
								if((obj_start_book_date>= obj_start_date && obj_start_book_date<obj_end_date) || (obj_end_book_date> obj_start_date && obj_end_book_date<=obj_end_date) )
								{
									invalid_date = 1;
								}else if((obj_start_date>= obj_start_book_date && obj_start_date<obj_end_book_date) || (obj_end_date> obj_start_book_date && obj_end_date<=obj_end_book_date) )
								{
									invalid_date = 1;
								}
	             			}
	             		@endforeach
	             		//validate the actual date
	             		if(obj_end_date <= obj_actual_date){
	             			invalid_date = 2;
	             			invalid_hours++;
	             		}

             		
	             		var bottom_time_dd 	= aux_date_2.getDate();
						var bottom_time_mm 	= aux_date_2.getMonth()+1; //January is 0!
						var bottom_time_yy 	= aux_date_2.getFullYear();
						var this_day_hh		= start_hour_split[0];

						if(bottom_time_dd<10) {
						    bottom_time_dd= '0' + bottom_time_dd;
						} 

						if(bottom_time_mm<10) {
						    bottom_time_mm= '0' + bottom_time_mm;
						} 
						//saving the bottom time of the time period
						var init_period = bottom_time_yy + "-" + bottom_time_mm + "-" + bottom_time_dd + " " + this_day_hh;

	             		var top_time_dd 	= aux_date.getDate();
						var top_time_mm 	= aux_date.getMonth()+1; //January is 0!
						var top_time_yy 	= aux_date.getFullYear();
						var top_this_day_hh		= end_hour_split[0];

						if(top_time_dd<10) {
						    top_time_dd= '0' + top_time_dd;
						} 

						if(top_time_mm<10) {
						    top_time_mm= '0' + top_time_mm;
						} 
						//saving the bottom time of the time period
						var end_period = bottom_time_yy + "-" + top_time_mm + "-" + top_time_dd + " " + top_this_day_hh;



	             		if(invalid_date == 0){
		             		boddy += "<tr> <td><input type='checkbox' name='time_checkbox[]' value='b%" +init_period+"%" +end_period+"' onchange='validateMaxChecks(this)' class='time_checkbox'/>    " + start_hour_split[0] +" - " +end_hour_split[0] +"</td> </tr>";	             		
	             		}else if(invalid_date == 1){
		             		boddy += "<tr> <td><input type='checkbox' name='time_checkbox[]' value='w%" +init_period+"%" +end_period+"' onchange='validateMaxChecks(this)' class='time_checkbox'/>  <a style='color:red'> " + start_hour_split[0] +" - " +end_hour_split[0] +"</a> </td> </tr>";	             			             			
	             		}	             	
	             	}
	             	//if the laboral day has already finished
	             	if(hours_ranges == invalid_hours){
		             	boddy += "</tbody> </table> <div style='color:red'> No es posible reservar recursos a esta hora. Intente otro día. </div> </div>";             			             		
	             	}else{
		             	boddy += "</tbody> </table> <div style='color:red'>*Horas en rojo = apartado, al seleccionar ese horario entras a una lista de espera</div> </div>";             		
	             	}
             	}

                return header + boddy;
			});	
		});
	});

</script>