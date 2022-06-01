(document).ready(function() {
    $('.tickets-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var dataTable = $('#tickets-table').dataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        
        buttons: [
            { extend: 'copyHtml5', className: 'kt-hidden', name: '' },
            { extend: 'excelHtml5', className: 'kt-hidden' },
            { extend: 'csvHtml5', className: 'kt-hidden' },
            { extend: 'pdfHtml5', className: 'kt-hidden', text: 'PDF',
            //orientation: 'landscape'
            },
            { extend: 'print', className: 'kt-hidden', text: 'Imprimir', name: 'print' },
        ],
        language: {
            "url": url + "assets/vendors/general/datatables/Spanish.json"
        },
        ajax: {
            "url": url + "/data_tickets_cerrados_exitosamente",
            "type": "GET"
        },
        columns: [
            { data: 'tn', name: 'tn' },
           
            
            

        ]
        });
});