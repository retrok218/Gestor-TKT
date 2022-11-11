@extends('home')
<!-- <meta http-equiv="refresh" content="120 "> -->
@section('content')
<script>
  var titulo_tab = 'Control Toners ';
  
</script>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">    
<div class="kt-portlet__head">
    <div class="header_titulo_monitoreo_tkts text-center">      
      <!-- <div class="card-header fondoberde"  > --> 
      <div class="card-header "  >
                <div class="containerglass ">
                    <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(2em + 1vw);">
                    Tablero Mesa de Servicio                                             
                    </span>    
                </div>
        </div> 
    </div>    
  </div>   
    
        <div class="kt-portlet__body">                    
                  <div class="row row-no-padding row-col-separator-xl">			
                        <div class="col-md-12 col-lg-12 col-xl-12">                          
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
                                              <span class="kt-widget25__stats m-font-brand" style="font-size:36px">- {{$ticket}}</span>                                                                                      
                                        </div>            
                                  </div>
                                  <div class="col-sm-6" >
                                      <div class="kt-widget25">
                                          <div class="kt-widget24__info" style="
                                          text-align: initial;">
                                              <h4 class="kt-widget24__title">
                                                  Tickets Solicitud de Toner
                                              </h4>					       
                                          </div>
                                          <div class="fas fa-ticket-alt fa-spin fa-3x" ></div>
                                              <span class="kt-widget25__stats m-font-brand" style="font-size:36px">- {{$solicitudToner}}</span>                                                  
                                      </div>            
                                  </div>                                                         
                              </div>                                
                              <div class="progress progress--sm" style="height: 1rem">                                                                                            
                                <div class="progress-bar barra_progreso" role="progressbar" style="width: {{$ticket-$solicitudToner}}" aria-valuenow={{$ticket-$solicitudToner}} aria-valuemin={{$ticket-$solicitudToner}} aria-valuemax={{$ticket}}></div>                                               
                                <div class="progress-bar kt-bg-success barra_progreso" role="progressbar" style= "width: {{round(($solicitudToner*100)/$ticket."2")}}%" aria-valuenow={{$solicitudToner}} aria-valuemin={{$ticket}} aria-valuemax={{$solicitudToner}}></div>                                                                                           
                              </div>              
                              <div class="kt-widget24__action">  
                                    <span class="kt-widget24__number"></span>
                                    <span class="kt-widget24__number">
                                        {{round(($solicitudToner*100)/$ticket."2")}}%
                                    </span>
                              </div>	
                              <hr>

                              <div class="row" style="color: #595d6e;">
                                <div class="col-sm-6" >  
                                    <div class="kt-widget25"  style="border-right: groove;">
                                        <div class="kt-widget24__info" style="
                                        text-align: initial;">
                                            <h4 class="kt-widget24__title">
                                                Toners Solicitados
                                            </h4>					       
                                        </div> 
                                        
                                        <div style="font-size:36px">
                                          <div class="fas fa-ticket-alt fa-spin fa-3x" style="
                                          font-size: 3rem !important;" ></div>
                                           - <i class="fa" style="font-size:36px" id="tonsolicitado"></i>                                           
                                          </div>                                                                                                                                                                                                              
                                      </div>            
                                </div>
                                <div class="col-sm-6" >
                                    <div class="kt-widget25">
                                        <div class="kt-widget24__info" style="
                                        text-align: initial;">
                                            <h4 class="kt-widget24__title" >
                                                Toners Entregados
                                            </h4>					       
                                        </div>
                                        <div style="font-size:36px">
                                          <div class="fas fa-ticket-alt fa-spin fa-3x" style="
                                          font-size: 3rem !important;"></div> 
                                         - <i class="fa"  id="tonentregado"></i>  
                                       </div>

                                    </div>            
                                </div>     
                            </div>
                            
                            
                    </div>                    
                  </div>  
                </div>  
          
     <div class="kt-portlet kt-portlet--height-fluid">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <span class="kt-portlet__head-icon">
            <i class="kt-font-brand flaticon2-line-chart"></i>
          </span>
          <h3 class="kt-portlet__head-title ">
            Tickets Solicut de Toner 
          </h3>
        </div>		
      </div>
      <div class="kt-portlet__body">
        <div class="tab-content">
          <div class="tab-pane active" id="kt_widget11_tab1_content">          
            <div class="kt-widget11">                              
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
                                <button class="btn btn-default clear-date-filter">Limpiar Filtros</button>
                              </div>
                          </div>        


                              
                      </div>                    
                  </div> 
              </form>
              
                <table class="display" style="width:100%" id="tablatoners" >
                    <thead > 
                                                       -->
                        <tr>
                            <th>Numero del TKT</th>                                                      
                            <th>1.-Solicitado Tipo de Toner </th>
                            <th>1.-Solicitado Cantidad</th>
                            <th>2.-Solicitado Tipo de Toner </th>
                            <th>2.-Solicitado Cantidad</th>
                            <th>3.-Solicitado Tipo de Toner</th>  <!-- Tipo de toner solicitado 3 -->
                            <th>3.-Solicitado Catidad</th>       <!-- Cantidad de toner  -->
                            <th>4.-Solicitado Tipo de Toner</th>  <!-- Tipo de toner solicitado 3 -->
                            <th>4.-Solicitado Catidad</th>            
                            <th>1.-Cantidad entregada </th>
                            <th>1.-Tipo de Toner Entregado</th>
                            <th>2.-Cantidad entregada </th>
                            <th>2.-Tipo de Toner Entregado</th>
                            <th>3.-Cantidad entregada </th>
                            <th>3.-Tipo de Toner Entregado</th>
                            <th>4.-Cantidad entregada </th>
                            <th>4.-Tipo de Toner Entregado</th>
                            <th>Fecha </th>
                            <th>Descripcion de TKT</th>
                            <th>Dependencia</th>
                            <th>Fila</th>  
                            <th>Cometario de Entrega</th>                                                    
                            <th>Estado</th>                                  
                        </tr>
                    </thead>                    
                    <tfoot>                       
                    <th></th>
                        <th></th>
                        <th></th>
                        <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo "></th>
                        <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo "></th>
                        <th ></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>            
                    </tfoot>                              
                </table> 					                
              
            </div>
                        						             
          </div>
        </div>
      </div>

      
    </div>


    







