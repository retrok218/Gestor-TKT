@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')
<script>
    var titulo_tab = "Tickets Monitoreo Area/Nombres";
        
</script>

<div class="kt-portlet__head">
        <div class="header_titulo_monitoreo_tkts text-center" >
        
            <div class="card-header fondoberde"  >
                <div class="containerglass ">
                    <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(2em + 1vw);">
                        Tablero Mesa de Servicio   
                                                               
                    </span>    
                    <p style="margin-top: -14px;color: #bc6c82;font-size: 1em;">(Estado : Asignados)   </p>
                    
                </div>
            </div>  

        </div>
    </div>

<div class="row">
    
    <div class="col-sm" id="st">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">ST</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["ST"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>

    <div class="col-sm" id="canselacionstado">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">Cancelaciones</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["cancelacion"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>
    
    <div class="col-sm" id="caphumanoarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">Capital Humano</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["capital"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>
    
</div>

<div class="row">
    
    <div class="col-sm" id="dasiarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">DASI</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["DASI"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>
    
    <div class="col-sm" id="decsiarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">DECSI</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["DECSI"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>

    <div class="col-sm" id="mesasarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">Mesa de Servicio</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["Mesa"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>

</div>

<div class="row">
    
    <div class="col-sm" id="normaarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">Normatividad</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["Normatividad"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>

    <div class="col-sm" id="seguridadarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">Seguridad Informatica</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["Seguridad"]}} 
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>

    <div class="col-sm" id="sistemasarea">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">Sistemas</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$ssumm["Sistemas"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>
          </a>
        </div>
    </div>
</div>
<hr>
<!-- <div class="row">
        @foreach($areas as $datoarea)           
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card bg-white p-3 mb-4 shadow" style="padding: 0.5rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">
                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">{{$datoarea->nombrea}}</h6>									
                                    </div>
                                </div>
                              
                            </div>
                            <hr>
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top: 42px;left: 65%;font-size: 2em;color: rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$datoarea->tickets}}
                                        </h6>	 
                                    </div>                                   
                            </div>                                                                     
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">                           
                                                           
                            </div>                            
                        </div>
                    </div>				
        @endforeach		                                        
    </div>  -->

    @include('Tickets/Monitoreo_Tickets/estados/spestado')
    @include('Tickets/Monitoreo_Tickets/estados/dasi')
    @include('Tickets/Monitoreo_Tickets/estados/decsi')
    @include('Tickets/Monitoreo_Tickets/estados/mesaserv')
    @include('Tickets/Monitoreo_Tickets/estados/sistemasestr')
    



@endsection

@section('scripts')
<script>
    $(function(){
        $('#name-sp').hide();
        $('#dasimod').hide();
        $('#decsimod').hide();
        $('#messaest').hide();
        $('#sistemaess').hide();

        $('#st').click(function(){            
            $('#name-sp').toggle(1000);
            $('#canselacionstado').toggle(1000);
            $('#caphumanoarea').toggle(1000);
            $('#dasiarea').toggle(1000);
            $('#decsiarea').toggle(1000);
            $('#mesasarea').toggle(1000);
            $('#normaarea').toggle(1000);
            $('#seguridadarea').toggle(1000);
            $('#sistemasarea').toggle(1000);            
        });
        
        $('#dasiarea').click(function(){ 
            $('#dasimod').toggle(1000);       
            $('#st').toggle(1000);               
            $('#canselacionstado').toggle(1000);
            $('#caphumanoarea').toggle(1000);            
            $('#decsiarea').toggle(1000);
            $('#mesasarea').toggle(1000);
            $('#normaarea').toggle(1000);
            $('#seguridadarea').toggle(1000);
            $('#sistemasarea').toggle(1000);            
        });


        $('#decsiarea').click(function(){ 
            $('#decsimod').toggle(1000);       
            $('#st').toggle(1000);               
            $('#canselacionstado').toggle(1000);
            $('#caphumanoarea').toggle(1000);
            $('#dasiarea').toggle(1000);             
            $('#mesasarea').toggle(1000);
            $('#normaarea').toggle(1000);
            $('#seguridadarea').toggle(1000);
            $('#sistemasarea').toggle(1000);            
        });

        $('#mesasarea').click(function(){ 
            $('#messaest').toggle(1000);       
            $('#st').toggle(1000);               
            $('#canselacionstado').toggle(1000);
            $('#caphumanoarea').toggle(1000);
            $('#dasiarea').toggle(1000);             
            $('#decsiarea').toggle(1000);
            $('#normaarea').toggle(1000);
            $('#seguridadarea').toggle(1000);
            $('#sistemasarea').toggle(1000);            
        });

        $('#sistemasarea').click(function(){ 
            $('#sistemaess').toggle(1000);       
            $('#st').toggle(1000);               
            $('#canselacionstado').toggle(1000);
            $('#caphumanoarea').toggle(1000);
            $('#dasiarea').toggle(1000);             
            $('#decsiarea').toggle(1000);
            $('#normaarea').toggle(1000);
            $('#seguridadarea').toggle(1000);
            $('#mesasarea').toggle(1000);
                        
        });



    })

</script>
@endsection