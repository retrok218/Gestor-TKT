@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')
<script>
    let titulo_tab = "Ticke";
    var name_tabla = "/data/monitoreo_areas_n/tkts_totales_areas_princ/{{$lista_ar}}";
    
</script>




@include('Tickets/EstructuraDTT/dtt') 
@include('layouts/scripts/scripts_dttb')
@endsection