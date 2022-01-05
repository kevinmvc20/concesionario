@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Editar Cliente: {{ $cliente->persona->nombre }}</h3>           
        </div>
    </div>
    <form action="{{route('clientes.update',[$cliente->persona->id])}}" method="POST" autocomplete="off">
    @csrf    
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ci">Ci:</label>
                    <input type="number" name="ci" id="ci" class="form-control" value="{{$cliente->persona->ci}}" pattern="^[0-9_°\s]{0,200}$">
                    @error('ci')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div> 
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{$cliente->persona->nombre}}" class="form-control" placeholder="Nombre..." pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                    @error('nombre')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="email">email:</label>
                    <input type="email" name="email" id="email" class="form-control"  value="{{$cliente->persona->email }}" >
                    @error('email')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="direccion">direccion:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control"  value="{{$cliente->persona->direccion}}"  pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
                    @error('direccion')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="telefono">telefono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $cliente->persona->telefono }}" pattern="^[0-9_°\s]{0,200}$">
                    @error('telefono')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            
              
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('clientes.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection