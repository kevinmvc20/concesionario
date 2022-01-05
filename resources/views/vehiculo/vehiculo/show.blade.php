@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-xl-12 col-md-6">            
            <label for="">Nombre:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $vehiculo->nombre }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-xl-12 col-md-6">
            <label for="">Precio:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $vehiculo->precio }}
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Color:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $vehiculo->color }}
                    </div>
                </div>               
            </div>
        </div>  
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Año:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $vehiculo->año}}
                    </div>
                </div>               
            </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Nro_chasis:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $vehiculo->nro_chasis }}
                    </div>
                </div>               
            </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Categoria:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">        
                            {{ $vehiculo->categoria->nombre }}            
                    </div>
                </div>               
            </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Marca:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                  
                            {{ $vehiculo->marca->nombre }}
                    </div>
                </div>               
            </div>
        </div>   
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Almacen:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                  
                            {{ $vehiculo->almacen->tipo_almacen->tipo }}
                    </div>
                </div>               
            </div>
        </div> 
        
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 30px">
            <div class="form-group">             
                <a href="{{ route('vehiculos.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
@endsection