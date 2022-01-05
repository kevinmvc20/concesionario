@extends('layout.master')
@section('contenido')

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Crear Proveedor</h3>           
        </div>
    </div>
    <form action="{{route('proveedores.store')}}" method="POST" autocomplete="off">
    @csrf    
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"  class="form-control" placeholder="Nombre..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{old('nombre')}}">
                @error('nombre')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion"  class="form-control" placeholder="Direccion..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{old('direccion')}}">
                @error('direccion')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" id="telefono" name="telefono"  class="form-control" placeholder="telefono..." pattern="^[1-9]\d*(\.\d+)?$" value="{{old('telefono')}}">
                @error('telefono')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  class="form-control" placeholder="Email..." value="{{old('email')}}">
                @error('email')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>                  

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn btn-danger" type="reset">Cancelar</button>
                <a href="{{route('proveedores.index')}} " class="btn btn-success">Atras</button></a>
            </div>
        </div>
    </div>    
</form>                    
@endsection