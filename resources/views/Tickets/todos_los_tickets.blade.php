@extends('home')
<!-- <meta http-equiv="refresh" content="1220" /> -->
@section('content')
<script>
  var titulo_tab = 'Tickets Totales';
  var name_tabla = '/datatodos_los_tickets';
</script>

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">    
        <!-- <div class="kt-portlet__body"> -->
                    <div class="row row-no-padding row-col-separator-xl">			
                        <div class="col-md-12 col-lg-12 col-sm-12 pull-left">   <!--  responsive -->
                            <!--begin::Total Profit-->                            
                            <div class="kt-widget24" style="text-align: center;">
                                <div class="row" style="color: #595d6e;">
                                    <div class="col-sm-6" >  
                                        <div class="kt-widget25"  >
                                            <div class="kt-widget24__info" style="text-align: initial;">
                                                <h4 class="kt-widget24__title">
                                                    Tickets Totales 
                                                </h4>					       
                                            </div> 
                                            <div class="fas fa-ticket-alt fa-spin fa-3x" ></div>
                                                <span class="kt-widget25__stats m-font-brand">- {{$ticket}}</span>                                                                                      
                                          </div>            
                                    </div>
                                                           
                                </div>  
                                <div class="progress progress--sm" style="height: 1rem">                                                                                            
                                        <div class="progress-bar barra_progreso" role="progressbar" style="width: {{$ticket}}" aria-valuenow={{$ticket}} aria-valuemin={{$ticket}} aria-valuemax={{$ticket}}></div>                                                                                                                                                     
                                </div>                                              
                            </div>                           
                        </div>   
                    </div>
         <!-- </div>        -->
    </div>   
    @include('Tickets/EstructuraDTT/dtt') <!--Estructura de DTT--> 
</div>
<!--se agrega el includ para creacion de datatable -->
@include('layouts/scripts/scripts_dttb')
@endsection



