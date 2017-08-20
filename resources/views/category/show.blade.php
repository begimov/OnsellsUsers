@extends('layouts.app')

@section('titleandmetatags')
  @include('layouts.partials._metatags')
@endsection

@section('content')

  <div class="container">

    @include('layouts.components._categorieslisting')

    @include('layouts.components._promotioncards')

  </div>

@endsection
