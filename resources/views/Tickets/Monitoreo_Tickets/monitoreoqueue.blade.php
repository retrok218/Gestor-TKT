@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')
<script>
    var titulo_tab = "Tickets Monitoreo Area/Nombres";
        
</script>

@php
$y = 0;
@endphp

<div class="row">
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>ST</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["ST"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>Cancelaciones</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["cancelacion"]}}<br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>Capital Humano</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["capital"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>DASI</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["DASI"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>DECSI</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["DECSI"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>Mesa de Servicio</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["Mesa"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>Normatividad</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["Normatividad"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div><div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>Seguridad</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["Seguridad"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div><div class="col-sm">        
      <div class="kt-widget25__item">
          <div class="item-wrapper">
            <div class="line line-top"><span></span></div>
            <div class="line line-right"><span></span> </div>
            <div class="line line-bottom"><span></span> </div>
            <div class="line line-left"><span></span> </div>
            <div class="item">
              <a id="link" href="#" target="_blank">
                <span class="kt-widget25__number">
                  <h3>Sistemas</h3>
                </span>
                
                <span class="kt-widget25__desc">
                  <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                  {{$ssumm["Sistemas"]}} <br>
                  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  -->
                </span>
                <hr>
            </div>
          </div>
          </a>
        </div>
    </div>
    </div>




<!-- <div class="row">
        @foreach($ssumm as $d)           
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card bg-white p-3 mb-4 shadow" style="padding: 0.5rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">
                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">@php echo key($ssumm) @endphp</h6>									
                                    </div>
                                </div>
                              
                            </div>
                            <hr>
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top: 26px;left: 50%;font-size: 2em;color: rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$d}}
                                        </h6>	 
                                    </div>                                   
                            </div>                                                                     
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">                           
                                                           
                            </div>

                            
                        </div>
                    </div>	
                   		
        @endforeach		                                        
    </div>  -->
<hr>



<div class="row">
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
    </div> >


@endsection