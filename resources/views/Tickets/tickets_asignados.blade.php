@extends('home')
 <!-- <meta http-equiv="refresh" content="20"/> -->
@section('content')
<script>
    var titulo_tab = "Tickets Asignados";
    var name_tabla = "/data_ticket_asignado";
</script>
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">    
        <!-- <div class="kt-portlet__body">                     -->
                    <div class="row row-no-padding row-col-separator-xl">			
                    <div class="col-md-12 col-lg-12 col-sm-12 pull-left" >   <!--  responsive -->
                            <!--begin::Total Profit-->                            
                            <div class="kt-widget24" style="text-align: center;">
                                <div class="row" style="color: #595d6e;">
                                @can('SuperAdmin') 
                                    <div class="col-sm-6" > 
                                        
                                        <div class="kt-widget25"  style="border-right: groove;" id="cartasnumericas">
                                            <div class="kt-widget24__info" style="
                                            text-align: initial;">
                                                <h4 class="kt-widget24__title">
                                                    Tickets Totales 
                                                </h4>					       
                                            </div> 
                                            <div class="fas fa-ticket-alt fa-spin fa-3x" ></div>
                                                <span class="kt-widget25__stats m-font-brand" >- {{$ticket}}</span>                                                                                      
                                          </div>  
                                                  
                                    </div>
                                    @endcan 
                                    <div class="col-sm-6" >
                                        <div class="kt-widget25">
                                            <div class="kt-widget24__info" style="text-align: initial;">
                                                <h4 class="kt-widget24__title">
                                                    {{$nom_tkt_estatus}} 
                                                </h4>					       
                                            </div>
                                            <div class="fas fa-ticket-alt fa-spin fa-3x" ></div>
                                                <span class="kt-widget25__stats m-font-brand">- {{$totalMesJsonm}}</span>                                                  
                                        </div>            
                                    </div>                        
                                </div>  
                                @can('SuperAdmin') 
                                <div class="progress progress--sm" style="height: 1rem">                                                                                           
                                                                                                                                    
                                        <div class="progress-bar barra_progreso" role="progressbar" style="width: {{$tktporcenttot}}%" aria-valuenow={{$ticket}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>                                               
                                        <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktporcento}}%" aria-valuenow={{$asignado}} aria-valuemin="0" aria-valuemax={{$asignado}}></div>                                                                                              
                                </div>
                                              
                                <div class="kt-widget24__action">  
                                        <span class="kt-widget24__number">
                                        {{$tktporcenttot}}%
                                        </span>
                                        <span class="kt-widget24__number">
                                            {{$tktporcento}}%
                                        </span>
                                </div>	
                                @endcan 
                            </div>                           
                        </div>   
                    </div>
                    
                
    </div>      
    @include('Tickets/EstructuraDTT/dtt')
</div>
<!--se agrega el includ para creacion de datatable -->
@include('layouts/scripts/scripts_dttb')




@endsection