<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                {{config('app.name')}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mr-auto mb-lg-0">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link @if(request()->routeIs('home')) active @endif">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('news')}}" class="nav-link @if(request()->routeIs('news*')) active @endif">
                            Новости
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about')}}"
                           class="nav-link @if(request()->routeIs('about')) active @endif">О&nbsp;нас</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto mb-lg-0">
                    <li class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                            User
                        </span>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                            @guest
                                <li><a href="{{route('admin.index')}}"
                                       class="dropdown-item"
                                    >Войти</a>
                                </li>
                                <hr class="dropdown-divider border-secondary">
                            @endguest
                            <li><a href="{{route('feedback.create')}}"
                                   class="dropdown-item @if(request()->routeIs('feedback*')) text-light @endif"
                                >Обратная&nbsp;связь</a>
                            </li>
                            <li><a href="{{route('order.create')}}"
                                   class="dropdown-item @if(request()->routeIs('order*')) text-light  @endif"
                                >Заказ&nbsp;новостей</a>
                            </li>
                            @guest
                            @elseguest
                                <li><a class="dropdown-item" href="">Личный кабинет</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.index')}}">Админ панель</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                <li><a class="dropdown-item" href="#">Выйти</a></li>
                            @endguest
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</header>
