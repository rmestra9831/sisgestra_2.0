@extends('layouts.app',['activePage' => 'Findings', 'titlePage' => __('Hallazgos'),'title'=>'asd'])
@section('title',' | Usuarios')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title ">Usuarios</h4>
              <p class="card-category">Aquí puedes editar los usuarios</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a href="#" class="btn btn-sm btn-info">Nuevo Usuario</a>
                </div>
              </div>
              <div class="">
                <table id="tableFindings" class="table">
                  <thead>
                      <tr>
                          <td class="font-weight-bold"># Memorando</td>
                          <td class="font-weight-bold">Lider Auditor</td>
                          <td class="font-weight-bold">Grupo Auditor</td>
                          <td class="font-weight-bold">Tipo de Auditoria</td>
                          <td class="font-weight-bold">Presuntos Responsables</td>
                          <td class="font-weight-bold">Valor de los Hallazgos</td>
                          <td class="font-weight-bold">Vigencia de Auditoria</td>
                          <td class="font-weight-bold">Finalización de Auditoria</td>
                          <td class="font-weight-bold">Fecha de los Hallazgos</td>
                          <td class="font-weight-bold">Fecha de Translados</td>
                          <td class="font-weight-bold">Acciones</td>
                      </tr>
                  </thead>
                  <tfoot class="ttt">
                      <th># Memorando</th>
                      <th>Lider Auditor</th>
                      <th>Grupo Auditor</th>
                      <th>Tipo de Auditoria</th>
                      <th>Presuntos Responsables</th>
                      <th>Valor de los Hallazgos</th>
                      <th>Vigencia de Auditoria</th>
                      <th>Finalización de Auditoria</th>
                      <th>Fecha de los Hallazgos</th>
                      <th>Fecha de Translados</th>
                      <th class="text-right">Acciones</th>
                  </tfoot>
              </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection