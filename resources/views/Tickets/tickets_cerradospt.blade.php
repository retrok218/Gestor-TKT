@extends('home')
@section('content')
<script>
 var titulo_tab = 'Tickets Cerrados Por Tiempo';
 var name_tabla = "/data_tickets_cerradospt";
</script>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              
        
        
                  <div class="card-deck mt-3">
                  <div class="card text-center  mb-3 bg-white" >
                  <div class="card-header" ><h4>Tickets Totales</h4> </div>
                    <div class="card-body">                         
                        <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>            
                    </div>
                    <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
                </div>
                   
                    <div class="card text-center  mb-3 bg-white" >
                      <div class="card-header"><h4>Tickets Cerrados Por Tiempo </h4> </div>
                      <div class="card-body">
                          <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$cerradoPT}} </i> </div>
                      </div>
                      <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
                    </div>
                  </div>
        
        
        
        <!-- Creacion de graica tickets asignados -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center">
                    <div class="card-header titulo_card"><h2>Tickets Cerrados Por Tiempo</h2></div>
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
              
    
        
        
       


    </div>
</div>
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
@endsection
@endsection
