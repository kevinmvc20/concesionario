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
               

              @can('bitacoras.index')
              <li><a href="{{ route('bitacoras.index') }}"><i class="fa fa-circle-o"></i> Bitacoras</a></li>
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
              @can('compras.index')
              <li><a href="{{ route('compras.index') }}"><i class="fa fa-circle-o"></i>Compras</a></li>
              @endcan
              @can('proveedores.index')
              <li><a href="{{ route('proveedores.index') }}"><i class="fa fa-circle-o"></i> Proveedores</a></li>  
              @endcan
              
          </ul>
        </li>

  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Gestionar Venta</span>
             <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @can('ventas.index')
            <li><a href="{{ route('ventas.index') }}"><i class="fa fa-circle-o"></i> Ventas</a></li>
            @endcan
            @can('clientes.index')
            <li><a href={{ route('clientes.index') }}><i class="fa fa-circle-o"></i> Clientes</a></li>
            @endcan
            @can('contratos.index')
            <li><a href={{ route('contratos.index') }}><i class="fa fa-circle-o"></i> Contrato</a></li>
            @endcan
            @can('tipocontratos.index')
            <li><a href={{ route('tipocontratos.index') }}><i class="fa fa-circle-o"></i> TipoContrato</a></li>
            @endcan
            @can('creditos.index')
            <li><a href={{ route('creditos.index') }}><i class="fa fa-circle-o"></i> Credito</a></li>
            @endcan
            @can('cuotas.index')
            <li><a href={{ route('cuotas.index') }}><i class="fa fa-circle-o"></i> Cuota</a></li>
            @endcan
            
            
            
          </ul>
        </li>
        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Gestionar Vehiculos</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @can('vehiculos.index')
            <li><a href="{{ route('vehiculos.index') }}"><i class="fa fa-circle-o"></i>vehiculo</a></li>
            @endcan
            @can('categorias.index')
            <li><a href="{{ route('categorias.index') }}"><i class="fa fa-circle-o"></i> Categorías</a></li>
            @endcan
            @can('marcas.index')
            <li><a href="{{ route('marcas.index') }}"><i class="fa fa-circle-o"></i>Marca</a></li>
            @endcan
          </ul>
        </li>

  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Gestionar Almacén</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @can('almacenes.index')
            <li><a href="{{ route('almacenes.index') }}"><i class="fa fa-circle-o"></i>Almacen</a></li>
            @endcan
            @can('tipoalmacenes.index')
            <li><a href="{{ route('tipoalmacenes.index') }}"><i class="fa fa-circle-o"></i>Tipo Almacen</a></li>
            @endcan
            @can('movimientoAlmacen.index')
            <li><a href="{{ route('movimientoAlmacen.index') }}"><i class="fa fa-circle-o"></i>Movimientos almacen</a></li>
            @endcan
            
          </ul>
        </li>
        
            
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>