@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')
<script>
    var titulo_tab = "Tickets Abiertos";
    var name_tabla = "/data/tkts_area_asignados/{{$idareaasignado}}";
</script>
@include('Tickets/EstructuraDTT/dtt') 
@include('layouts/scripts/scripts_dttb')
@endsection