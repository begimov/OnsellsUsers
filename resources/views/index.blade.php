@extends('layouts.app')

@section('content')

  <div class="container-fluid">

    @include('layouts.components._map')

  </div>

  <div class="container">

    @include('layouts.components._searchfield')

    @include('layouts.components._promotioncards')

  </div>

@endsection
