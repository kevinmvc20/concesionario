 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
                
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Administrar Usuario</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @can('usuarios.index')
              <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>  
            @endcan
            @can('roles.index')
              <li><a href="{{route('roles.index') }}"><i class="fa fa-circle-o"></i> Roles y Permisos</a></li>  
            @endcan
          </ul>
        </li>
        
         
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Gestionar Compra</span>
             <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('compras.index') }}"><i class="fa fa-circle-o"></i>Compras</a></li>  
              <li><a href="{{ route('proveedores.index') }}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
          </ul>
        </li>

  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Gestionar Venta</span>
             <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('ventas.index') }}"><i class="fa fa-circle-o"></i> Ventas</a></li>
            <li><a href={{ route('clientes.index') }}><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li><a href={{ route('contratos.index') }}><i class="fa fa-circle-o"></i> Contrato</a></li>
            <li><a href={{ route('creditos.index') }}><i class="fa fa-circle-o"></i> Credito</a></li>
            <li><a href={{ route('tipocontratos.index') }}><i class="fa fa-circle-o"></i> TipoContrato</a></li>
          </ul>
        </li>
        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Gestionar Vehiculos</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{ route('vehiculos.index') }}"><i class="fa fa-circle-o"></i>vehiculo</a>
            </li>
            <li><a href="{{ route('categorias.index') }}"><i class="fa fa-circle-o"></i> Categorías</a></li>
            <li><a href="{{ route('marcas.index') }}"><i class="fa fa-circle-o"></i>Marca</a></li>
          </ul>
        </li>

  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Gestionar Almacén</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('almacenes.index') }}"><i class="fa fa-circle-o"></i>Almacen</a></li>
            <li><a href="{{ route('tipoalmacenes.index') }}"><i class="fa fa-circle-o"></i>Tipo Almacen</a></li>
          </ul>
        </li>
        
            
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>