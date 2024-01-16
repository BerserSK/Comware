
<h6 class="navbar-heading text-muted">
  @if(auth()->user()->role == 'admin')
  Gestion
  @else 
    Menú
  @endif
</h6>

<ul class="navbar-nav">

    @if(auth()->user()->role == 'admin')
    <li class="nav-item  active ">
      <a class="nav-link  active " href="/home">
        <i class="ni ni-tv-2 text-danger"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/plantillasInfo">
        <i class="ni ni-briefcase-24 text-blue"></i> Plantillas Informativos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/maps.html">
        <i class="fas fa-stethoscope text-info"></i> Arbol de categorias
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/profile.html">
        <i class="fas fa-bed text-warning"></i> Bitacora
      </a>
    </li>
    @elseif(auth()->user()->role == 'usuario')
    <li class="nav-item">
      <a class="nav-link " href="/plantillainfo/create">
        <i class="ni ni-briefcase-24 text-blue"></i> Plantillas Informativos
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/maps.html">
        <i class="fas fa-stethoscope text-info"></i> Arbol de categorias
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="./examples/profile.html">
        <i class="fas fa-bed text-warning"></i> Bitacora
      </a>
    </li>
    @endif

    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="fas fa-sign-in-alt"></i> Cerrar Sesion
      </a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>
  </ul>
  @if(auth()->user()->role == 'admin')
    <!-- Divider -->
    <hr class="my-3">
    <!-- Heading -->
    <h6 class="navbar-heading text-muted">Administrar</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">
      <li class="nav-item">
        <a class="nav-link" href="/usuarios">
          <i class="ni ni-books text-default"></i> Usuarios
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admins">
          <i class="ni ni-chart-bar-32 text-warning"></i> Administradores
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/plantillas') }}">
          <i class="ni ni-chart-bar-32 text-warning"></i> Plantillas
        </a>
      </li>
    </ul>
  @endif
