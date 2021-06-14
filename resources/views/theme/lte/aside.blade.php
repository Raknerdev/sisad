<aside class="main-sidebar sidebar-dark-primary elevation-4">    
  {{--  Brand Logo  --}}
  {{--  <a href="/" class="brand-link">
    <img src="{{ asset("assets/$theme/dist/img/AdminLTELogo.png") }}" alt="SISAD" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SISAD</span>
  </a>  --}}
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{--  <div class="image">
        <img src="{{ asset("assets/$theme/dist/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
      </div>  --}}
      <div class="info text-center m-auto">
        <h5 class="text-white-50">Pedro Alvarez</h5>
        {{--  <a href="" class="d-block">Pedro Alvarez</a>  --}}
      </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{--  Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library --}}

        <li class="nav-item">
          <a href="/reporte" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Reporte
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/personal" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Personal
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/clientes" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Clientes
            </p>
          </a>
        </li>
        
        {{--  <li class="nav-header">FACTURACION</li>  --}}
        <li class="nav-item">
          <a href="" class="nav-link menu-is-opening menu-open">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Facturación
              {{--  <i class="fas fa-angle-left right"></i>  --}}
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
              <a href="/factura_venta" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Facturas de Venta</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/factura_compra" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Facturas de Compra</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/nota" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Notas de Entega</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/productos" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Productos</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              RRHH
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/personal" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Personal</p>
              </a>
            </li>
            {{--  <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Opción</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Opción</p>
              </a>
            </li>  --}}
          </ul>
        </li>

        {{--  <li class="nav-header">TESORERIA</li>  --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Tesoreria</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>