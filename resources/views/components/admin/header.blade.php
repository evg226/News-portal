<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('admin.index')}}" class="logo d-none d-lg-flex me-lg-3 align-items-center">
            <span class="d-none d-lg-block">Админ&nbsp;панель</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn ps-0"></i>
        <a href="{{route('home')}}" class="logo d-flex align-items-center ps-3">
            <img src="{{asset('img/logo.png')}}" alt="Logo">
            <span class="">{{config('app.name')}}</span>
        </a>

    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0">
                    <img src="{{asset('img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-sm-block ps-2">{{auth()->user()->name}}</span>
                </a>
            </li>

        </ul>
    </nav>

</header>
