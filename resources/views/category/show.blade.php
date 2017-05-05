@extends('layouts.app')

@section('content')
<div class="container">

@if (count($subcategories) > 0)
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">{{ $category->name }}</div>
        <div class="panel-body">
          @foreach ($subcategories as $subcategory)
          <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <a href="{{ route('category.show', $subcategory->id) }}">
                  {{ $subcategory->name }}
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">Акции</div>
      <div class="panel-body">

        <div class="row">

          @if (count($promotions) > 0)
          @foreach ($promotions as $promotion)
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              @if (count($promotion->images) > 0)
              <img src="{{ $promotion->mediumImgPath() }}" alt="{{ $promotion->promotionname }}">
              @endif
              <div class="caption">
                <h3>
                  <a href="{{ route('promotion.show', $promotion->id) }}">
                    {{ mb_substr($promotion->promotionname, 0, 30) }}{{ (strlen($promotion->promotionname) >= 30) ? '...' : '' }}
                  </a>
                </h3>
                <p>{{ mb_substr($promotion->promotiondesc, 0, 100) }}{{ (strlen($promotion->promotiondesc) >= 100) ? '...' : '' }}</p>
                <p>{{ $promotion->company }} / {{ $promotion->category->name }}</p>
              </div>
            </div>
          </div>
          @endforeach
          {{ $promotions->links() }}
          @else
          <p>Нет добавленных акций.</p>
          @endif  
        </div>

      </div>
    </div>
  </div>
</div>

</div>
@endsection
