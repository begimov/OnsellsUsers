<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form role="search" action="{{ route('search.index') }}" method="get">
      <div class="input-group">
        <input type="text" name="q" id="q" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default btn-index-search" type="submit">Найти</button>
        </span>
      </div>
    </form>
    <br>
  </div>
</div>
