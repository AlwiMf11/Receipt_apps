<aside class="bg-dark text-white p-3" style="width: 240px; min-height: 100vh;">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-4 text-white text-decoration-none">
        <span class="fs-5 fw-bold">Recipe<span class="text-success">Hub</span></span>
    </a>

    <ul class="nav nav-pills flex-column gap-1">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-success' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.recipes.index') }}"
               class="nav-link text-white {{ request()->routeIs('admin.recipes.*') ? 'active bg-success' : '' }}">
                <i class="bi bi-journal-text me-2"></i> Manage Recipes
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}"
               class="nav-link text-white {{ request()->routeIs('admin.categories.*') ? 'active bg-success' : '' }}">
                <i class="bi bi-tags me-2"></i> Manage Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}"
               class="nav-link text-white {{ request()->routeIs('admin.profile.*') ? 'active bg-success' : '' }}">
                <i class="bi bi-person-gear me-2"></i> Profile Settings
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link text-white">
                <i class="bi bi-globe me-2"></i> View Website
            </a>
        </li>
    </ul>
</aside>
