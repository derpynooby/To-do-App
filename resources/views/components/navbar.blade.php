<nav class="navbar navbar-expand-lg bg-body-tertiary border border-dark rounded-3 mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="bi bi-activity fs-5"></i>
        </a>
        <button class="navbar-toggler border border-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($navbar as $item)
                    <li class="nav-item">
                        <a class="nav-link fs-5 font-monospace {{ $item['active'] ? 'active' : '' }}" href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
            <form class="d-flex" role="search">
            <input class="form-control me-2 border border-primary" type="search" placeholder="Search" aria-label="Search">
            <x-button type="search"></x-button>
            </form>
        </div>
    </div>
</nav>