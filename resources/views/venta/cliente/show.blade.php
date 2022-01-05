@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-xl-12 col-md-6">            
            <label for="">Carnet Identidad:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $cliente->persona->ci }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-xl-12 col-md-6">
            <label for="">Nombre:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $cliente->persona->nombre }}
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Email:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">    
                        @if ($cliente->persona->email)
                            {{ $cliente->persona->email }}
                        @else
                            No tiene
                        @endif                
                       
                    </div>
                </div>               
            </div>
        </div>  
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Direccion:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">   
                        @if ($cliente->persona->direccion)
                            {{ $cliente->persona->direccion}}
                        @else
                            No tiene
                        @endif                 
                    </div>
                </div>               
            </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Telefono:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">  
                        @if ($cliente->persona->telefono)
                            {{ $cliente->persona->telefono }}
                        @else
                            No tiene
                        @endif                  
                    </div>
                </div>               
            </div>
        </div> 
        
        
        
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 20px">
            <div class="form-group">             
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
@endsection