
  $(document).ready(function () {
      $("#Date_search").val("");
  });

  var table = $('#tktcex').dataTable({
      deferRender: true,
      "autoWidth": false,
      "search": {
          "regex": true,
          "caseInsensitive": false,
      },
      "pageLength": 10,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "lengthMenu": [
          [10, 20, -1],
          [10, 20, "Mostrar Todo"]
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
          buttons: [{
                  extend: 'pdfHtml5',
                  text: '<i class="fas fa-file-pdf"></i>PDF',
                  title: titulo_tab,
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
          this.api().columns([3]).every(function () {
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
      columns: [{
              data: 'tn',
              name: 'tn'
          },
          {
              data: 'create_time',
              name: 'create_time'
          },
          {
              data: 'title',
              name: 'title'
          },
          {
              data: 'qname',
              name: 'qname'
          },
          {
              data: 'name'
          },
          {
              data: 'nombre',
              name: 'nombre'
          },
      ]
  });

  $("#Date_search").daterangepicker({
      "locale": {
          "format": "YYYY-MM-DD",
          "separator": " a ",
          "applyLabel": "Filtrar",
          "cancelLabel": "Cancelar",
          "fromLabel": "De",
          "toLabel": "To",
          "customRangeLabel": "Custom",
          "weekLabel": "W",
          "daysOfWeek": [
              "Su",
              "Mo",
              "Tu",
              "We",
              "Th",
              "Fr",
              "Sa"
          ],
          "monthNames": [
              "January",
              "February",
              "March",
              "April",
              "May",
              "June",
              "July",
              "August",
              "September",
              "October",
              "November",
              "December"
          ],
          "firstDay": 1
      },
      "opens": "center",
  }, function (start, end, label) {
      maxDateFilter = end;
      minDateFilter = start;
      table.draw();
  });
