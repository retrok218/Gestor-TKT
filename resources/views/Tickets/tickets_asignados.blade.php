@extends('home')
<meta http-equiv="refresh" content="" />
@section('content')
<script>
    var titulo_tab = "Tickets Asignados";
    var name_tabla = "/data_ticket_asignado";
</script>

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="card-deck mt-3">
        <div class="card text-center mb-3 bg-white">
            <div class="card-header"><h4>Tickets Totales</h4></div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-address-card" style="font-size: 36px;"> {{ $ticket}} </i></div>
            </div>
            <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
        <div class="card text-center mb-3 bg-white">
            <div class="card-header"><h4>Tickets Asignados</h4></div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-address-card" style="font-size: 36px;"> {{$asignado}} </i></div>
            </div>
            <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
    </div>
    <div class="card text-center">
        <div class="card-header titulo_card"><h2>Tickets Asignados</h2></div>
    </div>

    <!--begin: Datatable -->
    <table id="tablatk" class="table table-striped- table-bordered table-hover table-checkable">
        <thead>
            <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /></h5>
            <tr>
                <th>Numero de Ticket</th>
                <th>Creado</th>
                <th>Asunto</th>
                <th>Usuario</th>
                <th>Area/Fila</th>
                <th>Status TK</th>
            </tr>
        </thead>
        <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Filtro/Filas</th>
            <th></th>
        </tfoot>
    </table>
    <!--end: Datatable -->
</div>
<!--se agrega el includ para creacion de datatable -->

@section('scripts') 
@endsection
@endsection
