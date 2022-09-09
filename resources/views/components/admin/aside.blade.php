<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if(!request()->routeIs('admin.index')) collapsed @endif" href="{{route('admin.index')}}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link @if(!request()->routeIs('admin.categories*')) collapsed @endif" href="{{route('admin.categories')}}">
                <i class="bi bi-collection"></i>
                <span>Категории</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(!request()->routeIs('admin.news*')) collapsed @endif" href="{{route('admin.news')}}">
                <i class="bi bi-chat-left-text"></i>
                <span>Новости</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(!request()->routeIs('admin.sources*')) collapsed @endif" href="{{route('admin.sources')}}">
                <i class="bi bi-chat-left-text"></i>
                <span>Источники</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if(!request()->routeIs('admin.users*')) collapsed @endif" href="{{route('admin.users')}}">
                <i class="bi bi-chat-left-text"></i>
                <span>Пользователи</span>
            </a>
        </li>

        <li class="nav-heading">User</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('profile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('home')}}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Выйти на сайт</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="javascript:;"
               onclick="handleClickLogout(event);"
            >
                <i class="bi bi-box-arrow-in-right"></i>
                <span>{{__('auth.Logout')}}</span>
            </a>
            @include('includes.logout')
        </li>

    </ul>

</aside>
