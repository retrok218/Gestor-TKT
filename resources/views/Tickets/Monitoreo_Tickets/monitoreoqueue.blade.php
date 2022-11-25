@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')
<script>
    var nom_tkt_estatus = "Tickets areaaa";
    var name_tabla = "/data/ddatatktareaasignadosdesg/{id}";
</script>


<div class="kt-portlet__head">
        <div class="header_titulo_monitoreo_tkts text-center" >
        
            <div class="card-header "  >
                <div class="containerglass ">
                    <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(2em + 1vw);">
                        Tablero Mesa de Servicio   
                                                               
                    </span>    
                    <p style="margin-top: -14px;color: #0e0e0e;font-size: 1em;">(Estado : Asignados)   </p>
                    
                    
                </div>
            </div>  

        </div>
    </div>

<div class="row">

    
    <div class="col-sm" id="st">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
          <div class="three col">
                    <div class="hamburger" id="hamburger-2">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                    </div>
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
                <div class="card bg-white p-3 mb-4 shadow" style="padding: 1rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">ST</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["ST"]}}
                                        </h6>	 
                                    </div>                                   
                                </div>                                                                                     
                            </div>

                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
                                        </h6>									
                                    </div>     
                                </div>
                            </div> 

                </div>  
            </div>
          </div>
         
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Cancelaciones</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["cancelacion"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>   
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Capital Humano</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["capital"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div> 
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">DASI</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["DASI"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">DECSI</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0"style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["DECSI"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div> 
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Mesa de Servicio</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["Mesa"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Normatividad</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["Normatividad"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div> 
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Seguridad Informatica</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["Seguridad"]}} 
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
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
      <div class="kt-widget25__item" style="">
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
                                        <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Sistemas</h6>									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0"style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$ssumm["Sistemas"]}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div> 
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">                                    
                                    <div class="user-info__basic">
                                        
                                        <h6 class="plegar" >
                                            <div class="fa fa-chevron-circle-up" style="font-size: 1.5em !important; color: #a02042;"></div>
                                        </h6>									
                                    </div>     
                                </div>
                            </div>   
                </div>  
            </div>
          </div>
          
        </div>
    </div>
</div>
<hr>
<div class="row">

@foreach($areas as $v)
 <div class="col-sm-6 col-md-6 col-lg-4" name="nn" >
        <a href="{{url('/data/tktareaasignadosdesg/'.$v->identificador) }}">                       
         <div class="kt-widget25__item" style="">
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
                                        <h6 class="mb-0" style="color: #2e2e2e;" >{{$v->nombrea}}</h6>  									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                                <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0"style="position: initial;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$v->tickets}}
                                        </h6>	 
                                    </div>                                   
                                </div>                                                                                     
                            </div>    
                </div>  
            </div>
          </div>          
        </div>
        </a>
    </div>
 @endforeach
</div> 
@endsection

@section('scripts')
<script>
    $(function(){
        
        $("div[name='nn']").hide(1);
        $(".plegar").hide();   


        

        $('#st').click(function(){
            $("div[name='nn']:contains(ST::)").toggle(400);
            
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });

        $('#canselacionstado').click(function(){
            $("div[name='nn']:contains(Cancelac)").toggle(500);
            $(".plegar").toggle(400);
            $('#st').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#caphumanoarea').click(function(){
            $("div[name='nn']:contains(Capital)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#st').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#dasiarea').click(function(){
            $("div[name='nn']:contains(DASI)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#st').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#decsiarea').click(function(){
            $("div[name='nn']:contains(DECSI)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#st').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#mesasarea').click(function(){
            $("div[name='nn']:contains(Mesa de)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#st').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#normaarea').click(function(){
            $("div[name='nn']:contains(Normatividad)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#st').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#seguridadarea').click(function(){
            $("div[name='nn']:contains(Seguridad Inf)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#st').toggle(400);
            $('#sistemasarea').toggle(400);
        });
        $('#sistemasarea').click(function(){
            $("div[name='nn']:contains(Sistemas)").toggle(500);
            $(".plegar").toggle(400);
            $('#canselacionstado').toggle(400);
            $('#caphumanoarea').toggle(400);
            $('#dasiarea').toggle(400);
            $('#decsiarea').toggle(400);
            $('#mesasarea').toggle(400);
            $('#normaarea').toggle(400);
            $('#seguridadarea').toggle(400);
            $('#st').toggle(400);
        });


        
  $(".hamburger").click(function(){
    $(this).toggleClass("is-active");
  });









    })

    function desglocetktsar(id){   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url+'/data/tktareaasignadosdesg/'+id,
        dataType: 'html',
        success: function(resp_success) {
            var modal = resp_success;
            $(modal).modal().on('shown.bs.modal', function() {
                $("[class='make-switch']").bootstrapSwitch('animate', true);
                $('.select2').select2({dropdownParent: $("#ConsultarGrupo")});
            }).on('hidden.bs.modal', function() {
                $(this).remove();
            });
        },
        error: function(respuesta) {
            Swal.fire('¡Alerta!','Error de conectividad de red USR-01','warning');
        }
    });  
    //console.log(id);
   };



   

</script>
@endsection