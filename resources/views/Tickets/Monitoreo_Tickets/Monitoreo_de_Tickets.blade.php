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

        
        <div class="header_titulo_monitoreo_tkts text-center" style="margin-bottom: 15px;">
          <div class="phrase">
            <span class="words">
              <i>Mesa de Servicio</i>
              <i> Monitoreo de Tickets</i>            
            </span>
          </div>
            
        </div>
   <div class="card-deck  " >
      <div class="card cardhvr" >   
          <div class="card-header text-center" ><h4>Tickets Totales</h4> </div>
            <a href="{{url('users/grafic')}} " target="_blank">
              <div class="card-body text-center" >
                   <i class="fas fa-ticket-alt" style="font-size:36px  "> {{ $ticket}} </i>
              </div>
            </a>
            <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
      </div>
        
  
        <div class="card cardhvr " >
          <div class="card-header text-center" ><h4>Tickets Asignados</h4> </div>
          <a href="{{url('users/tks_asignados')}}" target="_blank"> 
            <div class="card-body text-center ">
               <i class="fas fa-ticket-alt" style="font-size:36px " id="btAsignados"> {{ $asignado}} </i>   
            </div>
          </a>
          <!--<a href="{{url('users/tks_asignados')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
        </div>

    </div>




<div class="card-deck">
<div class="card cardhvr">
  <div class="card-header text-center " ><h4>Tickets Atendidos</h4> </div>
  <a href="{{url('users/tks_atendidos')}}" target="_blank">
  <div class="card-body text-center ">
    
      <i class="fas fa-ticket-alt" style="font-size:36px"  id="btAsignados"> {{ $atendido}} </i>   
     
  </div>
  </a> 
</div>

<div class="card cardhvr">
  <div class="card-header text-center"><h4>Tickets Falta de Acta Responsiva</h4></div>
  <a href="{{url('users/tickets_falta_acta_responsiva')}}" target="_blank">
  <div class="card-body text-center">

      <i class="fas fa-ticket-alt" style="font-size:36px"  id="btAsignados"> {{$FaltaActaRES}} </i>   
     
  </div>
  </a> 
</div>

<div class="card cardhvr ">
  <div class="card-header text-center"><h4>Tickets Nuevos</h4></div>
  <a href=" {{url('users/tickets_pendiente')}}" target="_blank">
    <div class="card-body text-center ">
      
        <i class="fas fa-ticket-alt" style="font-size:36px"  id="btAsignados"> {{$pendienteatc}} </i>   
    </div>
  </a> 
  </div> 
</div>


<div class="card-deck">
        <div class="card cardhvr" >
  
          <div class="card-header text-center"><h4>Tickets En Espera de Información</h4> </div>
          <a href=" {{url('users/tickets_espera_inf')}}" target="_blank">
            <div class="card-body text-center">
                 
                  <i class="fas fa-ticket-alt" style="font-size:36px " id="btAsignados"> {{ $espinformacion}} </i> 
                
            </div>
          </a> 
         <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>  
        
 
        <div class="card cardhvr" >
          <div class="card-header text-center"><h4>Tickets Abierto</h4> </div>
          <a href=" {{url('users/tickets_abiertos')}}" target="_blank">
            <div class="card-body text-center">
                <div class="h5 mb-0 font-weight-bold text-gray-800" > 
                  <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $abierto}} </i>
                </div>
            </div>
            </a>
         <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div> 
        
        <div class="card cardhvr" >
          <div class="card-header  text-center"><h4>Cerrado exitosamente</h4> </div>
          <a href=" {{url('users/tickets_cerradosEX')}}" target="_blank">
          <div class="card-body text-center">
               
                <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $cerradoexitosamente}} </i>
              
          </div>
          </a>
         <!-- <a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
        </div>            
      </div>

      <div class="card-deck mt-3">
        <div class="card cardhvr" >
          <div class="card-header text-center"><h4>Cerrado por Tiempo</h4> </div>
          <a href=" {{url('users/tickets_cerradosPT')}}" target="_blank">
          <div class="card-body text-center">
               <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $cerradoPT}} </i> 
          </div>
          </a>
          <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->

        </div> 
        <div class="card cardhvr " >
          <div class="card-header text-center"><h4>En Tramite</h4> </div>
          <!-- <a href=" {{url('users/tickets_pendiente')}}">-->
          <div class="card-body text-center">
               <i class="fas fa-ticket-alt" style="font-size:36px "> {{$Entramite}} </i> 
          </div>
          <!-- </a> -->
          <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
        </div>  
        <div class="card cardhvr" >
          <div class="card-header text-center"><h4>Notificado al Usuario</h4> </div>
          <a href=" {{url('users/tickets_notificado_al_Usuario')}}" target="_blank">
          <div class="card-body text-center">
               <i class="fas fa-ticket-alt" style="font-size:36px "> {{ $NotificadoAlUsuario}} </i> 
          </div>
          </a>
          <!--<a href="{{url('users/tickets_espera_inf')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a>-->
        </div>      
      </div>




<a href="javascript:window.print()" >Imprimir</a> </button>
</div>







<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
@section('scripts') 
@endsection
@endsection