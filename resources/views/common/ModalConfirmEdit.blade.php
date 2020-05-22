<div class="ui basic create_finding modal" style="position: sticky; height: auto;">
  <div class="ui icon header">
    <i class="question circle outline icon" style="font-size: 7em !important"></i>
    Editando Hallazgo {{ $finding->memorandum }}
  </div>
  <div class="text-center content">
    <p>¿Está seguro de EDITAR este Hallazgo?</p>
  </div>
  <div class="text-center actions">
    <div class="ui red basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <button form="EditAuditForm" type="submit"  id="" class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      Si
    </button>
  </div>
</div>