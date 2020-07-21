@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => 'SISGESTRA' ])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
        <img class="logoWelcome" src="{{ asset('images/logo.png') }}" alt="">
          <h1 class="text-white text-center">{{ __('Contraloria Municipal de Barrancabermeja') }}</h1>
      </div>
  </div>
</div>
@endsection
