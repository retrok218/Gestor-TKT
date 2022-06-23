@extends('home')
<meta http-equiv="refresh" content="30">
@section('content')
<script>
  var titulo_tab = 'Tickets Atendidos';
  var name_tabla = "/data_tickets_atendidos";
</script>

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
          <div class="card-header"><h4>Tickets Atendidos </h4> </div>
          <div class="card-body">
              <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$atendido}} </i> </div>
          </div>
          <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>
      </div>
      <div class="card text-center"  >
        <div class="card-header titulo_card"><h2> Tickets Atendidos </h2> </div>
        </div>
        <div class="total-filter">
          <div class="search-heading">Selecciona el Rango de Busqueda</div>  
        <div class="input-group date">          
                 
               
          <span id="date-label-from" class="date-label">De:</span>
          <input class="date_range_filter date " type="text" id="datepicker_from" />
          <span id="date-label-to" class="date-label">a:</span>
          
            <input class="date_range_filter date" type="text" id="datepicker_to" />
            <div class="input-group-append">
              <span class="input-group-text"><i class="flaticon-calendar"></i></span>
            </div>
        </div>

          <button class="btn btn-default calculate-date-filter">Aplicar Rango </button>        
          <button class="btn btn-default clear-date-filter">Limpiar Rango</button>            
        </div>
      <div class="row">

        <div class="col-xl-12">          
            
            
  <!--begin: Datatable -->
            
            <div class="card-body" >               
               <table id="tablatk"  class="table table-striped table-bordered " >
                    <thead >
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
                        <th>Filtro/Filas </th>
                        <th></th>
                    </tfoot>
                    
                </table>
              <!--end: Datatable -->
             
              </div>
              

          </div>
      </div>
      </div>
      
@section('scripts')
@endsection
@endsection

