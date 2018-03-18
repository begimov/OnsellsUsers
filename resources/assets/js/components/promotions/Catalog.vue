<template>
    <div>
        <!-- HEADER -->
        <div class="container-fluid block-header">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-12 align-self-center text-center">
                            <p><img src="img/V2/header_logo.png"></p>
                            <h1 class="font-weight-normal mt-4 mb-5">Поиск акций и скидок</h1>
                            <h3 class="font-weight-light mb-5 d-none d-md-block">До 90% и больше в ресторанах, кафе, салонах красоты, медицинских клиниках, стоматологиях и других категориях.</h3>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-right align-self-center d-none d-sm-block"><button class="btn btn-success" disabled>в каталоге</button></div>
                        <div class="col-sm-6">
                            <search v-model="searchQuery" v-on:input="textSearch" v-on:enterPressed="instaTextSearch"></search>
                        </div>
                        <div class="col-sm-3 align-self-center d-none d-sm-block"><button class="btn btn-light" @click.prevent="setMapAsActive">на карте</button></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PROMOTIONS -->
        <div v-if="isDisplayingMiniCards && promotions.length">
            <div class="container-fluid mt-5">
                <div class="row mb-5">
                    <div class="col pl-2"><h4 class="font-weight-bold">Популярные акции</h4></div>
                </div>
                <div class="row" v-if="isDisplayingMiniCards && promotions.length">
                    <promo-mini-card  v-for="(promotion, index) in promotions" v-if="index < 12" :key="promotion.id" :promotion="promotion"></promo-mini-card>
                </div>
            </div>

            <div class="container-fluid mt-5 block-features">
                <div class="row">
                    <div class="col-md-4 block-features-1"></div>
                    <div class="col-md-4 text-center block-features-2"><h3 class="my-5 mb-md-0 mx-1 font-weight-bold">Onsells помогает вам</h3></div>
                    <div class="col-md-4 block-features-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center block-features-1 py-5">
                        <p class="lead"><span class="font-weight-bold">В режиме реального времени отслеживать акции</span> и интересные предложения от компаний поблизости.</p>
                        <img src="img/V2/features_mark_1.png" class="img-fluid d-md-none">
                    </div>
                    <div class="col-md-4 text-center block-features-2 py-5">
                        <p class="lead"><span class="font-weight-bold">Не тратить лишнего</span> и испытывать удовольствие от жизни, получать больше и лучше, за меньшие деньги.</p>
                        <img src="img/V2/features_mark_2.png" class="img-fluid d-md-none">
                    </div>
                    <div class="col-md-4 text-center block-features-3 py-5">
                        <p class="lead"><span class="font-weight-bold">Найти нужный товар или услугу по самой выгодной цене.</span> Экономить время, тысячи рублей на ваших любимых услугах и развлечениях.</p>
                        <img src="img/V2/features_mark_3.png" class="img-fluid d-md-none">
                    </div>
                </div>
                <div class="row d-none d-lg-block">
                    <div class="col-md-4 text-center block-features-1 pb-5"><img src="img/V2/features_mark_1.png" class="img-fluid"></div>
                    <div class="col-md-4 text-center block-features-2 pb-5"><img src="img/V2/features_mark_2.png" class="img-fluid"></div>
                    <div class="col-md-4 text-center block-features-3 pb-5"><img src="img/V2/features_mark_3.png" class="img-fluid"></div>
                </div>
            </div>

            <div class="container-fluid mt-5">
                <div class="row mb-5">
                    <div class="col pl-2"><h4 class="font-weight-bold">Популярные категории</h4></div>
                </div>
                <div class="row">
                    <div class="col-xl-4 p-0">
                        <div class="row">
                            <div class="col block-categories">
                                <a href="categories/eda">
                                    <div class="card block-categories-1 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h3 class="font-weight-bold">Рестораны</h3>
                                            <p class="lead">Недорогой ужин в ресторане СПб со скидкой от Onsells – это реальность. Большой выбор заведений и самые выгодные предложения.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 block-categories">
                                <a href="categories/krasota-i-zdorovye-salony">
                                    <div class="card block-categories-2 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h4 class="font-weight-bold">Салоны красоты</h4>
                                            <p>Посещать салоны красоты с Onsells выгодно, ведь скидки на услуги достигают 90%.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 block-categories">
                                <a href="categories/stomatologii">
                                    <div class="card block-categories-3 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h4 class="font-weight-bold">Стоматологии</h4>
                                            <p>У нас представлены скидки в стоматологических клиниках СПб на такие услуги, как лечение кариеса, удаление и отбеливание зубов, лингвальные брекеты, и т.д.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 block-categories p-0">
                        <a href="categories/kliniki">
                            <div class="card block-categories-4 h-100">
                                <div class="card-body">&nbsp;</div>
                                <div class="card-footer card-footer-no-border">
                                    <h4 class="font-weight-bold">Клиники</h4>
                                    <p>На нашем сайте представлены акции от лучших клиник СПб. Скидки на анализы, проведение МРТ, ПЦР, гинекологическое и узи обследование.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 p-0">
                        <div class="row">
                            <div class="col-sm-6 block-categories">
                                <a href="categories/razvlecheniya">
                                    <div class="card block-categories-5 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h4 class="font-weight-bold">Развлечения</h4>
                                            <p>Благодаря Onsells вы можете получить скидку на развлечения, купить билеты со скидкой и просто хорошо отдохнуть в одном из заведений СПб.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 block-categories">
                                <a href="categories/massazh">
                                    <div class="card block-categories-6 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h4 class="font-weight-bold">Массаж</h4>
                                            <p>Скидки на недорогой массаж спины и другие виды лечебного массажа в СПб. Заходите, стоимость вас приятно удивит.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col block-categories">
                                <a href="categories/avtoservisy">
                                    <div class="card block-categories-7 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h3 class="font-weight-bold">Автосервисы</h3>
                                            <p class="lead">На Onsells вы сможете получить скидку на услуги автосервиса и профессиональный уход за автомобилем, аксессуары для своей машины, помыть ее или отремонтировать поломку, сэкономив при этом значительную денежную сумму.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 p-0">
                        <div class="row">
                            <div class="col block-categories">
                                <a href="categories/deti">
                                    <div class="card block-categories-8 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h4 class="font-weight-bold">Дети</h4>
                                            <p>Самые актуальные акции на проведение детских праздников. Скидки на организацию праздников, аниматоры на детский праздник и т.д.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col block-categories">
                                <a href="categories/obuchenie">
                                    <div class="card block-categories-9 h-100">
                                        <div class="card-body">&nbsp;</div>
                                        <div class="card-footer card-footer-no-border">
                                            <h4 class="font-weight-bold">Обучение</h4>
                                            <p>Овладевать новыми знаниями очень важно. Мы предоставляем возможность получить скидки на обучение до 90%.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="row mb-5 mt-5">
                            <div class="col pl-2"><h4 class="font-weight-bold">Как воспользоваться скидкой на Onsells?</h4></div>
                        </div>
                        <div class="card block-howto">
                            <div class="card-body p-0 text-white">
                                <div class="row">
                                    <div class="col-md-6 p-3">
                                        <div class="media">
                                            <img src="img/V2/howto_mark_1.png" class="mr-2">
                                            <div class="media-body">
                                                <span class="font-weight-bold">Заходите</span> на интересующую вас акцию,
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-3">
                                        <div class="media">
                                            <img src="img/V2/howto_mark_2.png" class="mr-2">
                                            <div class="media-body">
                                                <span class="font-weight-bold">Нажимаете</span> кнопку «получить скидку» и указываете контактный номер,
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col p-3">
                                        <div class="media">
                                            <img src="img/V2/howto_mark_3.png" class="mr-2">
                                            <div class="media-body">
                                                Ваша заявка с контактными данными указанными при регистрации, автоматически направляется ответственному лицу компании, после чего <span class="font-weight-bold">вы можете смело воспользоваться скидкой;</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="row mb-5 mt-5">
                            <div class="col pl-2"><h4 class="font-weight-bold">Внимание!</h4></div>
                        </div>
                        <div class="card block-attention-1">
                            <div class="card-body p-0 text-white">
                                <div class="row block-attention-1">
                                    <div class="col p-3">
                                        <div class="media">
                                            <img src="img/V2/howto_question_mark.png" class="mr-2">
                                            <div class="media-body lead">
                                                <span class="font-weight-bold">Ваши данные будут использоваться только внутри проекта Onsells,</span> для максимально простого получения скидки вами у наших партнеров.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row block-attention-2">
                                    <div class="col-md-5 p-3">
                                        После получения скидки и отправки данных партнеру Onsells, он может с вами связаться для обсуждения деталей акции;
                                    </div>
                                    <div class="col-md-7 p-3">
                                        Возможно, понадобится сделать еще одно привычное действие: в случае, если в условиях акции сказано «Необходима предварительная запись по телефону ...», то вам необходимо самим позвонить по указанному номеру и забронировать место или, например, столик в ресторане. При бронировании обязательно сообщите, что вы по акции от Onsells;
                                    </div>
                                </div>
                                <div class="row block-attention-3">
                                    <div class="col p-3 lead">
                                        <span class="font-weight-bold">В случае если с вами никто не связался,</span> придя в место получения скидки, сообщите, что вы оставили заявку на Onsells и назовите свои имя/фамилию, которую указывали в анкете на сайте;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row" v-if="!isDisplayingMiniCards">
                <promo-card v-for="promotion in promotions" :promotion="promotion" :center="center" :key="promotion.id"></promo-card>
            </div>

            <div class="row" v-if="!promotions.length">
                <div class="col-md-12 text-center p-5">
                <p>
                    <span class="lead"><strong><span class="glyphicon glyphicon-search" aria-hidden="true"></span></strong></span><br>
                    К сожалению, по вашему запросу ничего не найдено.
                </p>
                </div>
            </div>
        </div>

    </div>
</template>

<script src="./catalog.js"></script>
