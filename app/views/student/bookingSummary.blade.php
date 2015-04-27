
@if(!empty($bookings))
<h4>Los siguientes horarios fueron reservados: </h4>
{{$bookings}}
@endif

@if(!empty($waitings))
<h4>Haz quedado en la lista de espera para los siguientes horarios: </h4>
{{$waitings}}
@endif

<h4>Esta información ha sido enviada a tu correo.</h4>