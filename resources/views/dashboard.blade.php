@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        
        @foreach ($typeFindings as $countFinding)
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">{{ $countFinding->name }}</p>
              <h3 class="card-title">{{ $countFinding->count }}
                @if ($countFinding->count > 1)
                  <small>Hallazgos</small>
                  @else
                  <small>Hallazgo</small><br>
                @endif
              </h3><br>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush