<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Project Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link {{ Request::routeIs('employees') ? 'active' : '' }}"
                href="{{ route('employees') }}">Employees</a>
            <a class="nav-item nav-link {{ Request::routeIs('projects.index') ? 'active' : '' }}"
                href=" {{ route('projects.index') }}">Projects</a>
        </div>
    </div>
</nav>
