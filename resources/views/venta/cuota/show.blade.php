@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-xl-12 col-md-6">            
            <label for="">Cantidad:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $cuotas->cantidad }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-xl-12 col-md-6">
            <label for="">Fecha:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $cuotas->fecha }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Monto:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $cuotas->monto }}
                    </div>
                </div>               
            </div>
        </div>  
         
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Credito:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">        
                            {{ $cuotas->credito_id }}            
                    </div>
                </div>               
            </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Contrato:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">        
                            {{ $cuotas->credito->contrato->numero }}            
                    </div>
                </div>               
            </div>
        </div> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Venta:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">        
                            {{ $cuotas->credito->contrato->venta->codigo_venta }}            
                    </div>
                </div>               
            </div>
        </div> 
         
        
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 30px">
            <div class="form-group">             
                <a href="{{ route('cuotas.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
@endsection