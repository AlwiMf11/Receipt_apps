<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
            Recipe<span class="text-success">Hub</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold text-success' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('recipes.index') ? 'active fw-semibold text-success' : '' }}" href="{{ route('recipes.index') }}">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-semibold text-success' : '' }}" href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-semibold text-success' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>

            <form action="{{ route('recipes.search') }}" method="GET" class="d-flex me-lg-3 my-2 my-lg-0">
                <input type="search" name="q" class="form-control form-control-sm" placeholder="Search recipes..."
                       value="{{ request('q') }}">
                <button type="submit" class="btn btn-sm btn-success ms-2">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-success">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-success">Login</a>
            @endauth
        </div>
    </div>
</nav>
