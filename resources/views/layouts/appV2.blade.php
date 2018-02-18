<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<!-- HEAD -->
@include('layouts.partialsV2._head')
<body>
  <div id="app">
    <!-- NAVIGATION -->
    @include('layouts.partialsV2._navigation')
    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->
    @include('layouts.partialsV2._footer')
  </div>
  <!-- Scripts -->
  <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
      jQuery(document).ready(function() {
          @yield('postJquery');
      });
  </script>
  <!-- Additional SCRIPTS -->
  @yield('scripts')
</body>

</html>
