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
 

    


    

    
 
// inicio de datatable    
var table = $('#tablasoltoner').DataTable({                  
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
             this.api().columns([4]).every(function () {
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
            { data: 'tn', name: 'tn' },                
            { data: 'ticket_id', name: 'ticket_id' },                
            { data: 'title', name: 'title' },                
            { data: 'fila', name: 'fila' },                
            { data: 'name', name: 'name' },                                                                                                                                               
        ],
});


$('#tablasoltoner tbody').on('click', 'td.details-control', function () {
    
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

$(".clear-date-filter").on("click", function() {
        $('#datepicker_from').val("").datepicker("update");
        $('#datepicker_to').val("").datepicker("update");
    }); 
    
    
setInterval( function () {
    table.ajax.reload( null, false ); // funicon para recargar los datos de la datatable cada sierto tiempo 
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