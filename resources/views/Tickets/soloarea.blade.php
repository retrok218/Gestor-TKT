@extends('home')
<!-- <meta http-equiv="refresh" content="1220" /> -->
@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
<div class="row">
<div class="col-sm" >        
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
                                        <a href="{{url('/tickets_asignados') }}"><h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">Tickets Asignados </h6></a>                                
                                        									
                                    </div>     
                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$totaltktsarea[0]->count}}
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
    @foreach($tktsxareaarea as $xarea )
    
    <div class="col-sm-6 col-md-6 col-lg-4">
    <a href="{{url('/data/tktareaasignadosdesg/'.$xarea->id) }}">
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
                                        <!-- se agrega url para el despliegue  de la datatavle referente al id  -->
                                         <h6 class="mb-0" style="color: #2e2e2e;font-size: 20px;">{{$xarea->name}} </h6>                                   
                                       	                                                                                
                                    </div> 
                                    

                                </div>
                            </div>                            
                            <hr>                                                                                              
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">   
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top:50px; left:49%;font-size:2.5em;color:rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm" style="font-size: 25px !important;"></div>
                                            {{$xarea->count}}
                                        </h6>	 
                                    </div>                                   
                                    </div>                                                                                     
                            </div>   
                           
                </div>                        
        </div>  
        </div>                        
        </div>                                                                                                                      
    </div>
    </a>
    @endforeach
 </div>
 </div>





@endsection