@extends('home')
<meta http-equiv="refresh" content="180"> <!--se refresca la pagina cada x-s -->
  @section('content')
  <script>
  var titulo_tab = 'Tickets Totales';
  var name_tabla = '/datatodos_los_tickets';
</script>
  

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   
  <!-- Tabla principal Tickets totales -->


    <div class="row">
      <div class="col-lg-12">
          <div class="card text-center"  >
            <div class="card-header titulo_card"><h2> Tickets Totales </h2> </div>    
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

         






  <!--begin: Datatable -->
          <div class="card-body">           
                <table id="tablatk"  class="table table-striped- table-bordered table-hover table-checkable" >
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
                      <tr>
                        <th></th>
                        <th> </th>
                        <th></th>
                        <th></th>
                        <th>Seleccione el area</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    
                </table>     
          </div>
    <!--end: Datatable -->
    </div>
  </div>

  </div>


@section('scripts')   
@endsection
@endsection





