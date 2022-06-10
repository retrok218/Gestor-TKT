@extends('home')
<!-- <meta http-equiv="refresh" content="60">-->
@section('content')

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-iconbox ">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">
                            <div class="kt-widget__media kt-hidden-">
                                <!-- <img src="./assets/media/project-logos/3.png" alt="image"> -->
                            </div>
                            <div class="kt-widget__content">
                                <div class="kt-widget__head">
                                    <a href="#" class="kt-widget__title">Gestor De Tickets</a>
                                </div>
                                <hr>
                                <div class="">
                                    <div class="new2" > New </div>
                                    <div id="news2"></div>
                                    <div class="clear2"></div>
                                </div>                                                                                          
                            </div>
                        </div>

                      <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="row">                      
                                    <div class="col-lg-4">
                                        <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
                                            <div class="kt-portlet__body">
                                                <div class="kt-iconbox__body">
                                                    
                                                    <div class="kt-iconbox__desc">
                                                        <h3 class="kt-iconbox__title">
                                                                <a class="kt-link" href="#">Tickets del Año - {{$año}}</a>
                                                            </h3>
                                                        <div class="kt-iconbox__content">
                                                            {{ $ticket_por_año }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
                                            <div class="kt-portlet__body">
                                                <div class="kt-iconbox__body">                                                    
                                                    <div class="kt-iconbox__desc">
                                                        <h3 class="kt-iconbox__title">
                                                                <a class="kt-link" href="#">Tickets del Mes - {{$mes}}</a>
                                                            </h3>
                                                        <div class="kt-iconbox__content">
                                                            {{ $tickets_por_mes }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
                                            <div class="kt-portlet__body">
                                                <div class="kt-iconbox__body">
                                                    
                                                    <div class="kt-iconbox__desc">
                                                        <h3 class="kt-iconbox__title">
                                                                <a class="kt-link" href="#">Tickets del Dia - {{$dia}}</a>
                                                            </h3>
                                                        <div class="kt-iconbox__content">
                                                            {{ $tickets_por_dia }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>             
                  </div>
                </div> 
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="container-busqueda">

                        <div class="card-header-gestkt text-center"><h5> Buscar Ticke </h5></div>
                        
                         <div class="formulario-tkt">
                         <form method="GET" class="form fas fa-ticket-alt" style='font-size:30px; '>      
                                <input name="tktaconsultar" type="text"  maxlength="8" minlength="8" placeholder="Buscar Ticket"   style="background-color: #fff8f8e0; font-size:20px"  required>
                              <button type="submit" class="btn btn-success text-cemter" >Consultar</button>       
                          </form>
                          </div>
                          
                        
                        
                          @if($_GET)
                            @php          
                                  $tktbuscado = $_GET['tktaconsultar'];
                                  $consulta = DB::connection('pgsql2')->table('ticket')->where('ticket.tn','=',$tktbuscado)
                                    ->join("queue","queue.id","=","ticket.queue_id")
                                    ->join("ticket_state","ticket_state.id","=","ticket.ticket_state_id")
                                    ->join("customer_user","customer_user.customer_id","=","ticket.customer_id")
                                    ->select(
                                    'ticket.id',
                                    'ticket.tn',
                                    'ticket.create_time',
                                    'ticket.title',
                                    'ticket.user_id',
                                    'queue.name as qname',
                                    'ticket_state.name',
                                    'customer_user.first_name as nombre',
                                    'customer_user.last_name as apellido')                        
                                  ->get();             
                            @endphp
                                  @if(count($consulta))
                                   @php             
                                    foreach($consulta as $tktconsultado)
                                      $idtkt = $tktconsultado->id;
                                      $numerotiket= $tktconsultado ->tn;
                                      $fechadeltiket=$tktconsultado->create_time;
                                      $asuntodeltiket=$tktconsultado->title;
                                      $nusuario=$tktconsultado->nombre;
                                      $apusuario=$tktconsultado->apellido;
                                      $areadeltiket=$tktconsultado->qname;  
                                      if($tktconsultado->name == "closed successful"){
                                        $estado= "Cerrado Exitosamente";
                                      }else if($tktconsultado->name == "open"){
                                        $estado= "Abierto";
                                      }else{
                                        $estado=$tktconsultado->name;
                                      }              
                                    @endphp
                              <div class="card-tktbuscado">
                                <div>                                  
                                    <h4>Ticket encontrado</h4>                                    
                                    <a  href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID={{$idtkt}}" target="_blank" title="Ir en busca del TKT en OTRS">
                                      <div class="cardhvr">
                                        <h5 style="text-align:center; margin-top:5px;">{{$numerotiket}}</h5>
                                      </div>
                                    </a>
                                  
                                  
                                </div>        
                                <table style="border: solid 1px">
                                  <thead class="table table table-striped table-bordered">
                                    <tr class ="card-header">
                                      <th>Fecha creacion del TKT</th>
                                      <th>Asunto del TKT</th>
                                      <th>Usuario</th> 
                                      <th>Area</th>
                                      <th>Estado</th>
                                    </tr>
                                  </thead>
                                  <tbody style="font-size: medium">
                                  <td>{{$fechadeltiket}}</td>
                                  <td>{{$asuntodeltiket}}</td>
                                  <td>{{$nusuario}}.{{$apusuario}}</td>
                                  <td>{{$areadeltiket}}</td>
                                  <td>{{$estado}}</td>
                                </tbody>
                                </table>
                                </div>
                                  @else
                                  <div class="card-noencontrado text-center">
                                  <h3>{{$tktbuscado}}</h3> <p> "No se encontro el TKT"</p>  
                                  </div>
                                  @endif
                                  
                          
                          @endif
                            
                        </div>
                    </div>
                  </div> 
                </div>

                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                      <div class="row">
                          <div id="gporarea" style="border: 2px solid #ffffff;width: 100%; height: 300px;display: inline-block;"></div>
                          <div id="chartContainer4" style="border: 2px solid #ffffff;width: 50%; height: 300px;display: inline-block;"></div>
                          <div id="chartContainer1" style="border: 2px solid #ffffff;width: 50%; height: 300px;display: inline-block; "></div>                       
                      </div>
                    </div>   
                
             
            
               
             
                </div>


                
                





              </div>                        
            </div>  
            <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
              <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="Graficas">
                <a href="javascript:void(0);" id="lnk_search" class=""><i class="flaticon2-chart2"></i></a>
              </li>
              <!-- <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
                <a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
              </li> -->
            </ul>   

            <div id="kt_demo_panel" class="kt-demo-panel" style="opacity: 0;">
              <div class="kt-demo-panel__head" style="" kt-hidden-height="50">
                <h3 class="kt-demo-panel__title">
                  Graficas Todos los Tickets
                  <!--<small>5</small>-->
                </h3>
                <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
              </div>
              <div  class="card-header  text-center border-dark"><h3>Tickets Totales</h3> 
                <div id="sales-doughnut-chart-us" style="border: 2px solid #ffffff;width: 100%; height: 300px;display: inline-block;"></div> 
              </div>              
              <div id="chartContainer" style="border: 2px solid transparent ;width: 100%; height: 300px;display: inline-block;"></div>
            </div>     
        </div>
    </div>
  




    
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>

 <!-- scrip grafica -->
<script type="text/javascript">
                                //variables para la creacion de la grafica lineal 
                                          var totalMesJson = {{$totalMesJson}};
                                          var mesinicio = 1; //mes de inicio
                                          var año_x =2019;
                                //variables para la creacion de la grafica lineal 
                                
 window.onload = function (){var dataLength = 0;             
  CanvasJS.addCultureInfo("es",{
                                                    decimalSeparator: ".",
                                                    digitGroupSeparator: ",",
                                                    days: ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"],
                                                    months:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nob","Dic",]
                                               });
                                  
                                 //grafica Tickets 	
                        var chart0 = new CanvasJS.Chart("chartContainer",{
                                                                          animationEnabled: true,
                                                                          animationDuration: 1000,
                                                                          interactivityEnabled: true,
                                                        exportEnabled: true,
                                                        
                                
                                                                          title:{
                                                                              text: "  Tickets Totales {{$ticket}}  ",
                                                          
                                                                          },
                                
                                                                          legend:{
                                                              horizontalAlign: "right",
                                                              verticalAlign: "center",
                                                          cursor: "pointer",
                                                          itemclick: explodePie,
                                                          
                                                          
                                                           },
                                                                          data: [//array of dataSeries
                                                                              { //dataSeries object
                                                                               /*** Change type "column" to "bar", "area", "line" or "pie"***/
                                                                               type: "pie",
                                                                               showInLegend: true,
                                                                               legendText: "{label}",
                                                           indexLabel: "{label} - #percent%",
                                
                                                                               dataPoints: [
                                                                               { label: "Tikets Nuevos - {{$nuevo}} ", y: {{$nuevo }}  },
                                                           { label: "Tickets Cerrados Exitosamente-{{$rticket }} ", y: {{$rticket }}  },
                                                          
                                                           { label: "Tikets Abierto-{{ $open}} ", y: {{ $open}}  },
                                                           
                                                           { label: "Tikets Cerrado por Tiempo-{{$cerradoPT }} ", y: {{$cerradoPT }}  },
                                                           { label: "Tikets Notificado-{{$notificadoalU }} ", y: {{$notificadoalU }}  },
                                                           { label: "Tikets Asignado- {{$asignado }}", y: {{$asignado }}  },
                                                           { label: "Tikets Atendido-{{$atendido }} ", y: {{$atendido }}  },
                                                           { label: "Tikets espera de informacion-{{$espinformacion }} ", y: {{$espinformacion }}  },
                                                           
                                                           { label: "Tikets En Tramite - {{$Entramite}} ", y: {{$Entramite }}  },
                                                           
                                                           { label: "Tikets Falta Acta Responsiva - {{$FalteActaRES}} ", y: {{$FalteActaRES }}  },
                                
                                                                               ]
                                                                           }
                                                                           ]
                                                                       });
                                                       chart0.render();
                                  //Fin grafica Tickets                                      
                                  // Grafica año/mes/dia
                                  
                                
                                
                                
                                
                                  //Fin  Grafica año/mes/dia
                                
                                //Grafica por Area 
                                
                                  var chart1 = new CanvasJS.Chart("gporarea",{
                                                                              animationEnabled: true,
                                                                              animationDuration: 1000,
                                                                              interactivityEnabled: true,
                                                                              exportEnabled: true,
                                                                              
                                                                              
                                                                              horizontalAlign:"center",
                                                                              
                                                                              
                                    
                                                                              title:{
                                                                                 
                                                                                  text: "Tickets Por Area ",
                                                                                  fontSize: 30,
                                                                                  
                                
                                                                              },
                                    
                                                             legend:{
                                                              fontSize: 12,
                                                              horizontalAlign: "left", // left, center ,right 
                                                              verticalAlign: "center",  // top, center, botto
                                                              itemWrap: false,
                                                              itemWidth: 100,
                                                              cursor: "pointer",
                                                              itemclick: explodePie,
                                                                  
                                                               },
                                
                                                              
                                                             data: [//array of dataSeries
                                                                   { //dataSeries object
                                                                   /*** Change type "column" to "bar", "area", "line" or "pie"***/
                                                                     type: "pie",
                                                                     showInLegend: true,
                                                                     legendText: "{label}",
                                                                     indexLabel: "{label} - #percent%",
                                                                     
                                                                     
                                                                     
                                    
                                                            dataPoints: [
                                                               
                                                               { label: "PostMaster", y: {{$tk_por_area_1}}  },
                                                               { label: "Mesa de Servicio Raw", y: {{$tk_por_area_2}}  },
                                                               { label: "Junk", y: {{$tk_por_area_3}}  },
                                                               { label: "Misc", y: {{$tk_por_area_4}}  },  
                                                               //junk sistemas 32 no se agrego en espera
                                                               { label: "Cuentas de Email", y: {{$tk_por_area_6}}  },
                                                               { label: "Mesa de Servicio CDA", y: {{$tk_por_area_7}}  },
                                                               { label: "ST", y: {{$tk_por_area_8}}  },
                                                               { label: "ST::ST-Zocalo", y: {{$tk_por_area_9}}  },
                                                               { label: "Junk::Sistemas6", y: {{$tk_por_area_10}}  },
                                                               { label: "ST::ST-Lavista", y: {{$tk_por_area_11}}  },
                                                               { label: "ST::CS-Tlatelolco", y: {{$tk_por_area_12}}  },
                                                               { label: "ST::ST-Viaducto", y: {{$tk_por_area_13}}  },
                                                               { label: "ST::ST-Tlaxcoaque", y: {{$tk_por_area_14}}  },
                                                               { label: "Normatividad", y: {{$tk_por_area_15}}  },
                                                               { label: "ST::TE-Express Pemex", y: {{$tk_por_area_16}}  },
                                                               { label: "DASI", y: {{$tk_por_area_17}}  },
                                                               { label: "ST::TE-Express Norte", y: {{$tk_por_area_18}}  },
                                                               { label: "Cancelaciones", y: {{$tk_por_area_19}}  },
                                                               { label: "DECSI", y: {{$tk_por_area_20}}  },
                                                               { label: "ST::ST-DGPI", y: {{$tk_por_area_21}}  },
                                                               { label: "DECSI::Infraestructura", y: {{$tk_por_area_22}}  },
                                                               { label: "Seguridad Informática", y: {{$tk_por_area_23}}  },
                                                               { label: "DASI::Impresión", y: {{$tk_por_area_24}}  },
                                                               { label: "ST::ST-Procuraduría Fiscal", y: {{$tk_por_area_25}}  },
                                                               { label: "DECSI::Servidores", y: {{$tk_por_area_26}}  },
                                                               { label: "ST::ST-Fiscalización", y: {{$tk_por_area_27}}  },
                                                               { label: "DECSI::Redes", y: {{$tk_por_area_28}}  },
                                                               { label: "ST::ST-SAT", y: {{$tk_por_area_29}}  },
                                                               { label: "DASI::Incidentes Informáticos", y: {{$tk_por_area_30}}  },
                                                               { label: "Mesa de Servicio", y: {{$tk_por_area_31}}  },
                                                               { label: "Sistemas::SSP", y: {{$tk_por_area_32}}  },
                                                               { label: "ST::ST-Egresos", y: {{$tk_por_area_33}}  },
                                                               { label: "Junk::Sistemas7", y: {{$tk_por_area_34}}  },
                                                               { label: "Sistemas", y: {{$tk_por_area_35}}  },
                                                               { label: "Capital-Humano", y: {{$tk_por_area_36}}  },
                                                               { label: "Sistemas::CDA", y: {{$tk_por_area_37}}  },
                                                               { label: "ST::ST-KATS", y: {{$tk_por_area_38}}  },
                                                               { label: "ST::ST-Fray Servando", y: {{$tk_por_area_40}}  },
                                                               { label: "Junk::Sistemas9", y: {{$tk_por_area_41}}  },
                                                               { label: "Junk::Sistemas13", y: {{$tk_por_area_42}}  },
                                                               { label: "Sistemas::CDSI", y: {{$tk_por_area_43}}  },
                                                               { label: "Junk::Sistemas3", y: {{$tk_por_area_44}}  },
                                                               { label: "Junk::Sistemas5", y: {{$tk_por_area_45}}  },
                                                               { label: "Mesa de Servicio CDSI", y: {{$tk_por_area_46}}  },
                                                               { label: "Junk::Sistemas4", y: {{$tk_por_area_47}}  },
                                                               { label: "Junk::Sistemas8", y: {{$tk_por_area_48}}  },
                                                               { label: "Sistemas::Rcubica IT", y: {{$tk_por_area_49}}  },
                                                               { label: "Sistemas::Consultoría SAP-GRP", y: {{$tk_por_area_50}}  },
                                                               { label: "Sistemas::SPAS", y: {{$tk_por_area_51}}  },
                                                               { label: "Sistemas::DECSI", y: {{$tk_por_area_52}}  },
                                                               { label: "Sistemas::DGTIC", y: {{$tk_por_area_53}}  },
                                                               { label: "DASI::Email", y: {{$tk_por_area_54}}  }, 
                                                            ]
                                                         }]
                                  });
                                      chart1.render();
                                
                                
                                
                                function explodePie (e) {
                                    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                                        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                                    } else {
                                        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                                    }
                                
                                  for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                                        e.dataSeries.dataPoints[i].color = (e.dataSeries.dataPoints[i].exploded) ? "#242424" : null;
                                    }
                                    e.chart1.render();
                                }
                                    
                                
                                  // Fin Grafica por mes
                                
                                
                                var chart2 = new CanvasJS.Chart("chartContainer4",{
                                                animationEnabled: true,
                                                animationDuration: 1000,
                                                interactivityEnabled: true,
                                                exportEnabled: true,
                                                culture:"es",
                                                theme:"light1",
                                                title:{text: " Tickets Por Mes"},
                                                
                                
                                
                                    axisX:{
                                      interval: 1,
                                  intervalType: "month",
                                  valueFormatString: "MMMM"
                                
                                    },
                                
                                    toolTip: {
                                        shared: true
                                    },
                                    legend: {
                                        cursor: "pointer",
                                        itemclick: toggleDataSeries
                                    },
                                
                                
                                  data: [{
                                      name: "2021",
                                          type: "area",
                                          color: "#369EAD",
                                          showInLegend: true,
                                          axisYIndex: 1,
                                      dataPoints: [
                                        //imprecion de php 
                                
                                              {x:new Date(2021,00,00), y: {{$mes_enero2}} },
                                              {x:new Date(2021,01,00), y: {{$mes_febrero2}} },
                                              {x:new Date(2021,02,00), y: {{$mes_marzo2}} },
                                              {x:new Date(2021,03,00), y: {{$mes_abril2}} },
                                              {x:new Date(2021,04,00), y: {{$mes_mayo2}} },
                                              {x:new Date(2021,05,00), y: {{$mes_junio2}} },
                                              {x:new Date(2021,06,00), y: {{$mes_julio2}} },
                                              {x:new Date(2021,07,00), y: {{$mes_agosto2}} },
                                              {x:new Date(2021,08,00), y: {{$mes_septiembre2}} },
                                              {x:new Date(2021,09,00), y: {{$mes_octubre2}} },
                                              {x:new Date(2021,10,00), y: {{$mes_noviembre2}} },
                                              {x:new Date(2021,11,00), y: {{$mes_diciembre2}} },
                                      ]
                                      },
                                      {
                                      name: "2022",
                                          type: "area",  		
                                          color: "#C24642",
                                          axisYIndex: 1,
                                          showInLegend: true,
                                      dataPoints: [
                                              {x:new Date(2022,00,00), y: {{$mes_enero}} },
                                              {x:new Date(2022,01,00), y: {{$mes_febrero}} },
                                              {x:new Date(2022,02,00), y: {{$mes_marzo}} },
                                              {x:new Date(2022,03,00), y: {{$mes_abril}} },
                                              {x:new Date(2022,04,00), y: {{$mes_mayo}} },
                                              {x:new Date(2022,05,00), y: {{$mes_junio}} },
                                              {x:new Date(2022,06,00), y: {{$mes_julio}} },
                                              {x:new Date(2022,07,00), y: {{$mes_agosto}} },
                                              {x:new Date(2022,08,00), y: {{$mes_septiembre}} },
                                              {x:new Date(2022,09,00), y: {{$mes_octubre}} },
                                              {x:new Date(2022,10,00), y: {{$mes_noviembre}} },
                                              {x:new Date(2022,11,00), y: {{$mes_diciembre}} },
                                
                                      ]
                                      }
                                  ]
                                
                                });
                                chart2.render();
                                
                                
                                function toggleDataSeries(e) {
                                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                  e.dataSeries.visible = false;
                                } else {
                                  e.dataSeries.visible = true;
                                }
                                e.chart2.render();
                                
                                }
                                
                                  // conteo de tickets por año me y dia fecha actual 
                                    var chart3 = new CanvasJS.Chart("chartContainer1",
                                         {
                                           animationEnabled: true,
                                           animationDuration: 1000,
                                           interactivityEnabled: true,
                                           exportEnabled: true,
                                             title: {
                                                 text: "Tickets Año-{{$año}}/ Mes-{{$mes}}/ Dia-{{$dia}}"
                                             },
                                             data: [
                                             {
                                               markerType:"circle",
                                               type: "column",
                                               ilegendText: "{label}",
                                
                                               dataPoints: [
                                                 { label: "Tickets Por Año", y: {{$ticket_por_año}}  },
                                                 { label: "Tickets Por Mes", y: {{$tickets_por_mes}}  },
                                                 { label: "Tickets Por Dia", y: {{$tickets_por_dia}} },
                                                 ]
                                             }
                                             ]
                                         });
                                     chart3.render();
                                     
                                
                                     // Separador 3 construccion
                                
                                  var chart4 = new CanvasJS.Chart("sales-doughnut-chart-us",
                                       {
                                        
                                         animationEnabled: true,
                                          
                                
                                          title: {
                                            fontColor: "#000000",
                                            fontSize: 70,
                                            horizontalAlign: "center",
                                            text: "{{$ticket}}",
                                            verticalAlign: "center"
                                          },
                                          toolTip: {
                                            backgroundColor: "#ffffff",
                                            borderThickness: 0,
                                            cornerRadius: 0,
                                            fontColor: "#424242"
                                           },
                                           data: [
                                           {
                                             explodeOnClick: true,
                                              innerRadius: "90%",
                                              radius: "90%",
                                              startAngle: 270,
                                              type: "doughnut",
                                
                                //Secciones del aro
                                
                                             dataPoints: [
                                               { y: {{$ticket}}, color: "#1F842F ", toolTipContent:null },
                                               ]
                                           }
                                           ]
                                       });
                                   chart4.render();
                                };






                                
                                
                                var nuevotk = [
                                  "Ultimo Ticket ingresado {{$ultimoTK->tn}}  /  {{$ultimoTK->create_time}}  .  .  ." 
                                ],
                                  x = 0,
                                  y = 0,
                                 num = 100,
                                 news = document.getElementById("news2"),
                                  
                                  last = setInterval(function() {
                                    news.textContent += nuevotk[y][x++] ;
                                     
                                      if(x > nuevotk[y].length) { 
                                        x = 0;
                                        news.textContent = "";    
                                                  
                                      }  
                                  },num );
                                
                                  function oneClick(e) {
                                    
                                    
                                  }
                                  
                                
                                
</script>
@endsection
@endsection
