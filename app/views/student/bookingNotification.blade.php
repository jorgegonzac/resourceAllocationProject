<h1>Hola, {{ $userName }}!</h1>
<p>
Acabas de hacer una reservación para {{ $resourceName }} en el {{ $labName}}:

@if(!empty($bookings))
<h4>Los siguientes horarios fueron reservados: </h4>
{{$bookings}}
@endif

@if(!empty($waitings))
<h4>Haz quedado en la lista de espera para los siguientes horarios: </h4>
{{$waitings}}
@endif


No olvides presentarte en la hora y fecha indicada, la tolerancia máxima es de 5 minutos. En caso de no presentarte
a tiempo el recurso será asignado a otra persona.

 </p>