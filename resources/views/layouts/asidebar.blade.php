<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-danger p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ url('/') }}">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-home"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Infohogar</span></div>
        </a>

        <hr class="sidebar-divider my-0">

        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ url('/') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('properties') }}"><i class="fas fa-home"></i><span>Bienes Raices</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('users') }}"><i class="fas fa-user"></i><span>Usuarios</span></a></li>
        </ul>

        <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button">
            </button>
        </div>
    </div>
</nav>