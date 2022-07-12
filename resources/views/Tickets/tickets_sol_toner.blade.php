@extends('home')
<!-- <meta http-equiv="refresh" content="120 "> -->
@section('content')
<script>
  var titulo_tab = 'Control Toners ';
</script>



<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">  

  
    <div class="kt-portlet">    
        <div class="kt-portlet__body">                    
                  <div class="row row-no-padding row-col-separator-xl">			
                        <div class="col-md-12 col-lg-12 col-xl-3">
                          
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
          </div>  
      </div>  








                
  
    {{-- <form class="kt-form kt-form--fit kt-margin-b-20">                
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
                  </div>
              </div>        
                  <button class="btn btn-default clear-date-filter">Limpiar Filtross</button>
          </div>                    
      </div> 
  </form>
     --}}






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
            <!--begin::Widget 11--> 
            <div class="kt-widget11">
              <div class="table-responsive">	
                
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
                              </div>
                          </div>        
                              <button class="btn btn-default clear-date-filter">Limpiar Filtross</button>
                      </div>                    
                  </div> 
              </form>
            
            
            
            
            
            
            
                <table id="Solicitudesdetoner" style="width:100%"   >
                    <thead >     
                    <tr>
                            <th colspan="5" style="border-left-color: #cab08f;border-left-width: 3px;border-bottom-color: #cab08f;border-bottom-width: 3px;" >Tickets</th>
                            <th colspan="6" style="border-left-color: #cab08f;border-left-width: 3px;border-bottom-color: #cab08f;border-bottom-width: 3px;">Solicitados </th>
                            <th colspan="8" style="border-left-color: #cab08f;border-left-width: 3px;border-bottom-color: #cab08f;border-bottom-width: 3px;" >Entregados</th>
                        </tr>
            
                        <tr>
                            <th>Numero del TKT</th>
                            <th>Fecha </th>
                            <th>Descripcion de TKT</th>
                            <th>Fila</th>
                            <th >Dependencia</th>
                            
                            <th style="border-left-color: #cab08f;border-left-width: 3px;">1.-Solicitado Tipo de Toner </th>
                            <th>1.-Solicitado Cantidad</th>
                            <th>2.-Solicitado Tipo de Toner2 </th>
                            <th>2.-Solicitado Cantidad</th>
                            <th>3.-Solicitado Tipo de Toner</th>  <!-- Tipo de toner solicitado 3 -->
                            <th>3.-Solicitado Catidad</th>       <!-- Cantidad de toner  -->
            
                            <th style="border-left-color: #cab08f;border-left-width: 3px;">1.-Cantidad entregada </th>
                            <th>1.-Tipo de Toner Entregado</th>
                            <th>2.-Cantidad entregada </th>
                            <th>2.-Tipo de Toner Entregado</th>
                            <th>3.-Cantidad entregada </th>
                            <th>3.-Tipo de Toner Entregado</th>
                            <th>Cometario de Entrega</th>                                                    
                            <th>Estado</th>      
                        </tr>
                    </thead>
                    <tbody>
            
                    @php
                       /* class tktdefinitivo {
                          public $numero_tiket = $tk_id ->tn; 
                        Numero que identfica el TKT
                        }
            
            */
                    @endphp
            
            
            
            
            
                @php
            // Funcion que limpia los datos traidos de la db dentro de la variable texto
                    function eliminasimbolos($texto){                           
                                    $eliminados1 = preg_replace('/FieldName/','',$texto);
                                    $eliminados2 = preg_replace('/[\&\$\{\}""]+/','',$eliminados1);
                                    $eliminados  = preg_replace('/ITSMReview/','',$eliminados2);
                                    $eliminados3 = preg_replace('/@/','',$eliminados);
                                    $eliminados4 = preg_replace('/#/','',$eliminados3);
                                    $eliminados5 = preg_replace('/a-Vacio/','',$eliminados4);
                                    $eliminados6 = preg_replace('/%%Value%%/','',$eliminados5);
                                    $eliminados7 = preg_replace('/%%OldValue%%0/',' ',$eliminados6);
                                    $eliminados8 = preg_replace('/%%OldValue%%/',' ',$eliminados7);
                                    return $eliminados8;
                                }                          
                                $acumuladorsolicitado = 0;
                                $acumuladorentregado = 0;                             
                    @endphp
            @foreach($tk_id as $tk_id)
                @php 
                        $texto = $tk_id->ticket_compuesto ;
                        $modificado = eliminasimbolos($texto);                    
                        $esptoner= array_pad(explode(',',$modificado),12," ");
                    
                        
                  
                    foreach($esptoner as $datotoner){
                      
                                            if(strncasecmp($datotoner,'%%%%Required7',13)===0){
                                                    $dependencia=preg_replace('/%%%%Required7/',' ',$datotoner . "");                                                                                
                                                }                          
                            // Solicitado cantidad 1
                                                elseif(strncasecmp($datotoner,'%%%%Required64',14)===0){
                                                        $cantidad1 = (int)preg_replace ('/%%%%Required64/',' ',$datotoner);
                                                        
                                                         
                                                                                                
                                                }                          
                            //tipo de toner1
                                                if(strncasecmp($datotoner,'%%%%Required65',14)===0){
                                                    $tipodetoner1= preg_replace('/%%%%Required65/','',$datotoner);                                        
                                                }
                            // solicitado cantidad 2                           
                                                elseif(strncasecmp($datotoner,'%%%%Required66',14)===0){
                                                        $cantidad2 =(int) preg_replace ('/%%%%Required66/',' ',$datotoner);                                           
                                                }
                            // tipo de toner 2                           
                                                if(strncasecmp($datotoner,'%%%%Required67',14)===0){
                                                        $tipotoner2 = preg_replace ('/%%%%Required67/','',$datotoner);                                                                                       
                                                }
                            //solicitado cantidad 3 
                                                if(strncasecmp($datotoner,'%%%%Required68',14)===0){
                                                  $cantidad3 = preg_replace ('/%%%%Required68/','',$datotoner);
                                                }
                            //tipo de toner 3  
                                                elseif(strncasecmp($datotoner,'%%%%Required69' ,14)===0){                                      
                                                  $tipotoner3 = preg_replace('/%%%%Required69/','',$datotoner); 
                                                }
                      
                      
                      
            
                            // Entregado tipotoner1         
            
                                                if(strncasecmp($datotoner,'%%%%Required34',14)===0){
                                                        $comentario_entrega = preg_replace ('/%%%%Required34/','',$datotoner);                                                             
                                                }
                                               
                            //Entregado cantidad toner 1                           
                                                if(strncasecmp($datotoner,'%%%%Required35',14)===0){
                                                        $cantidadtonerentregado1 = (int)preg_replace('/%%%%Required35/',' ',$datotoner);                                       
                                                }    
                            //Toner entregado 1
                                                  elseif(strncasecmp($datotoner,'%%%%Required53',14)===0){
                                                      $tipotonerentregado1 = preg_replace('/%%%%Required53/','',$datotoner);                                          
                                                  }
            
                            //Entregado cantidad 2
                                               if(strncasecmp($datotoner,'%%%%Required56',14)===0){
                                                        $cantidadtonerentregado2 = (int)preg_replace('/%%%%Required56/',' ',$datotoner);                                       
                                                }
                            //Toner Entregado Tipo 2
                                                elseif(strncasecmp($datotoner,'%%%%Required57',14)===0){
                                                      $tipotonerentregado2 = preg_replace('/%%%%Required57/','',$datotoner);                                          
                                                  }
                            //Toner Entregado cantidad 3
                                                if(strncasecmp($datotoner,'%%%%Required60',14)===0){
                                                        $cantidadtonerentregado3 = (int)preg_replace('/%%%%Required60/',' ',$datotoner);                                       
                                                }
            
                            //Toner Entregado tipo 3
                                                if(strncasecmp($datotoner,'%%%%Required61',14)===0){
                                                        $tipotonerentregado3 = preg_replace('/%%%%Required61/',' ',$datotoner);                                       
                                                }                                    
                                                                          
                    }    
                    
                    $color= null;        
                @endphp       
            
                                @php    
                                    switch($tk_id->name)  {
                                        case 'Asignado' : $color = '#fff7085e'; break;
                                        case 'Notificado al Usuario': $color = '#16ff1352'; break;
                                        case 'open' : $color = '#ff0d0d52'; $tk_id->name = preg_replace('/open/','Abierto',$tk_id->name); break;
                                       case 'closed successful' : $color = '#11ff018f' ; $tk_id->name = preg_replace('/closed successful/','Cerrado Exitosamente',$tk_id->name); break;
                                       case 'Atendido': $color = '#01c4ff82'; break;
                                    }          
                                   
                                @endphp
            
            
                             <tr style="background:<?php echo $color ?>;">
                             <!--cuerpo principal de solicitu de toner -->
                                <td > 
                                  <div class="login-box">
                                    <a class="cardhvr" href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID={{$tk_id->ticket_id}}" target="_blank" title="Ir en busca del TKT en OTRS">                           
                                      {{$tk_id ->tn }}
                                    </a>
                                  </div>
                                </td> 
                                <td>{{$tk_id->create_time}}</td>
                                <td><p class="width: 200px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;"></p> {{$tk_id->title}}</td>                         
                                <td>{{$dependencia}}</td>
                                <td>{{$tk_id->fila}}</td>
                                    @if(!isset($tipodetoner1) or !empty($tipodetoner1) == false)
                                      @php 
                                      $tipodetoner1 =" ";
                                      @endphp  
                                    @endif
                                <td style="border-left-color: #cab08f;border-left-width: 3px;">{{$tipodetoner1}}</td>
            
                                    @if(!isset($cantidad1) or !empty($cantidad1) == false)
                                      @php 
                                        $cantidad1 = 0;
                                      @endphp  
                                    @endif
                                <td>{{$cantidad1}}</td> 
            
                             
                                    @if(!isset($tipotoner2) or !empty($tipotoner2) == false)
                                      @php 
                                        $tipotoner2 = " ";
                                      @endphp  
                                    @endif                   
                                <td>{{$tipotoner2}}</td>
            
                                    @if(!isset($cantidad2) or !empty($cantidad2) == false)
                                      @php 
                                        $cantidad2 = 0;
                                      @endphp  
                                    @endif
                                <td>{{$cantidad2}}</td> 
            
                                    @if(!isset($tipotoner3) or !empty($tipotoner3) == false)
                                      @php 
                                        $tipotoner3 = "";
                                      @endphp  
                                    @endif
                                <td>{{$tipotoner3}}</td>
            
                                    @if(!isset($cantidad3) or !empty($cantidad3) == false)
                                      @php 
                                        $cantidad3 = 0 ;
                                      @endphp  
                                    @endif
                                <td>{{$cantidad3}}</td> 
                                    @if(!isset($cantidadtonerentregado1)  or  !empty($cantidadtonerentregado1)  == false)    
                                      @php
                                       $cantidadtonerentregado1 = 0;
                                      @endphp    
                                    @endif
                                <td style="border-left-color: #cab08f;border-left-width: 3px;">{{$cantidadtonerentregado1}}</td>
                                    @if(!isset($tipotonerentregado1)  or  !empty($tipotonerentregado1)  == false )    
                                          @php
                                              $tipotonerentregado1 = " ";
                                          @endphp                                 
                                    @endif      
                                <td>{{$tipotonerentregado1}}</td> 
                                
                                @if(!isset($cantidadtonerentregado2)  or  !empty($cantidadtonerentregado2)  == false)    
                                      @php
                                       $cantidadtonerentregado2 = 0;
                                      @endphp    
                                    @endif
                                <td>{{$cantidadtonerentregado2}}</td>
                                    @if(!isset($tipotonerentregado2)  or  !empty($tipotonerentregado2)  == false )    
                                          @php
                                              $tipotonerentregado2 = " ";
                                          @endphp                                 
                                    @endif      
                                <td>{{$tipotonerentregado2}}</td> 
            
            
                                @if(!isset($cantidadtonerentregado3)  or  !empty($cantidadtonerentregado3)  == false)    
                                      @php
                                       $cantidadtonerentregado3 = 0;
                                      @endphp    
                                    @endif
                                <td>{{$cantidadtonerentregado3}}</td>
                                    @if(!isset($tipotonerentregado3)  or  !empty($tipotonerentregado3)  == false )    
                                          @php
                                              $tipotonerentregado3 = " ";
                                          @endphp                                 
                                    @endif      
                                <td>{{$tipotonerentregado3}}</td>                                                        
            
                                @if(!isset($comentario_entrega) or !empty($comentario_entrega) == false) <!--Comentario de entrega del toner -->
                                    @php
                                     $comentario_entrega = "Sin datos";
                                    @endphp
                                @endif
                                 <td> {{$comentario_entrega}}</td> 
                                                 
                                <td>{{$tk_id->name}}</td>                     
                            </tr>   

                          @php 
                            unset($tk_id ->tn,$tk_id->create_time,$tk_id->title,$dependencia,$tk_id->fila,$tipodetoner1
                              ,$cantidad1,$tipotoner2,$cantidad2,$tipotoner3,$cantidad3,$cantidadtonerentregado1
                              ,$comentario_entrega,$tk_id->name,$tipotonerentregado1,$cantidadtonerentregado2,$tipotonerentregado2
                            );
                          @endphp            
                @endforeach
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo ">Filtro por Fila</th>
                        <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo ">Filtro por dependecia</th>
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
                        <th>Filtro por estado de ticket</th> <!--11-->
                    </tfoot>                              
                </table> 						
              </div>
            </div>
            <!--end::Widget 11--> 						             
          </div>
        </div>
      </div>
    </div>







