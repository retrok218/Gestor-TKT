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
      $('#datepicker_from,#datepicker_to')
  
  
  
  
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
  
                
  
  
  var table = $('#tablatoners').DataTable({ 
    
   
        "pageLength": 6,   
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        //responsive: true, 
        "autoWidth": false,      
        "language": idioma,
        "lengthMenu": [[10,20, -1],[10,20,"Mostrar Todo"]],
        "order":[1 ,'desc'],
        dom:'Bfrtip<"col-md-6 inline"i> <"col-md-6 inline"p>',
        dom:'Bfrtip',
        deferRender:true, 
        "columnDefs": [ {
              "visible": true,
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
                             //columns: ':visible',                           
                             },
                             customize: function( xlsx ) {                      
                              var hoja = xlsx.xl.worksheets['sheet1.xml'];
                                $('c[r=A2] t', hoja).text(' Toners Solicitados :' + '  ' + sumcol(pageTotal,sumsol2,sumsol3) +'  '+ 'Toners Entregados :' + '  ' + sumcol(tonerentregado1,tonerentregado2,tonerentregado3) );
                                $('messageTop c', hoja).attr( 's', '30' );                                                            
                              },                            
                         },
  
                          {
                            extend:    'pdfHtml5',
                          text:'<i class="fas fa-file-pdf"></i>PDF',                           
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
  
                           'colvis',
                        
                         
                        
                     ]         
             },
             columnDefs:[{
                          targets: [7,8,9,10,11,12,14,15,16,17,18,19,20,21], 
                          visible: false
                          }] ,
              
  
                          
  // Filtro por seleccion multiple
  initComplete: function () {
      //col3 en mantenimiento 
               this.api().columns([4,22]).every(function () {
                   var column = this;
                   //added class "mymsel"
                   var select = $('<select class="mymsel" multiple="multiple" ><option value=""></option></select>')
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
                       select.append('<option value="' + d + '" >' + d + '</option>')
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
    {data:'dependencia',name:'dependencia'},                      
    {data:'fila',name:'fila'},                      
    {data:'Tipo_toner1',name:'Tipo_toner1'},                      
    {data:'cantidad1',name:'cantidad1'},                      
    {data:'tipotoner2',name:'tipotoner2'},                      
    {data:'cantidad2',name:'cantidad2'},                      
    {data:'cantidad3',name:'cantidad3'},                      
    {data:'tipotoner3',name:'tipotoner3'},                      
    {data:'Solicitado4',name:'Solicitado4'},                      
    {data:'SolicitadoTipo4',name:'SolicitadoTipo4'}, 
    {data:'cantidadtonerentregado1',name:'cantidadtonerentregado1'},                      
    {data:'tipotonerentregado1',name:'tipotonerentregado1'},                      
    {data:'cantidadtonerentregado2',name:'cantidadtonerentregado2'},                      
    {data:'tipotonerentregado2',name:'tipotonerentregado2'},                      
    {data:'cantidadtonerentregado3',name:'cantidadtonerentregado3'},                      
    {data:'tipotonerentregado3',name:'tipotonerentregado3'},                      
    {data:'cantidadtonerentregado4',name:'cantidadtonerentregado4'},                      
    {data:'tipotonerentregado4',name:'tipotonerentregado4'},                      
    {data:'comentario_entrega',name:'comentario_entrega'},                      
    {data:'name',name:'name'},                      

],
  
  
  
  
  
  
  
             
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
                  $( api.column(6).footer() ).html(
                    '1.-Toners Solicitados: <br>' + pageTotal 
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
  
                  sumsol4 = api
                  .column(12, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                  $( api.column(12).footer() ).html(
                    '4.-Toners Solicitados: <br>' + sumsol4 
                  );
  
  
  
  
  
  
  
                  tonerentregado1 = api
                  .column( 13, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                  $( api.column(13).footer() ).html(
                    '1.-Toner Entregados: <br>' + tonerentregado1 
                  );
  
                  tonerentregado2 = api
                  .column( 15, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                  $( api.column(15).footer() ).html(
                    '2.-Toner Entregados: <br>' + tonerentregado2 
                  );
  
                  tonerentregado3 = api
                  .column( 17, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                  $( api.column(17).footer() ).html(
                    '3.-Toner Entregados: <br>' + tonerentregado3 
                  );  
  
                  tonerentregado4 = api
                  .column( 19, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                  $( api.column(19).footer() ).html(
                    '4.-Toner Entregados: <br>' + tonerentregado4 
                  );       
                  var tonsolicitado = document.getElementById("tonsolicitado").innerHTML=pageTotal+sumsol2+sumsol3;
                  var sumentregado = document.getElementById("tonentregado").innerHTML =tonerentregado1+tonerentregado3+tonerentregado2;                                 
                  
          },
          
          
  });
  
});
  







