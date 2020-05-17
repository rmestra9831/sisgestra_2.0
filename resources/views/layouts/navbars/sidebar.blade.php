<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      <img class="w-100" src="{{ asset('images/logo2.png') }}" alt="">
      {{ __('SISGESTRA') }}
    </a>  
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      {{-- nuevo hallazgo --}}
      <li class="nav-item{{ $activePage == 'new-finding' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('indexFindings') }}">
          <i class="material-icons">library_add</i>
            <p>{{ __('Nuevo Hallazgo') }}</p>
        </a>
      </li>

      {{-- dropdown --}}
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false">
          <i><i class="material-icons">face</i></i>
          <p>{{ __('Usuarios') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ ($activePage == 'profile' || $activePage == 'user-management') ? ' show' : '' }}" id="users">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Mi perfil') }} </span>
              </a>
            </li>
            @can('create user')
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="sidebar-mini"> UM </span>
                  <span class="sidebar-normal"> {{ __('Usuarios') }} </span>
                </a>
              </li>
            @endcan
          </ul>
        </div>
      </li>

      {{-- hallazgos --}}
      <li class="nav-item {{ ($activePage == 'TypeFindings') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#hallazgos" aria-expanded="false">
          <i><i class="material-icons">folder</i></i>
          <p>{{ __('Hallazgos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse{{ ($activePage == 'Findings' || $activePage == 'user-management') ? ' show' : '' }}" id="hallazgos">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Findings' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('TypeFindings') }}">
                <span class="sidebar-mini"><i class="material-icons">insert_drive_file</i></span>
                <span class="sidebar-normal">{{ __('Translados Diciplinarios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

    </ul>
  </div>
</div>