@extends('home')
<meta http-equiv="refresh" content="50" />
@section('content')
<script>
    var titulo_tab = "Tickets Nuevos";
    var name_tabla = "/data_tickets_nuevos";    
</script>





 
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid" style="
    margin-top: -25px;">
  <!-- <div class="card" style="border: 1px; background: white;">   
    <img  class="header_titulo_monitoreo_tkts"  src="{{ URL::asset('assets/media/company-logos/SAF_AdminitraciónFinanciera_saf_2_reducido_gris copia.png'.env('APP_LOGO_ASIDE') ) }}" >                
  </div> -->
  <div class="kt-portlet__head">
    <div class="header_titulo_monitoreo_tkts text-center" >
      <div class="card-header" >
        <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: 25px;">
          Tablero Mesa de Servicio   
          
        </span>
      </div>          
    </div>
  </div>

  <div class="kt-portlet"  style="margin-top: -9px;" >    
    <div class="kt-portlet__body" style="padding: 11px;">
      <div class="kt-widget25" style="margin: 0rem 0;">
        <div class="fas fa-ticket-alt fa-spin fa-3x"  style="font-size: 2.5em !important;"></div>
        <span class="kt-widget25__stats m-font-brand" style="font-size: 3em;">{{$ticket}}</span>        
        <span class="kt-widget25__subtitle">Tickets Totales</span>
        
        
        <div class="progress m-progress--sm">
          <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[0]}}%;" aria-valuenow={{$asignado}} aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[1]}}%;" aria-valuenow={{$atendido}} aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[7]}}%;" aria-valuenow={{$tktsporciento[7]}} aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[2]}}%;" aria-valuenow={{$tktsporciento[2]}} aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[4]}}%;" aria-valuenow={{$tktsporciento[4]}} aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[5]}}%;" aria-valuenow={{$tktsporciento[5]}} aria-valuemin="0" aria-valuemax="100"></div>
          <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style= "width: {{$tktsporciento[8]}}%;" aria-valuenow={{$NotificadoAlUsuario}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
          <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style= "width: {{$tktsporciento[10]}}%;" aria-valuenow={{$cerradoPT}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
          <div class="progress-bar kt-bg-danger barra_progreso" role="progressbar" style= "width: {{$tktsporciento[9]}}%;" aria-valuenow={{$Entramite}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
          <div class=" tktstotales progress-bar kt-bg  barra_progreso" role="progressbar" style= "width: {{$tktsporciento[11]}}%;" aria-valuenow={{$cerradoexitosamente}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
          <div class=" Cerrados_exitosamente progress-bar kt-bg  barra_progreso" role="progressbar" style= "width: {{$tktsporciento[3]}}%;" aria-valuenow={{$cerradoexitosamente}} aria-valuemin="0" aria-valuemax={{$solicitudToner}}></div>
          
        </div>
        
        <div class="kt-widget25__items">
          <!--
            <div class="kt-widget24">
              <div class="kt-widget24__details">
                <div class="kt-widget24__info">
                  <h4 class="kt-widget25__item">
                    <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>                      
                    </span> 
                    Tickets Asignados                    
                  </h4>                      
                </div>               
                <span class="kt-widget24__stats kt-font-brand ">
                  {{$asignado}}
                </span>	 
              </div>     
              <div class="progress progress--sm" style="height: 1rem">
                <div class="progress-bar kt-bg-brand barra_progreso" role="progressbar" style="width: {{round($tktsporciento[0],2)}}%;" aria-valuenow="{{$asignado}}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="kt-widget24__action">
                <span class="kt-widget24__number ">
                  <h3>{{round($tktsporciento[0],2)}}%</h3>
                </span>
              </div>				   			      
            </div>   -->

          
        <div class="kt-widget25__item">         
            <div class="item-wrapper">
              <div class="line line-top"><span></span></div>
              <div class="line line-right"><span></span> </div>
              <div class="line line-bottom"><span></span> </div>
              <div class="line line-left"><span></span>  </div>        
              <div class="item">
              <a id="link"  href="{{ url('/tickets_asignados/') }}" target="_blank">
                <span class="kt-widget25__number">
                  {{$asignado}}
                </span>					 				
                  <div class="progress m-progress--sm" style="height: 1rem">
                    <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[0]}}%;" aria-valuenow={{$asignado}} aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="kt-widget25__desc">
                    <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                    Tickets Asignados <h3>{{round($tktsporciento[0],2)}}%</h3>  <!--round($blablalba[0],2) round = se redondea , con 2 cifras o la cantidad despues de [],  --> 
                  </span>
                  <hr> 

              </div>
          </div>
            </a>
          </div>
          <div class="kt-widget25__item">
            <div class="item-wrapper">
              <div class="line line-top"><span></span></div>
              <div class="line line-right"><span></span> </div>
              <div class="line line-bottom"><span></span> </div>
              <div class="line line-left"><span></span>  </div>        
              <div class="item">
                
                <a id="link"  href="{{ url('/tickets_atendidos/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$atendido}}
                    </span>					 				
                  <div class="progress m-progress--sm" style="height: 1rem">
                    <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[1]}}%;" aria-valuenow={{$atendido}} aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="kt-widget25__desc">
                    <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                    Tickets Atendidos <h3>{{round($tktsporciento[1],2)}}%</h3>
                  </span>
                  <hr> 
  
                </a>                              
              </div>
          </div>          
          </div>	          
          <div class="kt-widget25__item">
            <div class="item-wrapper">
              <div class="line line-top"><span></span></div>
              <div class="line line-right"><span></span> </div>
              <div class="line line-bottom"><span></span> </div>
              <div class="line line-left"><span></span>  </div>        
              <div class="item">
                
                <a id="link"  href="{{ url('/falta_acta_responsiva/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$FaltaActaRES}}
                    </span>					 				
                  <div class="progress m-progress--sm" style="height: 1rem">
                    <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[7]}}%;" aria-valuenow={{$tktsporciento[7]}} aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="kt-widget25__desc">
                    <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                    Tickets Falta Acta Responsiva <h3>{{round($tktsporciento[7],2)}}%</h3>
                  </span>
                  <hr>  
                </a>                              
              </div>
            </div>           
          </div>	
          
          
          



        </div>	
      <div class="kt-widget25__items"> 
        <div class="kt-widget25__item">            
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{ url('/tickets_nuevos/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$pendienteatc}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[2]}}%;" aria-valuenow={{$tktsporciento[2]}} aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Tickets Nuevos <h3>{{round($tktsporciento[2],2)}}%</h3>
                    </span>
                    <hr>
  
                </div>
              </div>
            </a>
          </div>
          <div class="kt-widget25__item">            
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{ url('/tickets_espera_informacion/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$espinformacion}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[4]}}%;" aria-valuenow={{$tktsporciento[4]}} aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Tickets En Espera de Información<h3>{{round($tktsporciento[4],2)}}%</h3>
                    </span>
                    <hr>
  
                </div>
              </div>
            </a>
          </div>
          <div class="kt-widget25__item">             
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{ url('/tickets_abiertos/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$abierto}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[5]}}%;" aria-valuenow={{$tktsporciento[5]}} aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Tickets Abierto <h3>{{round($tktsporciento[5],2)}}%</h3>
                    </span>
                    <hr>
  
                </div>
              </div>
            </a>
          </div>

        </div>






  
        <div class="kt-widget25__items"> 



          <div class="kt-widget25__item">
             
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{ url('/tickets_notificado_al_usuario/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$NotificadoAlUsuario}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style= "width: {{$tktsporciento[8]}}%;" aria-valuenow={{$NotificadoAlUsuario}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Notificado al Usuario <h3>{{round($tktsporciento[8],2)}}%</h3>
                    </span>
                    <hr>
  
                </div>
              </div>
            </a>
          </div>






          <div class="kt-widget25__item">            
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{ url('/tickets_cerradospt/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$cerradoPT}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style= "width: {{$tktsporciento[10]}}%;" aria-valuenow={{$cerradoPT}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Cerrado por Tiempo <h3>{{round($tktsporciento[10],2)}}%</h3>
                    </span>
                    <hr>
                </div>
              </div>
            </a>
          </div>



          
          <div class="kt-widget25__item">
             
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                  <span class="kt-widget25__number">
                    {{$Entramite}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class="progress-bar kt-bg-danger barra_progreso" role="progressbar" style= "width: {{$tktsporciento[9]}}%;" aria-valuenow={{$Entramite}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      En Tramite <h3>{{round($tktsporciento[9],2)}}%</h3>
                    </span>
                    <hr>
                </div>
              </div>
            
          </div>
        </div> 

        

        <div class="kt-widget25__items"> 
          <div class="kt-widget25__item">            
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{ url('/tickets_cerrados_exitosamente/') }}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$cerradoexitosamente}}
                      </span>					 
                    <div class="progress m-progress--sm " style="height: 1rem">
                      <div class=" tktstotales progress-bar kt-bg  barra_progreso" role="progressbar" style= "width: {{$tktsporciento[11]}}%;" aria-valuenow={{$cerradoexitosamente}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Cerrado exitosamente <h3>{{round($tktsporciento[11],2)}}%</h3>
                    </span>
                    <hr>
                </div>
              </div>
            </a>
          </div>  
        </div>


        <div class="kt-widget25__items"> 
          


          <div class="kt-widget25__item">
            
              <div class="item-wrapper">
                <div class="line line-top"><span></span></div>
                <div class="line line-right"><span></span> </div>
                <div class="line line-bottom"><span></span> </div>
                <div class="line line-left"><span></span>  </div>        
                <div class="item">
                <a id="link"  href="{{url('/solicitud_toner/')}}" target="_blank">
                  <span class="kt-widget25__number">
                    {{$solicitudToner}}
                      </span>					 
                    <div class="progress m-progress--sm" style="height: 1rem">
                      <div class=" Cerrados_exitosamente progress-bar kt-bg  barra_progreso" role="progressbar" style= "width: {{$tktsporciento[3]}}%;" aria-valuenow={{$cerradoexitosamente}} aria-valuemin="0" aria-valuemax={{$solicitudToner}}></div>
                    </div>
                    <span class="kt-widget25__desc">
                      <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div> 
                      Solicitud De Toner <h3>{{round($tktsporciento[3],2)}}%</h3>
                    </span>
                    <hr>
                </div>
              </div>
            </a>
          </div>            
      </div>
      <div>
        <a href="javascript:window.print()" >Imprimir</a>
      </div>      
          
  </div>
  

</div>
</div>
@section('scripts') 
@endsection
@endsection
