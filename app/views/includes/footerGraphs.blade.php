<!-- FOOTER WITH JAVA SCRIPT OF GRAPHS -->

{{ HTML::script('js/Chart.min.js') }}

<script >

	(function(){
		var ctx = document.getElementById('mostUsed').getContext('2d');

		var chart = {

			labels:{{json_encode($resource)}},

			datasets:[{

				data:{{json_encode($total)}}


			}]



		};


		new Chart(ctx).Bar(chart);

	})();





</script>