@if (count($promotions) > 0)
  @foreach ($promotions as $promotion)
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail equal-min-height">
        @if (count($promotion->images) > 0)
          <a href="{{ route('promotion.show', $promotion->id) }}">
            <img class="img-rounded" src="{{ $promotion->mediumImage->path }}" alt="{{ $promotion->promotionname }}">
          </a>
        @endif
        <div class="caption">
          <h4>
            <a href="{{ route('promotion.show', $promotion->id) }}">
              {{ str_limit($promotion->promotionname, 20) }}
            </a>
          </h4>
          <p>{{ str_limit($promotion->promotiondesc, 30) }}</p>
          <p>{{ str_limit($promotion->company . ' / ' . $promotion->category->name, 30) }}</p>
        </div>
      </div>
    </div>
  @endforeach
@endif
