<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<!-- HEAD -->
@include('layouts.partials._head')
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
