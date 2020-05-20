var configLanguageDatatable = {
  "info":"_TOTAL_ Registros",
  "search": "Buscar",
  "paginate":{
    "next": "Siguiente",
    "previous": "Anterior",
  },
  "lengthMenu": 'Mostrar <select class="ui compact selection dropdown">'+
                '<option value="5">5</option>'+
                '<option value="10">10</option>'+
                '<option value="-1">Todos</option>'+
                '</select> registros',
  "emptyTable": "No se encontraron datos",
  "zeroRecords": "No hay coincidencias",
  "infoEmpty": "",
  "infoFiltered": "",
};
//TABLA DE FILTRADO GENERAL -------------------------------------------------------------------
var tableFilterGeneral = $('#tableFindings').DataTable({
  "deferRender": true,
  "serverSide": false,
  "scroller": true,
  "scrollX": true,
  "scrollY": "250px",
  "dom": 'Blfrtip',
  "ajax": {
    "type": "GET",
    "url": "getFindings",
    "complete":function () {
      $('.dataTables_filter').append("<div class='ui form'><div class='two fields'><div class='field'><div class='ui calendar' id='rangestart'><div class='ui input left icon'><i class='calendar icon'></i><input id='min' name='min' type='text' placeholder='Desde'> </div></div></div><div class='field'><div class='ui calendar' id='rangeend'><div class='ui input left icon'><i class='calendar icon'></i><input id='max' name='max' type='text' placeholder='Hasta'></div></div></div></div></div>");
      //   //datapicker RANGOS DE FECHAS DATATABLE
        $('#rangeend').calendar({
          type: 'date',
          startCalendar: $('#rangestart'),
          formatter: {
            date: function (date, settings) {
              if (!date) return '';
              var day = date.getDate();
              var month = date.getMonth() + 1;
              var year = date.getFullYear();
              return year + '-' + month + '-' + day;
            }
          }
        });
        $('#rangestart').calendar({
          type: 'date',
          endCalendar: $('#rangeend'),
          formatter: {
            date: function (date, settings) {
              if (!date) return '';
              var day = date.getDate();
              var month = date.getMonth() + 1;
              var year = date.getFullYear();
              return year + '-' + month + '-' + day;
            }
          }
        });
        // filtrado entre fechas
        $.fn.dataTable.ext.search.push(
          function( settings, data, dataIndex ) {
            var min = new Date($('#min').val()); // funcionan en google
            var max = new Date($('#max').val()); // funcionan en google
            // var min = new Date($('input[name="min"]').val()); 
            // var max = new Date($('input[name="max').val()); 
            var dataFilter = new Date(data[10]) || 0; // use data for the dataFilter column
            // console.log(min);
            
              if ( ( isNaN( min ) && isNaN( max ) ) ||
                   ( isNaN( min ) && dataFilter <= max ) ||
                   ( min <= dataFilter   && isNaN( max ) ) ||
                   ( min <= dataFilter   && dataFilter <= max ) )
                  //  ( min <= dataFilter   && dataFilter >= max) )
              {
                  return true;
              }
              return false;
          }
        );

        // Event listener to the two range filtering inputs to redraw on input
        $('#min').focusout( function() {tableFilterGeneral.draw();});
        $('#max').focusout( function() {tableFilterGeneral.draw();});
    }
  }, //traigo los usuarios para mirar sus permisos
  "columns": [
      {data: 'memorandum'},
      {data: 'leaderAudit_id'},
      {data: 'auditGroup_id'},
      {data: 'typeFinding_id'},
      {data: 'responsibles'},
      {data: 'valueFindings'},
      {data: 'validityAudit'},
      {data: 'dateEndAudit'},
      {data: 'timeFindings'},
      {data: 'dateTransfers'},
      {data: 'created_at'},
      {data: 'actions', className:"td-actions text-center "}
  ],
  "language": configLanguageDatatable,
  "buttons": [ 
    {
      extend: 'excelHtml5',
      text: 'Excel',
      className: 'btn btn-info'
    },
    {
      text: 'Nuevo Hallazgo',
      action: function ( ) {
        $(location).attr('href', $('#newFinding').attr('href'));
      },
      className: 'btn btn-info'
    },
  ]
});

// Display the buttons tabla filtrado general
// new $.fn.dataTable.Buttons( tableFilterGeneral, [
//   { extend: 'excelHtml5', exportOptions: {columns: ':visible'}},
//   { extend: 'pdfHtml5',exportOptions: {columns:  ':visible'},orientation: 'landscape', pageSize: 'LEGAL'},
//   { extend: 'print',text: 'Imprimir' ,messageBottom: null,exportOptions: {columns:  ':visible'}},
//   { extend: "colvis",text: 'Mostrar columnas'}
// ] );

// if (window.location.pathname == '/findings/TypeFindings') {

// }
$('#tableFindings tfoot th').each( function () { //BUSCADOR POR CAMPOS
  $('.ttt th').html('<div class="ui input"><input type="text" placeholder="Buscar por..."></div>');
});
// Apply the search
tableFilterGeneral.columns().every( function () {
  var that = this;
  $( 'input', this.footer() ).on( 'keyup change clear', function () {
      if ( that.search() !== this.value ) {
          that
              .search( this.value )
              .draw();
      }
  } );
});