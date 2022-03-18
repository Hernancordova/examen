<div id="sidebar-menu">
  <ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title text-uppercase">INICIO</li>
    <li>
      <a href="{{ route('dashboard.index') }}" class="waves-effect">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="menu-title text-uppercase">ADMINISTRAR</li>
    <li>
      <a href="{{ route('usuario.index') }}" class="waves-effect">
        <i class="fas fa-users"></i>
        <span>Usuarios</span>
      </a>
    </li>

    <li>
      <a href="{{ route('admin.menu.index') }}" class="waves-effect">
        <i class="fas fa-bars"></i>
        <span>Menús de navegación</span>
      </a>
    </li>

    <li>
      <a href="{{ route('admin.movie.index') }}" class="waves-effect">
        <i class="fa fa-film"></i>
        <span>Movies</span>
      </a>
    </li>

  </ul>
</div>
