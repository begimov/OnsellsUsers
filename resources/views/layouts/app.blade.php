<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Onsells') }}</title>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <!-- Scripts -->
  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
  </script>
</head>

<body>
  <div id="app">
    <!-- NAVIGATION -->
    @include('layouts.partials._navigation')
    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->
    @include('layouts.partials._footer')
  </div>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- Additional SCRIPTS -->
  @yield('scripts')
</body>

</html>
