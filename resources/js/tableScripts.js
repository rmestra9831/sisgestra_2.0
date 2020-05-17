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
var date=new Date();
var dateReport=date.getDate()+"_"+(date.getMonth()+1)+"_"+date.getFullYear();
var tableFilterGeneral = $('#tableFindings').DataTable({
  "deferRender": true,
  "serverSide": false,
  "scroller": true,
  "scrollX": true,
  // "dom": 'Blfrtip',
  "ajax": {
    "type": "GET",
    "url": "getFindings",
    "complete":function () {
      console.log('eas');
    }
  }, //traigo los usuarios para mirar sus permisos
  "columns": [
      {data: 'memorandum'},
      {data: 'leaderAudit'},
      {data: 'auditGroup'},
      {data: 'typeFinding'},
      {data: 'responsibles'},
      {data: 'valueFindings'},
      {data: 'validityAudit'},
      {data: 'dateEndAudit'},
      {data: 'timeFindings'},
      {data: 'dateTransfers'},
      {data: 'actions', className:"td-actions text-center "}
  ],
  "language": configLanguageDatatable,
  // "buttons": [ 'excel', 'pdf', 'copy' ]
});

// Display the buttons tabla filtrado general
new $.fn.dataTable.Buttons( tableFilterGeneral, [
  { extend: 'excelHtml5', exportOptions: {columns: ':visible'}},
  { extend: 'pdfHtml5',exportOptions: {columns:  ':visible'},orientation: 'landscape', pageSize: 'LEGAL'},
  { extend: 'print',text: 'Imprimir' ,messageBottom: null,exportOptions: {columns:  ':visible'}},
  { extend: "colvis",text: 'Mostrar columnas'}
] );
if (window.location.pathname == '/findings/TypeFindings') {

}
// tableFilterGeneral.buttons().container().appendTo( $('div.eight.column:eq(0)', tableFilterGeneral.table().container()) );
// $('#tableFindings tbody').on('click', 'tr', function () {
//   var data = tableFilterGeneral.row( this ).data();
//   $.confirm({ //aqui va el alerta personalizado
//     animation: 'zoom',
//     closeAnimation: 'zoom',
//     theme: 'modern',
//     icon: 'lh eye icon',
//     backgroundDismissAnimation: 'glow',
//     title: 'Ir al Radicado',
//     content: 'Deseas ver el radicado '+data['consecutive'],
//     type: 'orange',
//     buttons: {
//         aceptar: function() {
//           location.replace(' ');
//           window.location.assign('/radicado/'+data['slug']+'/show');
//         },
//         cancel: function() {},
//     }
//   }); 
//   console.log(data);
// } );
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