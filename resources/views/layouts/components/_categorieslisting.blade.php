@if (count($subcategories) > 0)
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="panel panel-default"> -->
        <!-- <div class="panel-heading">{{ $category->name }}</div> -->
          <!-- <div class="panel-body"> -->
            <ol class="breadcrumb">
              @foreach ($subcategories as $subcategory)
                <li>
                  <a href="{{ route('category.show', $subcategory) }}">
                    {{ $subcategory->name }}
                  </a>
                </li>
              @endforeach
            </ol>
          <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>
@endif
