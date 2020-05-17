@extends('layouts.app',['activePage' => 'user-management', 'titlePage' => __('Perfil de Usuarios'),'title'=>'asd'])
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
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-info">
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Cargo</th>
                      <th> Fecha de creación</th>
                      <th class="text-right">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>cargo</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-success  btn-round">
                            <i class="material-icons">edit</i>
                        </button>
                        @can('delete user')
                          <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                            <i class="material-icons">close</i>
                          </button>
                        @endcan
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection