@extends('layouts.app')

@section('titleandmetatags')
  <title>{{ str_limit($promotion->promotionname, 70) }} :: {{ config('app.name', 'Onsells') }}</title>
  <meta name="description" content="{{ str_limit($promotion->promotiondesc, 150) }}">
  <meta name="keywords" content="{{ $promotion->company . ', ' . implode(", ", explode(" ", $promotion->promotionname . ' ' . $promotion->promotiondesc)) }}">
@endsection

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
          @if($applied)
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
          @endif
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          @if(!$applied)
            <p>
              @if (Auth::guest())
                <a class="btn btn-primary" href="{{ route('login') }}" role="button" onclick="ga('send', 'event', 'Buttons', 'Click', 'Signin and get discount');">Войти и получить скидку</a>
              @else
                <form action="{{ route('application.create', $promotion->id) }}" method="post">
                  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    {{ csrf_field() }}
                    <label>Номер телефона для связи и быстрого получения скидки:</label>
                    <input type="phone" class="form-control" name="phone" value="" placeholder="Введите ваш номер...">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary" onclick="ga('send', 'event', 'Buttons', 'Click', 'Get discount');">Получить скидку</button>
                </form>
              @endif
            </p>
          @endif
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

  <div class="row">
      @if (count($promotions) > 0)
        @foreach ($promotions as $promotion)
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
              @if (count($promotion->images) > 0)
                <a href="{{ route('promotion.show', $promotion->id) }}">
                  <img class="img-rounded" src="{{ $promotion->mediumImage->path }}" alt="{{ $promotion->promotionname }}">
                </a>
              @endif
              <div class="caption text-center">
                <h4>
                  <a href="{{ route('promotion.show', $promotion->id) }}">
                    {{ str_limit($promotion->promotionname, 60) }}
                  </a>
                </h4>
              </div>
            </div>
          </div>
        @endforeach
      @endif
  </div>

</div>
@endsection

@section('scripts')
  <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
  <script src="https://yastatic.net/share2/share.js" async="async"></script>
@endsection
