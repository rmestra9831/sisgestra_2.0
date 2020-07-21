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
                  <a href="{{ route('register') }}" class="btn btn-sm btn-info">Nuevo Usuario</a>
                </div>
              </div>

              @if (session('status'))
                <div class="row animated fadeInDown">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons  ">close</i>
                      </button>
                      <span>{{ session('status') }}</span>
                    </div>
                  </div>
                </div>
              @endif

              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-info">
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Cargo</th>
                      <th>Fecha de creación</th>
                      <th>Activo</th>
                      <th class="text-right">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->positionUser->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                          <div class="togglebutton">
                            <label>
                              <input id="activeUser" type="checkbox" @if($user->active == 1) value="{{ $user->id }}" checked @endif name="isActive">
                                <span class="toggle"></span>
                            </label>
                          </div>
                        </td>
                        <td class="td-actions text-right">
                        <a href="{{ route('profileUser.edit',$user->slug) }}" type="button" rel="tooltip" class="btn btn-success  btn-round">
                            <i class="material-icons">edit</i>
                        </a>
                        @can('delete user')
                          <a href="{{ route('profileUser.delete',$user->slug) }}"  rel="tooltip" class="btn btn-danger btn-round">
                            <i class="material-icons">close</i>
                          </a>
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