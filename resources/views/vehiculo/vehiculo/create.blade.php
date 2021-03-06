@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Nuevo Vehiculo</h3>           
        </div>
    </div>
    <form action="{{route('vehiculos.store')}}" method="POST" autocomplete="off">
    @csrf    
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{old('nombre')}}">
                    @error('nombre')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" class="form-control" placeholder="0" pattern="^[1-9]\d*(\.\d+)?$" value="{{old('precio')}}">
                    @error('precio')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" name="color" id="color" class="form-control" placeholder="color..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{old('color')}}" >
                    @error('color')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="año">Año:</label>
                    <input type="text" name="año" id="año" class="form-control" placeholder="año..." value="{{old('año')}}" pattern="^[1-9]\d*(\.\d+)?$">
                    @error('año')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="nro_chasis">Nro_chasis:</label>
                    <input type="text" name="nro_chasis" id="nro_chasis" class="form-control" placeholder="nro_chasis..." value="{{old('nro_chasis')}}">
                    @error('nro_chasis')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="categoria_id">Categoria:</label>
                            <select name="categoria_id" id="categoria_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>    
                                @endforeach
                            </select>
                    @error('categoria_id')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>     
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="marca_id">Marca:</label>
                            <select name="marca_id" id="marca_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                @endforeach
                            </select>
                    @error('marca_id')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="almacen_id">Almacen:</label>
                            <select name="almacen_id" id="almacen_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($almacenes as $almacen)
                                    <option value="{{$almacen->id}}">{{$almacen->tipo_almacen->tipo}}</option>
                                @endforeach
                            </select>
                    @error('almacen_id')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="">Marca:</label>
                            <select name="marca_id"  class="form-control selectpicker" data-live-search="true">
                                <option value="0">Seleccione:</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{$marca->id}}">{{$marca->marca}}</option>
                                @endforeach
                            </select>
                    @error('marca_id')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div> --}}
            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="display: flex;justify-content: center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('vehiculos.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection