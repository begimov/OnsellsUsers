@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>{{ $promotion->promotionname }}</h4></div>
        <div class="panel-body">
          @if (count($promotion->images) > 0)
            <p>
              <img class="media-object img-responsive" src="{{ $promotion->mediumImgPath() }}" alt="{{ $promotion->promotionname }}">
            </p>
          @endif
            <p>{!! nl2br(e($promotion->promotiondesc)) !!}</p>
        </div>
        </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading"><h4>{{ $promotion->company }}</h4></div>
        <div class="panel-body">
          <p>
            <strong>Адрес:</strong><br>
            {{ $promotion->address }}
          </p>
          @isset($promotion->website)
            <p>
              <strong>Сайт:</strong><br>
              <a href="{{ route('redirect.external', $promotion->id) }}">{{ $promotion->website }}</a>
            </p>
          @endisset
          <p>
            <strong>Телефон:</strong><br>
            {{ $promotion->phone }}
          </p>
          <p>
            <hr>
            @if (Auth::guest())
              <a class="btn btn-primary" href="{{ route('application.create', $promotion->id) }}" role="button">Войти и получить скидку</a>
            @else
              <a class="btn btn-primary" href="{{ route('application.create', $promotion->id) }}" role="button">Получить скидку</a>
            @endif
          </p>
        </div>
        <div class="panel-footer">
          <div class="ya-share2"
            data-services="vkontakte,odnoklassniki,whatsapp,telegram,twitter"
            data-title="{{ str_limit($promotion->promotionname, 30) }}"
            data-description="{{ str_limit($promotion->promotiondesc, 60) }}"
            data-image="{{ url($promotion->mediumImgPath()) }}"></div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
  <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
  <script src="https://yastatic.net/share2/share.js" async="async"></script>
@endsection
