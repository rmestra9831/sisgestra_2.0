@extends('layouts.app',['activePage' => 'Findings', 'titlePage' => __('Editor de Hallazgo'),'title'=>'asd'])
@section('title',' | Editando Hallazgo',$finding->memorandum)

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title ">Editando el hallazgo <strong>{{ $finding->memorandum }}</strong></h4>
              <p class="card-category">Recuerda agregar los datos correctamente</p>
            </div>
            <div class="card-body">
              <form id="EditAuditForm" method="POST" class="ui create_audit form" action="{{ action('HallazgoController@updateFinding',$finding->slug) }}">
                @method('PUT') @csrf
                <div class="ui form">
                  <div class="three fields">
                    <div class="field">
                      <label>Tipo de Auditoria</label>
                      <div class="ui selection dropdown">
                        <div class="default text">Seleccionar</div>
                        <i class="dropdown icon"></i>
                        <input type="hidden" name="typeFinding" value="{{ $finding->typeFinding_id }}">
                        <div class="menu">
                          @foreach ($typeFinding as $typeF)
                          <div class="item" data-value="{{ $typeF->id }}">{{ $typeF->name }}</div>
                          @endforeach
                        </div>
                      </div>
                    </div>

                    <div class="field">
                      <label>Presunto responsables</label>
                      <div class="ui input left icon">  
                        <i class="users icon"></i>
                        <input name="responsibles" type="text" placeholder="Jhon Doe"  value="{{ $finding->responsibles }}">    
                      </div>
                    </div>

                    <div class="field">
                      <label>Valor de los Hallazgos</label>
                      <div class="ui input left icon">
                        <i class="dollar sign icon"></i>
                        <input id="number" name="valueFindings" type="text" placeholder="1'234.567"  value="{{ $finding->valueFindings }}">
                      </div>
                    </div>

                  </div>

                  <div class="three fields">
                    <div class="field">
                      <label>Numero de Memorando</label>
                      <div class="ui input left icon">
                        <i class="hashtag icon"></i>
                        <input name="memorandum" type="text" placeholder="xxxxxxxxx"  value="{{ $finding->memorandum }}">
                      </div>
                    </div> 

                    <div class="disabled field">
                      <label>Lider Auditor</label>
                      <div class="ui input left icon">
                        <i class="hashtag icon"></i>
                        <input readonly="" name="leaderAudit" type="text" placeholder="Karla Doe" value="{{ $finding->leaderAudit->name }}">
                      </div>
                    </div> 

                    <div class="field">
                      <label>Vigencia de Auditoria (Día)</label>
                      <div class="ui input left icon">
                        <i class="calendar day icon"></i>
                        <input class="validate-number" name="validityAudit" type="text" placeholder="xx" maxlength="4" value="{{ $finding->validityAudit }}">
                      </div>
                    </div> 
                  </div>

                  <div class="three fields">
                    <div class="field ui calendar" id="standard_calendar">
                      <label>Fecha de los Hallazgos</label>
                      <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input name="timeFindings" type="text" placeholder="Date/Time" autocomplete="off" value="{{ $finding->timeFindings }}">
                      </div>
                    </div>

                    <div class="field">
                      <label>Grupo de Auditoria</label>
                      <div class="ui selection dropdown">
                        <div class="default text">Seleccionar</div>
                        <i class="dropdown icon"></i>
                        <input type="hidden" name="auditGroup" value="{{ $finding->auditGroup_id }}">
                        <div class="menu">
                          @foreach ($auditGroup as $auditG)
                          <div class="item" data-value="{{ $auditG->id }}">{{ $auditG->name }}</div>
                          @endforeach
                        </div>
                      </div>
                    </div>

                    <div class="field">
                      <label>Fecha de Finalización de la Auditoria (Día)</label>
                      <div class="ui input left icon">
                        <i class="calendar day icon"></i>
                        <input class="validate-number" name="dateEndAudit" type="text" placeholder="xx" maxlength="4" value="{{ $finding->dateEndAudit }}">
                      </div>
                    </div>
                    </div>
                  </div>
                  
                  <div class="three fields">
                    <div class="field ui calendar" id="standard_calendar">
                      <label>Fecha de Translados</label>
                      <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input id="dateTransfers" name="dateTransfers" type="text" placeholder="Date/Time" autocomplete="off" value="{{ $finding->dateTransfers }}">
                      </div>
                    </div>

                  </div>

                  <div class="create_audit btn btn-info w-100">Crear</div>
                </div>
              </form>
            </div>
            
          </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/tableScripts.js') }}"></script>
@include('common.ModalConfirmEdit')

@section('scripts')
  @if (session('status'))
  <script>
    $('body').toast({
      class: 'info',
      message: 'Hallazgo EDITADO correctamente',
      showProgress: 'top',
      displayTime: 7000,
      position: 'bottom left'
    });
  </script>
  @endif
@endsection
@endsection