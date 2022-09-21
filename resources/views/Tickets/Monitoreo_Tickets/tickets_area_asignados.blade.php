@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')
<h3>Esto es area asignados desglose </h3>
@foreach($tktsarea as $tktareas)
<table>
<tr>
    <th>Numero de Ticket</th>
    <th>Nombre del Ticket</th>
    <th>Fecha de creacion</th>
</tr>
<tr>
    <td>{{$tktareas->tn}}</td>
    <td>{{$tktareas->title}}</td>
    <td>{{$tktareas->create_time}}</td>
</tr>
</table>
@endforeach

 

@endsection