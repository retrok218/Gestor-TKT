@extends('home')
<meta http-equiv="refresh" content="1220" />
@section('content')
<script>
    var titulo_tab = "Tickets Abiertos";
    var name_tabla = "/data_tickets_abiertos";
</script>
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">    
        <div class="kt-portlet__body">                    
                    <div class="row row-no-padding row-col-separator-xl">			
                        <div class="col-md-12 col-lg-12 col-xl-3">
                            <!--begin::Total Profit-->                            
                            <div class="kt-widget24" style="text-align: center;">
                                <div class="row" style="color: #595d6e;">
                                    <div class="col-sm-6" >  
                                        <div class="kt-widget25"  style="border-right: groove;">
                                            <div class="kt-widget24__info" style="
                                            text-align: initial;">
                                                <h4 class="kt-widget24__title">
                                                    Tickets Totales 
                                                </h4>					       
                                            </div> 
                                            <div class="fas fa-ticket-alt fa-spin fa-3x" ></div>
                                                <span class="kt-widget25__stats m-font-brand">- {{$ticket}}</span>                                                                                      
                                          </div>            
                                    </div>
                                    <div class="col-sm-6" >
                                        <div class="kt-widget25">
                                            <div class="kt-widget24__info" style="
                                            text-align: initial;">
                                                <h4 class="kt-widget24__title">
                                                    {{$nom_tkt_estatus}}
                                                </h4>					       
                                            </div>
                                            <div class="fas fa-ticket-alt fa-spin fa-3x" ></div>
                                                <span class="kt-widget25__stats m-font-brand">- {{$abierto}}</span>                                                  
                                        </div>            
                                    </div>                        
                                </div>  
                                <div class="progress progress--sm" style="height: 1rem">                                                                                            
                                        <div class="progress-bar barra_progreso" role="progressbar" style="width: {{$ticket}}" aria-valuenow={{$ticket}} aria-valuemin={{$ticket}} aria-valuemax={{$ticket}}></div>                                               
                                        <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style= "width: {{$abierto}}" aria-valuenow={{$abierto}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>                                                                                           
                                </div>              
                                <div class="kt-widget24__action">  
                                        <span class="kt-widget24__number"></span>
                                        <span class="kt-widget24__number">
                                            {{$tktporcento}}%
                                        </span>
                                </div>	
                            </div>                           
                        </div>   
                    </div>
         </div>       
    </div>   


    
    <!-- Creacion de tabla tickets asignados -->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{$nom_tkt_estatus}}
                </h3>
            </div>            
        </div>    
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20">                
                <div class="row kt-margin-b-4">
                    <div class="col-lg-8 kt-margin-b-10-tablet-and-mobile">
                        <label>Rango de Busqueda :</label>                       
                        <div class="input-group date">               
                            <div class="input-daterange input-group" id="kt_datepicker">
                                <input class="date_range_filter date " type="text" id="datepicker_from" placeholder="De la Fecha " autocomplete="off" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                </div>                            
                                <input class="date_range_filter date" type="text" id="datepicker_to" placeholder="A La Fecha"  autocomplete="off"/>
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="flaticon-calendar"></i></span>
                              </div>
                            </div>
                        </div>        
                            <button class="btn btn-default clear-date-filter">Limpiar Filtross</button>
                    </div>                    
                </div> 
            </form>
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
                    <th>Seleccione El Area</th>
                    <th></th>
                    <th></th>
                </tfoot>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>

@include('layouts/scripts/scripts_dttb')
<!--se agrega el includ para creacion de datatable -->
@endsection

