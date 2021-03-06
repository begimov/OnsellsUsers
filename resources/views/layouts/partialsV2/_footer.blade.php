<div class="container-fluid bg-light py-5">
    <div class="row mb-5">
        <div class="col">
            <img src="img/V2/footer_logo.png" class="img-fluid mr-4">
            <a href="https://vk.com/onsells"><img src="img/V2/vk.png" class="align-top mt-1"></a>
            <a href="https://www.instagram.com/onsells.ru"><img src="img/V2/instagram.png" class="align-top mt-1"></a>
            <a href="https://www.facebook.com/onsells.ru"><img src="img/V2/facebook.png" class="align-top mt-1"></a>
            <a href="https://telegram.me/nikitinskiy"><img src="img/V2/telegram.png" class="align-top mt-1"></a>
            <a href="mailto:hello@onsells.ru" class="btn btn-default btn-xs align-top mt-3 ml-2">Напишите нам</a>
            <a class="btn btn-default btn-xs align-top mt-3 ml-2" href="https://admin.onsells.ru" role="button">Добавить акцию</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                <a href="{{ route('legal.terms') }}">Пользовательское соглашение</a><br>
                <a href="{{ route('legal.privacy') }}">Политика конфиденциальности</a>
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                @foreach ($categories[3]->subcategories as $subcategory)
                    <a href="{{ route('category.show', $subcategory) }}">{{ $subcategory->name }}</a><br>
                @endforeach
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                @foreach ($categories[5]->subcategories as $subcategory)
                    <a href="{{ route('category.show', $subcategory) }}">{{ $subcategory->name }}</a><br>
                @endforeach
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                @foreach ($categories[8]->subcategories as $subcategory)
                    <a href="{{ route('category.show', $subcategory) }}">{{ $subcategory->name }}</a><br>
                @endforeach
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                @foreach ($categories[2]->subcategories as $subcategory)
                    <a href="{{ route('category.show', $subcategory) }}">{{ $subcategory->name }}</a><br>
                @endforeach
            </p>
        </div>
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <p>
                @foreach ($categories[0]->subcategories as $subcategory)
                    <a href="{{ route('category.show', $subcategory) }}">{{ $subcategory->name }}</a><br>
                @endforeach
            </p>
        </div>
    </div>
</div>
