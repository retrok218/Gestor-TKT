@extends('home')
<meta http-equiv="refresh" content="1220" />
@section('content')
<script>
    var titulo_tab = "Tickets Nuevos";
    var name_tabla = "/data_tickets_nuevos";    
</script>
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
  <div class="card" style="border: 1px; background: white;">   
    <img  class="header_titulo_monitoreo_tkts"  src="{{ URL::asset('assets/media/company-logos/logotipo SAF-01.jpg'.env('APP_LOGO_ASIDE') ) }}" >                
  </div>
  <div class="kt-portlet__head">
    <div class="header_titulo_monitoreo_tkts text-center" style="margin-bottom: 15px;">
      <div class="phrase">
        <span class="words">
          <i>Mesa de Servicio</i>
          <i> Monitoreo de Tickets</i>
        </span>
      </div>          
    </div>
  </div>

  <div class="kt-portlet">    
    <div class="kt-portlet__body">
      <div class="kt-widget25">
        <span class="kt-widget25__stats m-font-brand">{{$ticket}}</span>
        <span class="kt-widget25__subtitle">Tickets Totales</span>
        <div class="kt-widget25__items">
  
  
  

            <div class="kt-widget24">
              <div class="kt-widget24__details">
                <div class="kt-widget24__info">
                  <h4 class="kt-widget24__title">
                    Tickets Asignados
                      </h4>                      
                </div>
                <span class="kt-widget24__stats kt-font-brand">
                  {{$asignado}}
                  </span>	 
              </div> 
    
                <div class="progress progress--sm" style="height: 1rem">
                <div class="progress-bar kt-bg-brand barra_progreso" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="kt-widget24__action">
                <span class="kt-widget24__number">
                  <h3>{{round($tktsporciento[0],2)}}%</h3>
                  </span>
              </div>				   			      
            </div>      
          
  
  
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
              {{$atendido}}
              </span>					 				
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style="width: {{$tktsporciento[1]}}%;" aria-valuenow={{$atendido}} aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="kt-widget25__desc">
              Tickets Atendidos <h3>{{round($tktsporciento[1],2)}}%</h3>
            </span>
          </div>	
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$FaltaActaRES}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[7]}}%;" aria-valuenow={{$tktsporciento[7]}} aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="kt-widget25__desc">
              Falta Acta Responsiva <h3>{{round($tktsporciento[7],2)}}%</h3>
            </span>
          </div>	                
        </div>	
  
  
  
        <div class="kt-widget25__items">
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$pendienteatc}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[2]}}%;" aria-valuenow={{$tktsporciento[2]}} aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="kt-widget25__desc">
              Tickets Nuevos <h3>{{round($tktsporciento[2],2)}}%</h3>
            </span>
          </div>
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$espinformacion}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[4]}}%;" aria-valuenow={{$tktsporciento[4]}} aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="kt-widget25__desc">
              Tickets En Espera de Información<h3>{{round($tktsporciento[4],2)}}%</h3>
            </span>
          </div>
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$abierto}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style="width: {{$tktsporciento[5]}}%;" aria-valuenow={{$tktsporciento[5]}} aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="kt-widget25__desc">
              Tickets Abierto <h3>{{round($tktsporciento[5],2)}}%</h3>
            </span>
          </div>
      
        </div>
  
        <div class="kt-widget25__items">
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$cerradoexitosamente}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style= "width: {{$tktsporciento[11]}}%;" aria-valuenow={{$cerradoexitosamente}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
            </div>
            <span class="kt-widget25__desc">
              Cerrado exitosamente <h3>{{round($tktsporciento[11],2)}}%</h3>
            </span>
          </div>
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$cerradoPT}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-warning barra_progreso" role="progressbar" style= "width: {{$tktsporciento[10]}}%;" aria-valuenow={{$cerradoPT}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
            </div>
            <span class="kt-widget25__desc">
              Cerrado por Tiempo <h3>{{round($tktsporciento[10],2)}}%</h3>
            </span>
          </div>
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$Entramite}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-danger barra_progreso" role="progressbar" style= "width: {{$tktsporciento[9]}}%;" aria-valuenow={{$Entramite}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
            </div>
            <span class="kt-widget25__desc">
              En Tramite <h3>{{round($tktsporciento[9],2)}}%</h3>
            </span>
          </div>
        </div>
  
        <div class="kt-widget25__items">
  
          <div class="kt-widget25__item">
            <span class="kt-widget25__number">
            {{$NotificadoAlUsuario}}
              </span>					 
            <div class="progress m-progress--sm" style="height: 1rem">
              <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style= "width: {{$tktsporciento[8]}}%;" aria-valuenow={{$NotificadoAlUsuario}} aria-valuemin="0" aria-valuemax={{$ticket}}></div>
            </div>
            <span class="kt-widget25__desc">
              Notificado al Usuario <h3>{{round($tktsporciento[8],2)}}%</h3>
            </span>
          </div>
  
  
        </div>
      </div>			 
    </div>
    
  </div>


  


        
        

  
      
        
  






<a href="javascript:window.print()" >Imprimir</a> </button>
</div>
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
@section('scripts') 
@endsection
@endsection