</div>





@include('layouts/scripts/scripts')
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script> --> 
 <script src="{{URL::asset('js/dateTime.min.js')}}" ></script> 
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



<script>


$(document).ready(function(){
  $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#datepicker_from').datepicker('getDate');
            var max = $('#datepicker_to').datepicker('getDate');            
            var startDate = new Date($.trim(data[1])); //here change column value if you have different table structure
            console.log(startDate);
            if (min == null && max == null) return true;
            if (min == null && startDate <= max_formattedDate) return true;
            if (max == null && startDate >= min_formattedDate) return true; 
            if (startDate <= max && startDate >= min) return true;
            return false;
        }
    );
    $('#datepicker_from').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $('#datepicker_to').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });




    var idioma=

{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningun dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar Ticket:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Ultimo",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copyTitle": 'Informacion copiada',
        
        "copySuccess": {
            "_": '%d filas copiadas al portapapeles',
            "1": '1 fila copiada al portapapeles'
        },
        "pageLength": {
        "_": "Mostrar %d filas",
        "-1": "Mostrar Todo"
        },
        "colvis":"Seleccion de columnas"

        
    }
};

              


var table = $('#Solicitudesdetoner').DataTable({ 
      select:true,  
      "pageLength": 5,   
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "language": idioma,
      "lengthMenu": [[10,20, -1],[10,20,"Mostrar Todo"]],
      "order":[1 ,'desc'],
      dom:'Bfrtip<"col-md-6 inline"i> <"col-md-6 inline"p>',
      dom:'Bfrtip',
      deferRender:true, 
      "columnDefs": [ {
            "visible": false,
            "targets": -1
        } ],




      "search": {
        "regex": true,
        "caseInsensitive": false,
      },
     



      buttons: {
            

            
            buttons: [
              
                       {
                         
                           extend:'excelHtml5',
                           text:'<i class="fas fa-file-excel"></i> Exel ',
                           title:'Tickets Solicitud de Toner ',
                           messageTop:'Toners entregados :',
                           titleAttr: 'Gestor Toners Entregados',
                           className: 'btn btn-app export excel',                           
                           exportOptions: {
                           columns: ':visible',                           
                           },
                           customize: function( xlsx ) {                      
                            var hoja = xlsx.xl.worksheets['sheet1.xml'];
                              $('c[r=A2] t', hoja).text(' Toners Solicitados :' + '  ' + sumcol(pageTotal,sumsol2,sumsol3) +'  '+ 'Toners Entregados :' + '  ' + sumcol(tonerentregado1,tonerentregado2,tonerentregado3) );
                              $('messageTop c', hoja).attr( 's', '30' );                                                            
                            },                            
                       },

{ extend:    'pdfHtml5',
text:      '<i class="fas fa-file-pdf"></i>PDF',                           
title:'Tickets Toners Solicitud Toner' ,
messageTop: function (){
          return  'Toners Solicitado :'+' '+ sumcol(pageTotal,sumsol2,sumsol3) +' ' +'Toners Entregado'+ sumcol(tonerentregado1,tonerentregado2,tonerentregado3);        
        },
titleAttr: 'PDF',
className: 'btn btn-app export pdf',
orientation: 'landscape',
pageSize: 'TABLOID',
exportOptions: {
columns: ':visible'
},
 customize:function(doc) {

  

    doc.styles.title = {
        color: 'peru',
        fontSize: '30',
        alignment: 'center'
    },
    doc.styles.messageTop = {
        color: 'peru',
        fontSize: '20',
        alignment: 'center'
    },
    doc.styles['td:nth-child(2)'] = {
        width: '100px',
        'max-width': '100px',
         margin: [ 0, 0, 0, 12 ],
    },
    doc.styles.tableHeader = {
        fillColor:'maroon',
        color:'antiquewhite',
        alignment:'center',                
    }
    doc.content[0].margin = [ 0, 0, 0, 12 ]
  },

},

                       {
                           extend:    'print',
                           text:      '<i class="fa fa-print"></i>Imprimir',
                           title:'Gestor Toners Entregados',
                           titleAttr: 'Imprimir',
                           className: 'btn btn-app export imprimir',
                           exportOptions: {
                            columns: ':visible'
                           }
                       },
                       {
                           extend:    'pageLength',
                           titleAttr: 'Registros a mostrar',
                           className: 'selectTable'
                       },
                       'colvis'
                   ]         
           },
           columnDefs:[{
                        targets: [7,8,9,10,13,14,15,16], // null para no ocultar columnas [1,2,3 ... ] cuando se requiera bloquear colmn 
                        visible: false
                        }] ,
            
// Filtro por seleccion multiple
                initComplete: function() {            
                  this.api().columns([3,4,18]).every(function() {
                    var column = this;
                    
                    var select = $('<select class="mymsel" multiple="multiple" ><option value=""></option></select>')
                      .appendTo($(column.footer()))
                      .on('change', function() {
                        var vals = $('option:selected', this).map(function(index, element) {
                          return $.fn.dataTable.util.escapeRegex($(element).val());
                        }).toArray().join('|');

                        column
                          .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                          .draw();
                      });

                    column.data().unique().sort().each(function(d, j) {
                      select.append('<option value="' + d + '">' + d + '</option>')
                    });
                    var title = $(this).text();
                      
                  });
                  //select2 init for .mymsel class
                  $(".mymsel").select2();
                },
//fin de la seleccion multiple 





           
"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,'']/g,'')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            pageTotal = api
                .column( 6, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column( 6 ).footer() ).html(
              '1.-Toners Solicitados: <br>' +  pageTotal 
            );
                sumsol2 = api
                .column( 8, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column(8).footer() ).html(
                  '2.-Toners Solicitados: <br>' + sumsol2 
                );

                sumsol3 = api
                .column(10, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column(10).footer() ).html(
                  '3.-Toners Solicitados: <br>' + sumsol3 
                );

                tonerentregado1 = api
                .column( 11, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column(11).footer() ).html(
                  '1.-Toner Entregados: <br>' + tonerentregado1 
                );

                tonerentregado2 = api
                .column( 13, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column(13).footer() ).html(
                  '2.-Toner Entregados: <br>' + tonerentregado2 
                );

                tonerentregado3 = api
                .column( 15, { search: "applied" } )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                $( api.column(15).footer() ).html(
                  '3.-Toner Entregados: <br>' + tonerentregado3 
                );                                      
        }            
          
});
var tonersol = pageTotal+sumsol2+sumsol3;
var tonerentregado=tonerentregado1+tonerentregado3+tonerentregado2;

function sumcol(col1,col2,col3){
            return col1+col2+col3;        
        };

var tonsolicitado = document.getElementById("tonsolicitado").innerHTML=pageTotal+sumsol2+sumsol3;
var sumentregado = document.getElementById("tonentregado").innerHTML =tonerentregado1+tonerentregado3+tonerentregado2;


$('#datepicker_from,#datepicker_to').change(function () {
    table.draw();

});

$(".clear-date-filter").on("click", function() {
        $('#datepicker_from').val("").datepicker("update");
        $('#datepicker_to').val("").datepicker("update");
    });  


});
</script>
<!-- fin de la datatable-->
@endsection
@endsection
