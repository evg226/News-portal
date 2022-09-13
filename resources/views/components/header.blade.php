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
                        <span class="nav-link dropdown-toggle d-flex align-items-center pe-0"
                              role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">
                            @guest
                                Гость
                            @endguest
                            @auth
                                    @if(auth()->user()->avatar)
                                    <img src="{{auth()->user()->avatar}}" alt="Profile" class="rounded-circle"
                                         height="30px">
                                @endif
                                <span class="ps-2">{{auth()->user()->name}}</span>
                            @endauth
                        </span>

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                            @guest
                                <li><a href="{{route('login')}}"
                                       class="dropdown-item"
                                    >Войти</a>
                                </li>
                                <hr class="dropdown-divider border-secondary">
                            @endguest
                            @auth
                                <li><a class="dropdown-item @if(request()->routeIs('profile'))active @endif"
                                       href="{{route('profile')}}">Личный кабинет</a></li>
                                @if(auth()->user()->is_admin)
                                    <li><a class="dropdown-item" href="{{route('admin.index')}}">Админ панель</a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endauth
                            <li><a href="{{route('feedback.create')}}"
                                   class="dropdown-item @if(request()->routeIs('feedback*')) active @endif"
                                >Обратная&nbsp;связь</a>
                            </li>
                            <li><a href="{{route('order.create')}}"
                                   class="dropdown-item @if(request()->routeIs('order*')) active @endif"
                                >Заказ&nbsp;новостей</a>
                            </li>
                            @auth
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;"
                                       onclick="handleClickLogout(event)"
                                    >{{__('auth.Logout')}}</a></li>
                                @include('includes.logout')
                            @endauth
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</header>
