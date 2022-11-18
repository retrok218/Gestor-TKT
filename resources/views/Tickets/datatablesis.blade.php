@extends('home')
<!-- <meta http-equiv="refresh" content="1220" /> -->
@section('content')
<script>
  var titulo_tab = 'Tickets Totales';
  
  var name_tabla = '/data/data/area_asignados/'+{{$num}};
</script>

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
<div class="kt-portlet__head">
        <div class="header_titulo_monitoreo_tkts text-center" >
        
            <div class="card-header fondoberde"  >
                <div class="containerglass ">
                        <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(2em + 1vw);">
                            Tablero Mesa de Servicio                                              
                        </span>    
                    </div>
            </div>  

        </div>
    </div>


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
                                                    Tickets {{$nomqueue->name}} 
                                                </h4>	
                                                <h6 class="mb-0" style="position: absolute;top: 30%;left: 70%;font-size:2.5em;color:rgb(160 32 66 / 65%)"> 
                                                    <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                                    {{$datoconsulta[0]->count}}
                                                </h6>			       
                                            </div> 
                                                                                                                                
                                          </div>            
                                    </div>
                                                           
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
