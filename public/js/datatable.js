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

// para filtro por seleccion de fecha  
// para filtro por seleccion de fecha   

   
 
// inicio de datatable    
var table = $('#tablatk').DataTable({         
         "pageLength": 10,
         "lengthChange": true,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": true,
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
   
                     extend: 'pdfHtml5',
                     text: '<i class="fas fa-file-pdf"></i>PDF',
                     title: titulo_tab ,
                     titleAttr: 'PDF',
                     className: 'btn btn-app export pdf',
                     orientation: 'landscape',
                     //pageSize: 'TABLOID',
                     exportOptions: {
                         columns: ':visible'
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
   
   
                         doc.content[0].margin = [0, 0, 0, 12]
   
   
                     }
   
   
                 },
   
                 {
                     extend: 'excelHtml5',
                     text: '<i class="fas fa-file-excel"></i> Exel',
                     title: titulo_tab,
                     titleAttr: 'Excel',
                     className: 'btn btn-app export excel',
                     exportOptions: {
                         columns: ':visible'
                     },
                 },
   
                 {
                     extend: 'print',
                     text: '<i class="fa fa-print"></i>Imprimir',
                     title: titulo_tab,
                     titleAttr: 'Imprimir',
                     className: 'btn btn-app export imprimir',
                     exportOptions: {
                         columns: ':visible'
                     }
                 },
                 {
                     extend: 'pageLength',
                     titleAttr: 'Registros a mostrar',
                     className: 'selectTable'
                 },
                 
             ]
         },
         // Filtro por seleccion multiple
         initComplete: function () {
             this.api().columns([3]).every(function () {
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
            "url": url + name_tabla,
        },
        columns: [
           
            
            {"mRender": function(data, type, row){
                var ligaotrs=row.id;                
                return'<a href="https://aplicaciones.finanzas.cdmx.gob.mx/otrs/index.pl?Action=AgentTicketZoom;TicketID='+ligaotrs+'" target="_blank" title="Ir en busca del TKT en OTRS">'+row.tn+'</a>';
                                                    }
            },
            { data: 'create_time', name: 'create_time' },
            { data: 'title', name: 'title' },

            { data: 'qname', name: 'qname' },

            // se genera if para cambiar el nombre del estado de tkt si es open
            { data: 'name'},








            { data: 'nombre', name: 'nombre' },                         
        ],
        



});

$('#datepicker_from,#datepicker_to').change(function () {
    table.draw();

});

$(".clear-date-filter").on("click", function() {
        $('#datepicker_from').val("").datepicker("update");
        $('#datepicker_to').val("").datepicker("update");
    }); 
     

    });











