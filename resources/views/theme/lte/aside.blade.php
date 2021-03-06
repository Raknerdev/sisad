<aside class="main-sidebar sidebar-dark-primary elevation-4">
  {{-- Brand Logo  --}}
  {{--  <a href="{{ route('index') }}" class="brand-link">
    <img src="{{ asset("assets/$theme/dist/img/AdminLTELogo.png") }}" alt="SISAD" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">SISAD</span>
  </a>  --}}
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset("favicon.png") }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info text-center m-auto">
        <h5 class="text-white-50">Consorcio Express</h5>
        {{-- <a href="" class="d-block">Pedro Alvarez</a>  --}}
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="#" class="nav-link menu-is-opening menu-open">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Reporte
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('reporte') }}" class="nav-link">
                <i class="fas fa-chart-bar nav-icon"></i>
                <p>Reporte de Facturas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('almacen') }}" class="nav-link">
                <i class="fas fa-cubes nav-icon"></i>
                <p>Almacen</p>
              </a>
            </li>
          </ul>
        </li>
        @auth
        <li class="nav-item">
          <a href="{{ route('personal') }}" class="nav-link">
            <i class="nav-icon fas fa-users">
              {{-- fa-user  --}}
            </i>
            <p>
              Personal
            </p>
          </a>
        </li>
        @endauth
        <li class="nav-item">
          <a href="{{ route('clientes') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Clientes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('productos') }}" class="nav-link">
            <i class="fas fa-barcode nav-icon"></i>
            <p>
              Productos
            </p>
          </a>
        </li>

        {{-- <li class="nav-header">FACTURACION</li>  --}}
        <li class="nav-item">
          <a href="" class="nav-link menu-is-opening menu-open">
            <i class="nav-icon fas fa-cash-register"></i>
            <p>
              Facturaci??n
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ventas') }}" class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
                <p>Facturas de Venta</p>
              </a>
            </li>
            {{-- 
            <li class="nav-item">
              <a href="{{ route('compras') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Facturas de Compra</p>
              </a>
            </li>  --}}
            <li class="nav-item">
              <a href="{{ route('notas') }}" class="nav-link">
                <i class="fas fa-edit nav-icon"></i>
                <p>Notas de Entega</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ route('productos') }}" class="nav-link">
                <i class="fas fa-barcode nav-icon"></i>
                <p>Productos</p>
              </a>
            </li>  --}}
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-contract">
              {{-- fa-table  --}}
            </i>
            <p>
              RRHH
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('personal') }}" class="nav-link">
                <i class="far fa-id-card nav-icon"></i>
                <p>Personal</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Opci??n</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Opci??n</p>
              </a>
            </li>  --}}
          </ul>
        </li>

        {{-- <li class="nav-header">TESORERIA</li>  --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-coins "></i>
            {{-- fa-file  --}}
            <p>Tesoreria</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>