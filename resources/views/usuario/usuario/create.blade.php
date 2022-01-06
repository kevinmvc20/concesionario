@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Nuevo Usuario</h3>           
        </div>
    </div>
    <form action="{{route('usuarios.store')}}" method="POST" autocomplete="off">
    @csrf    
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="ci">Carnet de Identidad:</label>
                    <input type="number" name="ci" id="ci" class="form-control" placeholder="carnet identidad..." pattern="^[0-9_°\s]{0,200}$" value="{{old('ci')}}">
                    @error('ci')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div> 
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre..." value="{{old('nombre')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
                    @error('nombre')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="email..." >
                    @error('email')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="direccion..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{old('direccion')}}" > 
                    @error('direccion')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="telefono..." {{-- pattern="^[0-9_°\s]{0,200}$" --}} value="{{old('telefono')}}" >
                    @error('telefono')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div> 
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password..." value="{{old('password')}}" pattern="^[0-9_°\s]{0,200}$">
                    @error('password')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div> 
              
            {{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="roles">Agregar Rol:</label>
                            <select name="roles" id="roles"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->name}}</option>    
                                @endforeach
                            </select>
                    @error('roles')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>     --}}
            
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('usuarios.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection