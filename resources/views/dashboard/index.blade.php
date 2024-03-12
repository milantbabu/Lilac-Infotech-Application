@extends('layouts.app')
@section('title')
 Dashboard
@endsection

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white">Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-xl-6 col-lg-6 users-department">
      </div>
      <div class="col-xl-6 col-lg-6 users-designation">
      </div>
    </div>
  </div>

@endsection

@section('scripts')

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>

    <script>
        let getDashboardURL = "{{ route('getDashboardData') }}";
    </script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

@endsection
