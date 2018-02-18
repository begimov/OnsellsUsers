<div class="container-fluid bg-light block p-4">
    <div class="row">
        <div class="col">
            <img src="img/V2/footer_logo.png" class="img-fluid mb-4 mr-4">
            <img src="img/V2/vk.png" class="align-top mt-1">
            <img src="img/V2/instagram.png" class="align-top mb-4 mt-1">
            <img src="img/V2/facebook.png" class="align-top mb-4 mt-1">
            <img src="img/V2/telegram.png" class="align-top mb-4 mt-1">
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                <a href="">Пользовательское соглашение</a><br>
                <a href="">Политика конфиденциальности</a>
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                АЗС<br>
                Автосервисы<br>
                Cалоны<br>
                Мойки<br>
                Страхование<br>
                Авто
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                Мебель<br>
                Техника<br>
                Шторы<br>
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">4</div>
        <div class="col-xl-2 col-lg-4 col-sm-6">5</div>
        <div class="col-xl-2 col-lg-4 col-sm-6">6</div>
    </div>
</div>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-6">
          <ul class="list-inline">
            <li class="text-footer"><a href="https://vk.com/onsells"><img src="{{ asset('img/footer/vk.png') }}"></a></li>
            <li><a href="https://www.instagram.com/onsells.ru"><img src="{{ asset('img/footer/instagram.png') }}"></a></li>
            <li><a href="https://www.facebook.com/onsells.ru"><img src="{{ asset('img/footer/facebook.png') }}"></a></li>
            <li><a href="https://telegram.me/nikitinskiy"><img src="{{ asset('img/footer/telegram.png') }}"></a></li>
            <li><a href="mailto:hello@onsells.ru" class="btn btn-default btn-xs">Напишите нам</a></li>
          </ul>
      </div>
      <div class="col-md-6 col-xs-6">
        <ul class="list-inline" style="margin-bottom:10px;">
          <li class="text-footer">Больше клиентов для вашего бизнеса:</li>
          <li><a class="btn btn-primary btn-xs" href="https://admin.onsells.ru" role="button">Добавить акцию</a></li>
        </ul>
        <ul class="list-inline">
          <li><a href="{{ route('legal.terms') }}">Пользовательское соглашение</a></li>
          <li><a href="{{ route('legal.privacy') }}">Политика конфиденциальности</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
