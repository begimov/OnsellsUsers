@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Интересные акции</div>
        <div class="panel-body">

          <div class="row">

            <div class="col-md-8 col-md-offset-2">
              <form role="search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Найти</button>
                  </span>
                </div>
              </form>
            </div>
            <hr>
            @if (count($promotions) > 0)
            @foreach ($promotions as $promotion)
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                @if (count($promotion->images) > 0)
                <img src="" alt="{{ $promotion->promotionname }}" width="200" height="200">
                @endif
                <div class="caption">
                  <h3>
                    <a href="">
                      Название: {{ mb_substr($promotion->promotionname, 0, 30) }}{{ (strlen($promotion->promotionname) >= 30) ? '...' : '' }}
                    </a>
                  </h3>
                  <p>Описание: {{ mb_substr($promotion->promotiondesc, 0, 100) }}{{ (strlen($promotion->promotiondesc) >= 100) ? '...' : '' }}</p>
                  <p>Категория: ...</p>
                  <!-- <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p> -->
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p>Нет новых добавленных акций.</p>
            @endif

          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Категории</div>
        <div class="panel-body">
          @if (count($categories) > 0)
          @foreach ($categories as $category)
          <div class="media">
            <div class="media-body">
              <strong class="media-heading">
                <a href="">
                  category_name
                </a>
              </strong>
              <p>{{ $category->name }}</p>
            </div>
          </div>
          <hr>
          @endforeach
          @else
          <p>Нет доступных категорий.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
