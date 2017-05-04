@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form role="search" action="/search" method="get">
            <div class="input-group">
              <input type="text" name="q" id="q" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Найти</button>
              </span>
            </div>
          </form>
          <br>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Результаты поиска</div>
        <div class="panel-body">

          <div class="row">

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
                      {{ mb_substr($promotion->promotionname, 0, 30) }}{{ (strlen($promotion->promotionname) >= 30) ? '...' : '' }}
                    </a>
                  </h3>
                  <p>{{ mb_substr($promotion->promotiondesc, 0, 100) }}{{ (strlen($promotion->promotiondesc) >= 100) ? '...' : '' }}</p>
                  <p>{{ $promotion->company }} / {{ $promotion->category->name }}</p>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p class="text-center">По запросу <em>{{ $query }}</em> ничего не найдено.</p>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
@endsection
