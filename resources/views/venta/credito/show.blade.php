@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-xl-12 col-md-6">            
            <label for="">Pago Inicial:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $creditos->pagoinicial }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-xl-12 col-md-6">
            <label for="">Fecha:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $creditos->fecha }}
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Entidad financiera:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">                    
                       {{ $creditos->entidad_financiera }}
                    </div>
                </div>               
            </div>
        </div>  
        
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Contrato:</label>                    
                <div class="panel panel-default">
                    <div class="panel-body">        
                            {{ $creditos->contrato->numero }}            
                    </div>
                </div>               
            </div>
        </div> 
         
        
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 30px">
            <div class="form-group">             
                <a href="{{ route('creditos.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
@endsection