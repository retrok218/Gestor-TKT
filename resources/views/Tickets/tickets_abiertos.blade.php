@extends('home')
<meta http-equiv="refresh" content="1220" />
@section('content')
<script>
    var titulo_tab = "Tickets Abiertos";
    var name_tabla = "/data_tickets_abiertos";
</script>
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="card-deck mt-3">
        <div class="card text-center mb-3 bg-white">
            <div class="card-header"><h4>Tickets Totales</h4></div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-address-card" style="font-size: 36px;"> {{$tickte}} </i></div>
            </div>
        </div>
        <div class="card text-center mb-3 bg-white">
            <div class="card-header"><h4>Tickets Abiertos</h4></div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-address-card" style="font-size: 36px;"> {{$abierto}} </i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-header titulo_card"><h2>Tickets Abiertos</h2></div>
            </div>
        </div> 

      

<div class="total-filter">
    <div class="search-heading">Show Results (Filter by Date in mm/dd/yyyy format) </div>
  <p id="date_filter">
     
<span id="date-label-from" class="date-label">From: 
</span><input class="date_range_filter date" type="text" 
id="datepicker_from" />
      <span id="date-label-to" 
class="date-label">To:</span><input class="date_range_filter
date" type="text" id="datepicker_to" />
<button class="btn btn-default calculate-date-filter">Show Results </button>        
    <button class="btn btn-default clear-date-filter">Clear Filter</button>
  </p>
</div>
       
          

      <div class="col-lg-12">
           
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
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>




@endsection
@endsection