@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-xl-12 col-md-6">            
            <label for="">Numero:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $contratos->numero }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-xl-12 col-md-6">
            <label for="">Fecha:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $contratos->fecha }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Descripcion:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $contratos->descripcion }}
                    </div>
                </div>               
            </div>
        </div>  
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Fecha Entrega:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">   
                        @foreach ($entrega_vehiculos as $entrega_vehiculo)
                            {{ $entrega_vehiculo->fecha}}
                        @endforeach                 
                    </div>
                </div>               
            </div>
        </div> 
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Descripcion Entrega:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $entrega_vehiculo->descripcion }}
                    </div>
                </div>               
            </div>
        </div> 
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Tipo contrato:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">        
                            {{ $contratos->tipo_contrato->tipo }}            
                    </div>
                </div>               
            </div>
        </div> 
         
        
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 30px">
            <div class="form-group">             
                <a href="{{ route('contratos.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
@endsection