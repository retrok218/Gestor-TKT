$(document).ready(function(){
    $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
              var min = $('#datepicker_from').datepicker('getDate');
              var max = $('#datepicker_to').datepicker('getDate');            
              var startDate = new Date($.trim(data[17])); //here change column value if you have different table structure
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


  var table = $('#tablatoners').DataTable({ 
       
        "pageLength": 6,   
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        // responsive: true,
        "autoWidth": false,      
        //"language": idioma,
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
             columnDefs:[{
                          targets: [7,8,9,10,11,12,14,15,16,17,18,19,20,21], 
                          visible: true
                          }] ,
              
  
                          
  // Filtro por seleccion multiple
  initComplete: function () {
      //col3 en mantenimiento 
               this.api().columns([1,3,5,7,20,22,10]).every(function () {
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
    cache: false,
},
columns: [                                              
    {"mRender": function(data, type, row){                     
        return '<button class="button2"> <span> <a href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID='+row.ticket_id+'" target="_blank" title="Ir en busca del TKT en OTRS" ;>'+row.tn+'</a> <span> </button>';
        }
    }, // numero de ticket
                         
    {data:'Tipo_toner1',name:'Tipo_toner1'},                      
    {data:'cantidad1',name:'cantidad1'},    //2

    {data:'tipotoner2',name:'tipotoner2'},                      
    {data:'cantidad2',name:'cantidad2'}, //4

    {data:'tipotoner3',name:'tipotoner3'},                     
    {data:'cantidad3',name:'cantidad3'},  //6

    {data:'SolicitadoTipo4',name:'SolicitadoTipo4'},                  
    {data:'cantidad4',name:'cantidad4'},               //8       
    

    {data:'cantidadtonerentregado1',name:'cantidadtonerentregado1'},             //9         
    {data:'tipotonerentregado1',name:'tipotonerentregado1'},                      
    {data:'cantidadtonerentregado2',name:'cantidadtonerentregado2'},         //11             
    {data:'tipotonerentregado2',name:'tipotonerentregado2'},                      
    {data:'cantidadtonerentregado3',name:'cantidadtonerentregado3'},     //13                 
    {data:'tipotonerentregado3',name:'tipotonerentregado3'},                      
    {data:'cantidadtonerentregado4',name:'cantidadtonerentregado4'}, //15                     
    {data:'tipotonerentregado4',name:'tipotonerentregado4'}, 

    { data: 'create_time', name: 'create_time' }, //fecha de creacion columna 17
    {"mRender":function(data, type , row){  //regresa el dato de la columna title con caracteres reducidos por 30 px 
          return row.title.substring(0,30 );
        }
    },   //descripcion del ticket   
    {data:'dependencia',name:'dependencia'},                      
    {data:'fila',name:'fila'},                     
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
                  .column( 2, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                     $( api.column(2).footer() ).html(
                         '1.-Toners Solicitados: <br>' + pageTotal 
                     );
                 
                  sumsol2 = api
                  .column( 4, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                   $( api.column(4).footer() ).html(
                     '2.-Toners Solicitados: <br>' + sumsol2 
                   );
  
                  sumsol3 = api
                  .column(6, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                   $( api.column(6).footer() ).html(
                     '3.-Toners Solicitados: <br>' + sumsol3 
                  );
  
                  sumsol4 = api
                  .column(8, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                   $( api.column(8).footer() ).html(
                     '4.-Toners Solicitados: <br>' + sumsol4 
                   );
  
  
  
  
  
  
  
                  tonerentregado1 = api
                  .column( 9, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                  $( api.column(9).footer() ).html(
                     '1.-Toner Entregados: <br>' + tonerentregado1 
                   );
  
                  tonerentregado2 = api
                  .column( 11, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                   $( api.column(11).footer() ).html(
                     '2.-Toner Entregados: <br>' + tonerentregado2 
                   );
  
                  tonerentregado3 = api
                  .column( 13, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                   $( api.column(13).footer() ).html(
                    '3.-Toner Entregados: <br>' + tonerentregado3 
                  );  
  
                  tonerentregado4 = api
                  .column( 15, { search: "applied" } )
                  .data()
                  .reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
                   $( api.column(15).footer() ).html(
                     '4.-Toner Entregados: <br>' + tonerentregado4 
                   );       
                  var tonsolicitado = document.getElementById("tonsolicitado").innerHTML=pageTotal+sumsol2+sumsol3+sumsol4;
                  var sumentregado = document.getElementById("tonentregado").innerHTML =tonerentregado1+tonerentregado3+tonerentregado2+tonerentregado4;                                 
                  var ressol1= document.getElementById("ressol1").innerHTML=pageTotal;
                  var ressol2= document.getElementById("ressol2").innerHTML=sumsol2;
                  var ressol3= document.getElementById("ressol3").innerHTML=sumsol3;
                  var ressol4= document.getElementById("ressol4").innerHTML=sumsol4;

                  var entregado1= document.getElementById("entregado1").innerHTML=tonerentregado1;
                  var entregado2= document.getElementById("entregado2").innerHTML=tonerentregado2;
                  var entregado3= document.getElementById("entregado3").innerHTML=tonerentregado3;
                  var entregado4= document.getElementById("entregado4").innerHTML=tonerentregado4;


                  
          },
          
          
  });

  $('#datepicker_from,#datepicker_to').change(function () {
    table.draw();
});
$("#limpiar-fecha").on("click", function() {
    $('#datepicker_from').val("").datepicker("update");
    $('#datepicker_to').val("").datepicker("update");
    
});
setInterval( function () {
    table.ajax.reload( null, false ); // funcion para recargar los datos de la datatable cada sierto tiempo 
}, 120000 ); //segundos 10000 = 10s 

$( '#tablatoners' ).on( 'change', 'input', function () {
    //invalidate the DT cache
    table.cell($(cell)).invalidate().draw();
              
  } );
  
});
  







