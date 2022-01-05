@extends('layout.master')
@section('contenido')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Nuevo Tipo de Contrato</h3>           
    </div>
</div>
<form action="{{route('tipocontratos.store')}}" method="POST" autocomplete="off">
@csrf    
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
        <div class="form-group">
            <label for="tipo">Tipo Contrato:</label>
            <input type="text" id="tipo" name="tipo" class="form-control" placeholder="tipo..." value="{{old('tipo')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
            @error('tipo')
                <span class="text-red"> {{ $message }} </span>
            @enderror
        </div>
    </div>   
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="descripcion..." value="{{old('descripcion')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
            @error('descripcion')
                <span class="text-red"> {{ $message }} </span>
            @enderror
        </div>
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn btn-danger" type="reset">Cancelar</button>
            <a href="{{route('tipocontratos.index')}} " class="btn btn-success">Atras</button></a>
        </div>
    </div>
</div>    
</form>       

@endsection