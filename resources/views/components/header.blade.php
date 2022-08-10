<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                {{config('app.name')}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-lg-0 w-100 justify-content-end">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                {{--                <form class="d-flex">--}}
                {{--                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--                    <button class="btn btn-outline-secondary" type="submit">Search</button>--}}
                {{--                </form>--}}
            </div>
        </div>
    </nav>
</header>
