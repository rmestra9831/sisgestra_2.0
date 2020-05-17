@extends('layouts.app',['activePage' => 'new-finding', 'titlePage' => __('Nuevo Hallazgo'),'title'=>'asd'])
@section('title',' | Nuevo Hallazgo')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title ">Registro de un nuevo hallazgo</h4>
              <p class="card-category">Recuerda agregar los datos correctamente</p>
            </div>
            <div class="card-body">
              <form id="createAuditForm" method="POST" class="ui create_audit form" action="{{ action('HallazgoController@store') }}" enctype="multipart/form-data">
                @method('POST') @csrf
                <div class="ui form">
                  <div class="three fields">
                    <div class="field">
                      <label>Tipo de Auditoria</label>
                      <div class="ui selection dropdown">
                        <div class="default text">Seleccionar</div>
                        <i class="dropdown icon"></i>
                        <input type="hidden" name="typeFinding">
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
                        <input name="responsibles" type="text" placeholder="Jhon Doe">    
                      </div>
                    </div>

                    <div class="field">
                      <label>Valor de los Hallazgos</label>
                      <div class="ui input left icon">
                        <i class="dollar sign icon"></i>
                        <input id="number" name="valueFindings" type="text" placeholder="1'234.567">
                      </div>
                    </div>

                  </div>

                  <div class="three fields">
                    <div class="field">
                      <label>Numero de Memorando</label>
                      <div class="ui input left icon">
                        <i class="hashtag icon"></i>
                        <input name="memorandum" type="text" placeholder="xxxxxxxxx">
                      </div>
                    </div> 

                    <div class="disabled field">
                      <label>Lider Auditor</label>
                      <div class="ui input left icon">
                        <i class="hashtag icon"></i>
                        <input name="leaderAudit" type="text" placeholder="Karla Doe" value="{{ auth()->user()->name }}">
                      </div>
                    </div> 

                    <div class="field">
                      <label>Vigencia de Auditoria (Día)</label>
                      <div class="ui input left icon">
                        <i class="calendar day icon"></i>
                        <input class="validate-number" name="validityAudit" type="text" placeholder="xx" maxlength="4">
                      </div>
                    </div> 
                  </div>

                  <div class="three fields">
                    <div class="field ui calendar" id="standard_calendar">
                      <label>Fecha de los Hallazgos</label>
                      <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input name="timeFindings" type="text" placeholder="Date/Time" autocomplete="off" data-date="2019-12-24" value="">
                      </div>
                    </div>

                    <div class="field">
                      <label>Grupo de Auditoria</label>
                      <div class="ui selection dropdown">
                        <div class="default text">Seleccionar</div>
                        <i class="dropdown icon"></i>
                        <input type="hidden" name="auditGroup">
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
                        <input class="validate-number" name="dateEndAudit" type="text" placeholder="xx" maxlength="4">
                      </div>
                    </div>
                    </div>
                  </div>
                  
                  <div class="three fields">
                    <div class="field ui calendar" id="standard_calendar">
                      <label>Fecha de Translados</label>
                      <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input id="dateTransfers" name="dateTransfers" type="text" placeholder="Date/Time" autocomplete="off" value="">
                      </div>
                    </div>

                    <div class="field">
                      <label>Archivo</label>
                      <div class="ui labeled upload_finding input">
                        <input class="@error('filePDF') is-invalid @enderror" type="text" id="uploadFinding" placeholder="Seleccionar" readonly>
                        <input class="@error('filePDF') is-invalid @enderror" type="file" name="uploadFinding">
                        <label class="ui label" for="uploadFinding">Cargar</label>
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
@include('common.ModalConfirm')

@section('scripts')
  @if (session('status'))
  <script>
    $('body').toast({
      class: 'success',
      message: 'Hallazgo creado correctamente',
      showProgress: 'top',
      displayTime: 5000,
      position: 'bottom left'
    });
  </script>
  @endif
@endsection
@endsection