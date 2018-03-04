<!-- NAVIGATION -->
<nav class="navbar navbar-dark navbar-expand-md" style="background-color: #150e16;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">&nbsp;</ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item mr-4">
                <a class="nav-link" href="https://admin.onsells.ru">Добавить акции</a>
            </li>
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li class="nav-item mr-4">
                <a class="nav-link" href="{{ route('login') }}">Войти</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Выйти
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>
