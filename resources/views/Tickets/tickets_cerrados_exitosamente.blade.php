@extends('home')
<meta http-equiv="refresh" content="120">
@section('content')
<script>
  var titulo_tab = 'Tickets Cerrados Exitosamente';
</script>


  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

 
 <div class="card-deck mt-3">
  <div class="card text-center  mb-3 bg-white" >
    <div class="card-header" ><h4>Tickets Totales</h4> </div>
      <div class="card-body">
          <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{ $ticket}} </i> </div>
      </div>
      <!--<a href="{{url('users/grafic')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
  </div>
 
  <div class="card text-center  mb-3 bg-white" >
    <div class="card-header"><h4>Tickets Cerrados Exitosamente </h4> </div>
    <div class="card-body">
        <div class="h5 mb-0 font-weight-bold text-gray-800" > <i class="fa fa-address-card" style="font-size:36px "> {{$rticket}} </i> </div>
    </div>
    <!--<a href=" {{url('users/tickets_sol_toner')}}" class="btn btn-success btn-sm enable" role="button" aria-disabled="true"> Desplegar </a> -->
  </div>
</div>

<!-- Creacion de graica tickets asignados -->

      <div class="row">
        <div class="col-lg-12">
          
            <div class="card text-center"  >
            <div class="card-header titulo_card"><h2> Tickets Cerrados Exitosamente </h2> </div>
            </div>
            <table >
              <tbody><tr>
                  <td>Minimum date:</td>
                  <td><input type="text" id="min" name="min"></td>
              </tr>
              <tr>
                  <td>Maximum date:</td>
                  <td><input type="text" id="max" name="max"></td>
              </tr>
              </tbody>
            </table>









            <div class="container" >
              
  <!--begin: Datatable -->
  <table class="table table-striped- table-bordered table-hover table-checkable" id="tktcex">
    <thead>
    <tr>
        <th> TN </th>
        <th> Create Time </th>
        <th> Title </th>
        <th>Area</th>
        <th>Estado TKT</th>
        <th>Nombre</th>
        
        
    </tr>
    </thead>
    <tfoot>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th>Selecciona el Estado</th>
      <th></th>
    </tfoot>
  </table>
              <!--end: Datatable -->
             
              </div>
              

          </div>
      </div>

      
<!--se agrega el includ para creacion de datatable -->

@section('scripts')
<script>
$(document).ready(function(){

var minDate, maxDate;
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[1] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
  
 
minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });

  var table = $('#tktcex').DataTable({
      "pageLength": 10,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "lengthMenu": [
          [10, 20, -1],
          [10,20,"Mostrar Todo"]
      ],
      "order": [1, 'desc'],
      dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
      dom: 'Bfrtip',
      deferRender: true,
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
                  extend: 'pdfHtml5',
                  text: '<i class="fas fa-file-pdf"></i>PDF',
                  title: titulo_tab ,
                  titleAttr: 'PDF',
                  className: 'btn btn-app export pdf',
                  orientation: 'landscape',
                  pageSize: 'TABLOID',
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
        initComplete: function () {
          this.api().columns([4]).every(function () {
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
                  select.append('<option value="' + d + '">' + d + '</option>')
              });
              var title = $(this).text();

          });
          //select2 init for .mymsel class
          $(".mymsel").select2();
        },
        language: {
            "url": url + "assets/vendors/general/datatables/Spanish.json",  
        },
        ajax: {
            "url": url + "/datatickets_cerrados_exitosamente",
        },
        columns: [
            { data: 'tn', name: 'tn' },
            { data: 'create_time', name: 'create_time' },
            { data: 'title', name: 'title' },
            { data: 'qname', name: 'qname' },
            { data: 'name'},
            { data: 'nombre', name: 'nombre' },
        ]
  });
  $('#min, #max').on('change', function () {
        table.draw();
      });
});
</script>
<script src="{{URL::asset('js/dateTime.min.js')}}"></script>
@endsection
@endsection