<nav class="navbar navbar-light bg-white border-bottom px-4">
    <span class="fw-semibold">@yield('title', 'Dashboard')</span>

    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
           data-bs-toggle="dropdown">
            <i class="bi bi-person-circle fs-5 me-2"></i>
            {{ Auth::user()->name ?? 'Admin' }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                    <i class="bi bi-gear me-2"></i> Profile Settings
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
