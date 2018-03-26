@extends('layouts.app') 

@section('titleandmetatags')
<title>{{ str_limit($promotion->promotionname, 70) }} :: {{ config('app.name', 'Onsells') }}</title>
<meta name="description" content="{{ str_limit($promotion->promotiondesc, 150) }}">
<meta name="keywords" content="{{ $promotion->company . ', ' . implode(" , ", explode("
  ", $promotion->promotionname . ' ' . $promotion->promotiondesc)) }}">
<script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script> 
@endsection 

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-7">
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>{{ $promotion->promotionname }}</h4>
          </div>
          <div class="panel-body" style="padding: 0;">
            @if (count($promotion->images) > 0)
            <p>
              <img width="100%" src="{{ $promotion->mediumImgPath() }}" alt="{{ $promotion->promotionname }}">
            </p>
            @endif
            <p style="padding: 15px;">{!! nl2br(e($promotion->promotiondesc)) !!}</p>
          </div>
        </div>
      </div>

      <div class="row">
        @if (count($promotions) > 0) @foreach ($promotions as $addpromotion)
        <div class="col-sm-6 col-md-6" style="padding:5px;">
          <div class="thumbnail">
            @if (count($addpromotion->images) > 0)
            <a href="{{ route('promotion.show', $addpromotion->id) }}">
              <img class="img-rounded" src="{{ $addpromotion->mediumImage->path }}" alt="{{ $addpromotion->promotionname }}">
            </a>
            @endif
            <div class="caption text-center">
              <h4>
                <a href="{{ route('promotion.show', $addpromotion->id) }}">
                  {{ str_limit($addpromotion->promotionname, 60) }}
                </a>
              </h4>
              <p>{{ str_limit($addpromotion->promotiondesc, 150) }}</p>
              <p>
                <a href="{{ route('promotion.show', $addpromotion->id) }}" class="btn btn-primary">ПОЛУЧИТЬ</a>
              </p>
            </div>
          </div>
        </div>
        @endforeach @endif
      </div>
    </div>

    <div class="col-md-5">

      <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>{{ $promotion->company }}</h4>
          </div>
          <div class="panel-body">
            <p>
              <strong>Адрес:</strong>
              <br> {{ $promotion->address }}
            </p>
            <p class="lead">
              <span class="label label-danger">Время акции ограничено</span>
            </p>
            @if($applied)
            <p>
              @if (count($promotion->locations) > 1)
              <strong>Дополнительные адреса:</strong>
              <br> @foreach ($promotion->locations as $key => $location) @unless ($promotion->address === $location->address)
              {{ $location->address }}
              <br> @endunless @endforeach @endif
            </p>
            @isset($promotion->website)
            <p>
              <strong>Сайт:</strong>
              <br>
              <a href="{{ route('redirect.external', $promotion->id) }}" target="_blank">{{ $promotion->website }}</a>
            </p>
            @endisset
            <p>
              <strong>Телефон:</strong>
              <br> {{ $promotion->phone }}
            </p>
            @endif @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif @if(!$applied)
            <p>
              @if (Auth::guest())
              <a class="btn btn-primary" href="{{ route('login') }}" role="button" onclick="ga('send', 'event', 'Buttons', 'Click', 'Signin and get discount');">Войти и получить скидку</a>
              @else
              <form action="{{ route('application.store', $promotion->id) }}" method="post">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                  {{ csrf_field() }}
                  <label>Номер телефона для связи и быстрого получения скидки:</label>
                  <input type="phone" class="form-control" name="phone" value="{{ Auth::user()->phone ?: old('phone') }}" placeholder="Введите ваш номер..."> @if ($errors->has('phone'))
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
            <p>
              <strong>Понравилась акция?</strong>
              <br>Расскажите о&nbsp;ней своим друзьям!</p>
            <div class="ya-share2" data-services="vkontakte,odnoklassniki,whatsapp,telegram,twitter" data-title="{{ str_limit($promotion->promotionname, 30) }}"
              data-description="{{ str_limit($promotion->promotiondesc, 60) }}" data-image="{{ url($promotion->mediumImgPath()) }}"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- VK Widget -->
        <div id="vk_groups"></div>
        <script type="text/javascript">
          VK.Widgets.Group("vk_groups", { mode: 4, width: 'auto', height: "300" }, 140111463);
        </script>
        <!-- VK Widget -->
      </div>

    </div>

  </div>

</div>
@endsection 

@section('scripts')
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js" async="async"></script>
@endsection