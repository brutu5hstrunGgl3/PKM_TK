<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top py-2">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
            @if(isset($logo) && $logo->logo)
                <img src="{{ asset('storage/' . e($logo->logo)) }}" alt="Logo" style="max-height: 60px;">
            @else
                <span class="fw-bold text-primary fs-4">BabyCare</span>
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                @forelse($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ e($menu->url) }}" class="nav-link fw-medium text-dark px-3">{{ e($menu->name) }}</a>
                    </li>
                @empty
                    <li class="nav-item">
                        <span class="nav-link text-muted fst-italic">Belum ada menu</span>
                    </li>
                @endforelse
            </ul>

            <div class="d-flex align-items-center">
                <i class="fa fa-phone-alt text-primary me-2"></i>
                <div class="d-flex flex-column">
                    <small class="text-muted">Hubungi kami</small>
                    <a href="#" class="text-secondary text-decoration-none fw-semibold">{{ e($contact->phone ?? '-') }}</a>
                </div>
            </div>
        </div>
    </div>
</nav>
