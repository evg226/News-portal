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

        <li class="nav-heading">User</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>

    </ul>

</aside>
