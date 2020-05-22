@can('view register')
  <a href="{{ route('viewFindingByAll',$slug) }}" type="button" rel="tooltip" data-tooltip="Ver" data-position="top center" class="btn btn-info btn-round">
    <i class="material-icons">remove_red_eye</i>
  </a>
@endcan
@can('edit register')
  <a href="{{ route('editFindingView',$slug) }}" type="button" rel="tooltip" data-tooltip="Editar" data-position="top center" class="btn btn-success btn-round">
    <i class="material-icons">edit</i>
  </a>
@endcan
@can('delete register')
  <button ident="{{ $memorandum }}" id="btnDeleteFinding" type="button" rel="tooltip" data-tooltip="Eliminar" data-position="top center" class="btn btn-danger btn-round">
    <i class="material-icons">close</i>
  </button> 
@endcan