@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')

  <div class="container">

    <index></index>

  </div>

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
