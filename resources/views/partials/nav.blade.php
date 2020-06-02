<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
  @if (auth()->user()->hasRoles(['admin', 'abogado', 'practicante']))
    <li class="nav-item">
      <a href="{{ route('welcome') }}" class="nav-link {{request()->is('casos-por-vencer') ? 'active' : ''}}">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Casos por vencer
        </p>
      </a>
    </li>
  @endif

  @if (auth()->user()->hasRoles(['admin', 'recep']))

    <li class="nav-item has-treeview {{request()->is('expedientes/*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link {{request()->is('expedientes/*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Mesa de Partes
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview ">
        <li class="nav-item">
          <a href="{{ route('expedientes.index') }}" class="nav-link {{request()->is('expedientes.index') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Lista Expedientes</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview ">
        <li class="nav-item">
          <a href="{{ route('expedientes.create') }}" class="nav-link {{request()->is('expedientes/create') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Nuevo Expediente</p>
          </a>
        </li>
      </ul>
    </li>

  @endif

  @if (auth()->user()->hasRoles(['admin', 'abogado', 'practicante']))

    <li class="nav-item has-treeview {{request()->is('pendientes/*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link {{request()->is('pendientes/*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Casos Pendientes
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('pendientes.index') }}" class="nav-link {{request()->is('pendientes.index') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Casos Asignados</p>
          </a>
        </li>
      </ul>
    </li>

  @endif

  @if (auth()->user()->hasRoles(['admin']))

    <li class="nav-item has-treeview {{request()->is('usuarios/*') ? 'menu-open' : ''}}"">
      <a href="#" class="nav-link {{request()->is('usuarios/*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Trabajadores
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('usuarios.index') }}" class="nav-link {{request()->is('usuarios') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Lista de Trabajadores</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('usuarios.create') }}" class="nav-link {{request()->is('usuarios.create') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Nuevo Trabajador</p>
          </a>
        </li>
      </ul>
    </li>

  @endif

  @if (auth()->user()->hasRoles(['admin', 'recep']))
  
    <li class="nav-item has-treeview {{request()->is('materias/*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link {{request()->is('materias/*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Materias
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('materias.create') }}" class="nav-link {{request()->is('materias/*') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Nueva Materia</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview {{request()->is('juzgados/*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link {{request()->is('juzgados/*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Juzgados
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('juzgados.create') }}" class="nav-link {{request()->is('juzgados/*') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Nuevo Juzgado</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview {{request()->is('procesos/*') ? 'menu-open' : ''}}">
      <a href="#" class="nav-link {{request()->is('procesos/*') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Procesos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('procesos.create') }}" class="nav-link {{request()->is('procesos/*') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Nuevo Proceso</p>
          </a>
        </li>
      </ul>
    </li>

  @endif
  </ul>
</nav>