<ul class="kt-sticky-toolbar" style="margin-top: 30px;">
      <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="Graficas">
        <a href="javascript:void(0);" id="lnk_search" class=""><i class="flaticon2-chart2"></i></a>
      </li>
     
	
</ul>


<!-- end::Sticky Toolbar -->
	<!-- begin::Demo Panel -->

<div id="kt_demo_panel" class="kt-demo-panel" style="width: 442px">
	<div class="kt-demo-panel__head">
		<h3 class="kt-demo-panel__title">
			Ticket Solicitud de Toner
			<!--<small>5</small>-->
		</h3>
		<a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
	</div>
	<div class="kt-demo-panel__body" >
        <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                       Tickets Toner Por Fila
                    </div>                    
                    <div class="kt-demo-panel__item-preview">
                    <div id="graficaTonerArea" style="height: 400px; width: 100%;"></div>
                    </div>
        </div>  
         <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Tickets por Estado del Ticket
                    </div>                    
                    <div class="kt-demo-panel__item-preview">
                    <div id="graficatonerporestado" style="height: 400px; width:100%;"> </div>
                    </div>
        </div> 
                         
    </div>              		
	</div>
  </div>
  </div>
@include('layouts/scripts/scripts')
<script src="{{URL::asset('js/datatabletoner.js')}}"></script>
@section('scripts')



<script>


 // Grafica de Tikect solicitud de Toner 
window.onload = function () {
	var chart = new CanvasJS.Chart("graficaTonerArea",
	{
    
		legend: {
      fontSize: 9,
                              horizontalAlign: "center", // left, center ,right 
                              verticalAlign: "top",  // top, center, botto
                              itemWrap: false,
                              itemWidth: 100,
                              cursor: "default",
                              markerMargin:5,
                              itemMaxWidth: 100, // ancho maximo del elemento 
                              
                             
		},
		data: [
		{
			type: "pie",   
      indexLabelMaxWidth: 80,   
      indexLabelPlacement: "outside",
      showInLegend: true,     
      legendText: "{label}",      	            
			dataPoints: [
        @foreach ($areas_filastkts as $areacount)         
              {y:{{$areacount->coun}},label: "{{$areacount->name}} - {{$areacount->coun}}" },           
         @endforeach    
			]
		}]

	});
	chart.render();

  var chart = new CanvasJS.Chart("graficatonerporestado",
  
	{
    
		legend: {
      fontSize: 9,
                              horizontalAlign: "left", // left, center ,right 
                              verticalAlign: "top",  // top, center, botto
                              itemWrap: false,
                              itemWidth: 250,
                              cursor: "default",
                              markerMargin:10,
                              itemMaxWidth: 700,
                              
                             
		},
		data: [
		{
			type: "pie",      
      indexLabelPlacement: "outside",
      showInLegend: true,     
      legendText: "{label}",      	            
			dataPoints: [
        @foreach ($estado_graf as $estadotkt)               
        {  y:{{$estadotkt->conteo}},label: "{{$estadotkt->name}} - {{$estadotkt->conteo}}" },           
         @endforeach   
			]
		}]

	});
	chart.render();
}


</script>




<!-- fin de la datatable-->
@endsection
@endsection












