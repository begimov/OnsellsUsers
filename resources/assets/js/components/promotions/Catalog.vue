<template>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <search v-model="searchQuery" v-on:input="textSearch" v-on:enterPressed="instaTextSearch"></search>
        </div>
      </div>

      <div class="row" v-if="isDisplayingMiniCards && promotions.length" style="margin-bottom:10px;">
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p>
              <a href="categories/kliniki"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Клиники</a><br>
              <a href="categories/stomatologii"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Стоматологии</a>
            </p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p>
              <a href="categories/massazh"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Массаж</a><br>
              <a href="categories/attrakciony"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Аттракционы</a>
            </p>
            <p></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p>
              <a href="categories/eda"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Еда</a><br>
              <a href="categories/razvlecheniya"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Развлечения</a>
            </p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center">
            <p>
              <a href="categories/uslugi"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Услуги</a><br>
              <a href="categories/meropriyatiya"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Мероприятия</a>
            </p>
        </div>
      </div>

      <div class="row popular-minicards--container" v-if="isDisplayingMiniCards && promotions.length">
        <div class="col-md-12">
          <h4 class="header">Популярные акции</h4>
          <div class="row">
            <promo-mini-card  v-for="(promotion, index) in promotions" v-if="index < 6" :key="promotion.id" :promotion="promotion"></promo-mini-card>
          </div>
        </div>
      </div>

      <div class="row equal" v-if="isDisplayingMiniCards && promotions.length">
        <div class="col-md-4 col-sm-4 text-center feature-card--left">
            <h2 style="font-size:3em;" class="text-info"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></h2>
            <p>Onsells позволяет в&nbsp;режиме реального времени отслеживать акции и&nbsp;интересные предложения от&nbsp;компаний поблизости.</p>
        </div>
        <div class="col-md-4 col-sm-4 text-center feature-card--center">
            <h2 style="font-size:3em;" class="text-info"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></h2>
            <p>Мы&nbsp;знаем как важно не&nbsp;тратить лишнего и&nbsp;получать удовольствие от&nbsp;жизни. Наш сервис создан, чтобы&nbsp;Вы получали больше и&nbsp;лучше, за меньшие деньги!</p>
        </div>
        <div class="col-md-4 col-sm-4 text-center feature-card--right">
            <h2 style="font-size:3em;" class="text-info"><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span></h2>
            <p>Найдите нужный товар или услугу по&nbsp;самой выгодной цене. Не&nbsp;упустите лучшие предложение. Экономьте время, сотни и&nbsp;тысячи рублей на&nbsp;ваших любимых услугах и&nbsp;развлечениях.</p>
        </div>
      </div>

      <div class="row" v-if="isDisplayingMiniCards && promotions.length" style="margin:20px;">
        <div class="col-md-12">
          <p><span class="lead"><strong class="text-info"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Как воспользоваться скидкой на&nbsp;Onsells:</strong></span></p>
          <ol>
            <li>Заходите на&nbsp;интересующую вас акцию,</li>
            <li>Нажимаете кнопку &laquo;получить скидку&raquo; и&nbsp;указываете контактный номер,</li>
            <li>Ваша заявка с&nbsp;контактными данными указанными при регистрации, автоматически направляется ответственному лицу компании, после чего вы&nbsp;можете смело воспользоваться скидкой;</li>
          </ol>
          <p><span class="lead"><strong class="text-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Внимание!</strong></span></p>
          <p><strong>Ваши данные будут использоваться только внутри проекта Onsells,</strong> для максимально простого получения скидки вами у&nbsp;наших партнеров.</p>
          <ul>
            <li>После получения скидки и&nbsp;отправки данных партнеру Onsells, он&nbsp;может с&nbsp;вами связаться для обсуждения деталей акции;</li>
            <li>Возможно, понадобится сделать еще одно привычное действие: в&nbsp;случае, если в&nbsp;условиях акции сказано &laquo;Необходима предварительная запись по&nbsp;телефону ...&raquo;, то&nbsp;вам необходимо самим позвонить по&nbsp;указанному номеру и&nbsp;забронировать место или, например, столик в&nbsp;ресторане. При бронировании обязательно сообщите, что вы&nbsp;по&nbsp;акции от&nbsp;Onsells;</li>
            <li>В&nbsp;случае если с&nbsp;вами никто не&nbsp;связался, придя в&nbsp;место получения скидки, сообщите, что вы&nbsp;оставили заявку на&nbsp;Onsells и&nbsp;назовите свои имя/фамилию, которую указывали в&nbsp;анкете на&nbsp;сайте;</li>
          </ul>
        </div>
      </div>

      <div class="row" v-if="!isDisplayingMiniCards">
        <div class="col-md-12">
          <div class="popular-cards--container equal">
            <div class="row equal">
              <promo-card v-for="promotion in promotions" :promotion="promotion" :center="center" :key="promotion.id"></promo-card>
            </div>
          </div>
        </div>
      </div>

      <div class="row" v-if="!promotions.length">
        <div class="col-md-12 text-center">
          <p>
            <span class="lead"><strong><span class="glyphicon glyphicon-search" aria-hidden="true"></span></strong></span><br>
            К сожалению, по вашему запросу ничего не найдено.
          </p>
        </div>
      </div>
    </div>
</template>

<script src="./catalog.js"></script>
