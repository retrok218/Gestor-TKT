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
                            <!-- <div class="row"  style="color: #595d6e;">
                            <div class="col-sm-6" >  
                                    <div class="kt-widget25"  style="border-right: groove;">
                                        <div class="kt-widget24__info" style="
                                        text-align: initial;">
                                            <h4 class="kt-widget24__title">
                                                Toners sol col 1
                                            </h4>					       
                                        </div> 
                                        
                                        <div style="font-size:36px">
                                          <div class="fas fa-ticket-alt fa-spin fa-3x" style="
                                          font-size: 3rem !important;" ></div>
                                           - <i class="fa" style="font-size:36px" id="soltoner"></i>                                           
                                          </div>                                                                                                                                                                                                              
                                      </div>            
                                </div>
                            </div> -->
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
            <!--begin::Widget 11--> 
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
            
            
            
            
            
            
              <div class="col-md-12 col-lg-12 col-sm-12 pull-left">
                <table class="display" style="width:100%" id="tablatoner" >
                    <thead >     
                   
            
                        <tr>
                            <th>Numero del TKT</th>
                            <th>Fecha </th>
                            <th>Descripcion de TKT</th>
                            <th>Dependencia</th>
                            <th>Fila</th>
                            <th>1</th>
                                 
                        </tr>
                    </thead>
                    
                    <tfoot>
                       
                        <th></th>
                        <th></th>
                        <th></th>
                        <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo "></th>
                        <th title="Al no seleccionar ningun campo se muestran todos los tickets con solicitud de toner no importando la marca del mismo ">Filtro por Fila</th>
                        <th></th>
                     
                    </tfoot>                              
                </table> 					
                
              </div>

            </div>
            <!--end::Widget 11-->
             						             
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
@section('scripts')





<script>

$(document).ready(function(){

$.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {
        var min = $('#datepicker_from').datepicker('getDate');
        var max = $('#datepicker_to').datepicker('getDate');
        
        var startDate = new Date($.trim(data[2])); //here change column value if you have different table structure
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
$('#datepicker_from,#datepicker_to')

// inicio de datatable    
var table = $('#tablatoner').DataTable({                  
     "pageLength": 10,
     "lengthChange": true,
     "searching": true,
     "ordering": false,
     "info": true,
     "autoWidth": true,
    //responsive: true, 
     /*"language": idioma,*/
     "lengthMenu": [
         [10, 20, -1],
         [10,20,"Mostrar Todo"]
     ],
     "order": [1, 'desc'],
     dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
     dom: 'Bfrtip',
     deferRender: true,
    



     buttons: {
         dom: {
             container: {
                 tag: 'div',

             },
             buttonLiner: {
                 tag: null
             }
         },


         buttons: [
            

             {
                 extend: 'excelHtml5',
                 text: '<i class="fas fa-file-excel"></i> Exel',
                 title: titulo_tab,
                 titleAttr: 'Excel',
                 className: 'btn btn-app export excel',
                 exportOptions: {
                    //  columns: ':visible'
                 },
             },

             {
                 extend: 'print',
                 text: '<i class="fa fa-print"></i>Imprimir',
                 title: titulo_tab,
                 titleAttr: 'Imprimir',
                 className: 'btn btn-app export imprimir',
                 exportOptions: {
                     
                 }
             },
             {

                 extend: 'pdfHtml5',
                 text: '<i class="fas fa-file-pdf"></i>PDF',
                 title: titulo_tab ,
                 titleAttr: 'PDF',
                //  className: 'btn btn-app export pdf',
                 orientation: 'landscape',
                 pageSize: 'TABLOID',
                 exportOptions: {
                    // columns: ':visible'
                 },
                 customize: function (doc) {
                     doc.styles.title = {
                         color: '#114627',
                         fontSize: '30',
                         alignment: 'center'
                     }
                     doc.styles['td:nth-child(2)'] = {
                             width: '100px',
                             'max-width': '100px',
                             margin: [0, 0, 0, 12],
                         },
                         doc.styles.tableHeader = {
                             fillColor: '#114627',
                             color: 'white',
                             alignment: 'center',   
                         } 
                 },


             },
             
             {
                 extend: 'pageLength',
                 text: '<i class="flaticon2-indent-dots"></i>Registros a Mostrar',
                 titleAttr: 'Registros a mostrar',
                 className: 'selectTable'
             },
             
         ]
     },
     // Filtro por seleccion multiple
     initComplete: function () {
         this.api().columns([4,5]).every(function () {
             var column = this;
             //added class "mymsel"
             var select = $('<select class="mymsel" multiple="multiple" ><option value="" ></option></select>')
                 .appendTo($(column.footer()))
                 .on('change', function () {
                     var vals = $('option:selected', this).map(function (index, element) {
                         return $.fn.dataTable.util.escapeRegex($(element).val());
                     }).toArray().join('|');
                     column
                         .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                         .draw();
                 });
             column.data().unique().sort().each(function (d, j) {
                 select.append('<option value="' + d + '">' + d + '</option>')
             });
             var title = $(this).text();

         });
         //select2 init for .mymsel class
         $(".mymsel").select2();
     },
     //fin de la seleccion multiple 
     
    language: {
        "url": url + "assets/vendors/general/datatables/Spanish.json",  
    },
    ajax: {
        "url": url + "/data_soltoner",
    },
    columns: [                                              
       
       
      
            {"mRender": function(data, type, row){
                var ligaotrs=row.id;                
                return '<button class="button2"> <span> <a href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID='+ligaotrs+'" target="_blank" title="Ir en busca del TKT en OTRS" ;>'+row.tn+'</a> <span> </button>';
                                                    }
            },
            { data: 'create_time', name: 'create_time' },
            {"mRender":function(data, type , row){  //regresa el dato de la columna title con caracteres reducidos por 30 px 
                  return row.title.substring(0,30 );
                }
            },
                            
            { data: 'name'},
            { data: 'dependencia', name: 'dependencia' },   
            {data:'cantidad1',name:'cantidad1'},
    ],
}); 


$('#tablatk tbody').on('click', 'td.details-control', function () {

var tr = $(this).closest('tr');
var row = table.row( tr );

if ( row.child.isShown() ) {
    // This row is already open - close it
    row.child.hide();
    tr.removeClass('shown');
}
else {
    // Open this row
    row.child( format(row.data()) ).show();
    tr.addClass('shown');
}
} ); 

// Boton de  +         table.on( 'responsive-display', function ( e, datatable, row, showHide, update ) {
//     console.log( 'Details for row '+row.index()+' '+(showHide ? 'shown' : 'hidden') );
// } );

$('#datepicker_from,#datepicker_to').change(function () {
table.draw();
});

// Boton para limpiar los campos seleccionados en el filtro por rangos 
$("#limpiar-fecha").on("click", function() {
$('#datepicker_from').val("").datepicker("update");
$('#datepicker_to').val("").datepicker("update");

}); 
// Fin Boton para limpiar los campos seleccionados en el filtro por rangos 

setInterval( function () {
table.ajax.reload( null, false ); // funcion para recargar los datos de la datatable cada sierto tiempo 
}, 600000 ); //segundos 10000 = 10s 


// crea una tabla dentro de la tabla ya generada 
function format ( d ) {
// `d` is the original data object for the row
console.log(d)
let table = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" >'+
    '<tr >'+
        '<td>Asunto Completo:</td>'+
        '<td>'+d.title+'</td>'+             
    '</tr>'+        
'</table>';

return table;
}


});































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












