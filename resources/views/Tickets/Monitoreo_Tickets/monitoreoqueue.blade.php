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
    </div> 
<hr>

<br>

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