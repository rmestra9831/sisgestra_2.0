window.JSZip = require('jszip');
require( 'datatables.net-buttons-se' );
require( 'datatables.net-buttons' );
require( 'pdfmake' );
require( 'datatables.net-buttons/js/buttons.html5.js' )();
require( 'datatables.net-buttons/js/buttons.colVis.js' )();
require( 'datatables.net-buttons/js/buttons.flash.js' )();
require( 'datatables.net-buttons/js/buttons.print.js' )();

$(document).ready(function () {
  $.ajaxSetup({headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
  // <!-- Validación para inputs numericos -->
  //SOLO NUMEROS
  $(".validate-number").keydown(function(event){
      if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !==190  && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9  ){
          return false;
      }
  });
  $("#number").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
            // .replace(/([0-9])([0-9]{2})$/, '$1.$2')
            // .replace(/([0-9])([0-9]{2})$/, '$1.$2')
            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
  });
// <!-- CALENDARIOS  -->
  $('.ui.calendar').calendar({
    monthFirst: false,
    type: 'date',
    dateHandling: 'formatter',  
    formatter: {
      date: function (date, settings) {
        if (!date) return '';
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        return day + '/' + month + '/' + year;
      }
    },
    text: {
      days: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
      months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'Mayo', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec'],
      today: 'Aujourd\'hui',
      now: 'Hoy',
      am: 'AM',
      pm: 'PM'
    },
  });
// plugins para validacion de formularios
$form_create_radic = $('#createAuditForm');
$('.ui.create_audit.form') //validacion creacion de radicado
  .form({
    inline : true,
    fields: {
      responsibles      : 'empty',
      valueFindings     : ['empty'],
      timeFindings      : 'empty',
      memorandum        : 'empty',
      leaderAudit       : 'empty',
      validityAudit     : ['empty','number','maxLength[4]'],
      dateTransfers     : 'empty',
      auditGroup        : 'empty',
      typeFinding        : 'empty',
      uploadFinding     : 'empty',
      dateEndAudit      : ['empty','number','maxLength[4]'],
    },
    dateHandling: 'formatter',  
    formatter: {
      date: function (date, settings) {
        if (!date) return '';
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        return day + '/' + month + '/' + year;
      }
    },onSuccess: function (event){
    
    }
});
// MODAL PARA CONFIRMAR LA CREACION DE UN RADICADO
$('.ui.basic.create_finding.modal')
  .modal({
    closable  : false,
  })
.modal('attach events', '.create_audit.btn','show');


// <!-- javascript for init -->

// <!-- dropdown-->
$('.ui.dropdown').dropdown();

//EVENTO DEL BOTON PARA SUBIR EL ARCHIVO
$("input:text").click(function() {
  $(this).parent().find("input:file").click();
});
$('input:file', '.ui.upload_finding.input')
    .on('change', function(e) {
      var name = e.target.files[0].name;
      $('input:text', $(e.target).parent()).val(name);  //validando el boton de carga del archivo
});


});