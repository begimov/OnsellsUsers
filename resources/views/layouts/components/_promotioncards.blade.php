<div class="row" id="post-data">
  @include('layouts.components.partials._promotioncard')
</div>
<!-- <div>{{ $promotions->links() }}</div> -->
<div class="ajax-load text-center" style="display:none">
	<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Загрузка акций...</p>
</div>

@section('postJquery')
@parent
	var page = 1;
  var loadMore = true;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height() - 150) {
        if (loadMore) {
          page++;
          loadMore = false;
	        loadMoreData(page);
        }
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html.length == 0){
	                $('.ajax-load').html("");
                  loadMore = false;
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#post-data").append(data.html);
              loadMore = true;
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('Сервер не отвечает...');
	        });
	}
@endsection
