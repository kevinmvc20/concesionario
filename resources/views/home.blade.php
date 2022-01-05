<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Autocredito Elite</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      @include('layout.header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('layout.barra')





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Autocreditos Elite</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                               <div class="row">
                                  {{-- Cuadros --}}
                                  <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box" style="background: #77ecdd">
                                      <div class="inner">
                                        <h3>Usuarios</h3>

                                        <p>Concesionario</p>
                                      </div>
                                      <div class="icon" >
                                        <i class="fa fa-user"></i>
                                      </div>
                                      <a href="{{ route('usuarios.index') }}" class="small-box-footer">Más información <i class="fa fa-info-circle"></i></a>
                                    </div>
                                  </div>

                                 <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box" style="background: #76b9fb">
                                      <div class="inner">
                                        <h3>Ventas</h3>

                                        <p>Concesionario</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                      </div>
                                      <a href="{{ route('ventas.index') }}" class="small-box-footer">Más información <i class="fa fa-info-circle"></i></a>
                                    </div>
                                  </div>

                                  <!-- ./col -->
                                  <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box" style="background: #f6f465 ">
                                      <div class="inner">
                                        <h3>Compras</h3>

                                        <p>Concesionario</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                      </div>
                                      <a href="{{ route('compras.index') }}" class="small-box-footer">Mas informacion<i class="fa fa-info-circle"></i></a>
                                    </div>
                                  </div>

                                 
                                  <!-- ./col -->
                                  <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box" style="background: #f0824f ">
                                      <div class="inner">
                                        <h3>Vehiculo</h3>

                                        <p>Concesionario</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-car"></i>
                                      </div>
                                      <a href="{{ route('vehiculos.index') }}" class="small-box-footer">Más información<i class="fa fa-info-circle"></i></a>
                                    </div>
                                  </div>

     
                                  <!-- ./col -->
                                  <div class="col-lg-4 col-6">
                                    <!-- small box -->
                                    <div class="small-box" style="background: #e66969 ">
                                      <div class="inner">
                                        <h3>Almacén</h3>

                                        <p>Concesionario</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-laptop"></i>
                                      </div>
                                      <a href="{{ route('almacenes.index') }}" class="small-box-footer">Más información <i class="fa fa-info-circle"></i></a>
                                    </div>
                                  </div>
                                
                                <!-- ./col -->
                              </div>
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
    

      
    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/app.min.js') }}"></script>
    
  </body>
</html>