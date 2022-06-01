@extends('home')

@section('content')
<script>
    var titulo_tab = 'Tickets Abiertos';
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
            <div class="card-header"><h4>Tickets Abiertos </h4> </div>
            <div class="card-body">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$abierto}} </i> </div>
            </div>
            <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
          </div>
        </div>
        
          
            
              <div class="card text-center"  >
              <div class="card-header titulo_card"><h2> Tickets Abiertos </h2> </div>
              </div>
              
                    
    <!--begin: Datatable -->
                  <table id="#example"  class="table table-striped table-bordered "  >
                      <thead >
                        <h5>Filtrar por rango de Fecha : <input id="Date_search" type="text" placeholder="Selecciona el Rango " /> 
                        </h5> 
                        <tr>
                          <th>Numero de Ticket</th>
                          <th> Creado </th>
                          <th> Asunto </th>
                          <th> Usuario </th>
                          <th> Area/Fila </th>
                          <th> Status TK</th>
  
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
                <!--end: Datatable -->
        </div>

        
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript">

$(document).ready(function () {
    $('#example').DataTable({
        ajax:{
           url"{{route(datatable.abiertos)}}",
        },
        columns:[
          {
            { data: 'ticket.id', name: 'ticket.id' },
            { data: 'ticket.tn', name: 'ticket.tn' },
            { data: 'ticket.create_time', name: 'ticket.create_time' },
            { data: 'ticket.title', name: 'ticket.title' },
            { data: 'ticket.user_id', name: 'ticket.user_id' },
            { data: 'queue.name as qname', name: 'queue.name as qname' },
          }
        ]


        
    });
});




</script>

@endsection
@endsection
