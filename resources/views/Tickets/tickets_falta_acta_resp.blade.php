@extends('home')
<meta http-equiv="refresh" content="1220" />
@section('content')
<script>
    var titulo_tab = "Tickets Falta Acta Responsiva";
    var name_tabla = "/data_falta_acta_resp";
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
            <div class="card-header"><h4>Tickets Falta Acta Responsiva </h4></div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-address-card" style="font-size: 36px;"> {{$FaltaActaRES}} </i></div>
            </div>
            <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
    </div>

    <!-- Creacion de graica tickets asignados -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-header titulo_card"><h2>Tickets Falta Acta Responsiva </h2></div>
            </div>
            <h5>Filtrar por rango de Fecha <input id="Date_search" type="text" placeholder="Selecciona el Rango " /></h5>
            <div class="card-body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="tablatk">
                    <thead>
                        <tr>
                            <th>Numero de Tiket</th>
                            <th>Creado</th>
                            <th>Asunto</th>
                            <th>Area</th>
                            <th>Estado del Tiket</th>
                            <th>Nombre Usuario</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Estatus de TKT</th>
                        <th></th>
                    </tfoot>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>
<!--se agrega el includ para creacion de datatable -->

@section('scripts') 
@endsection
@endsection