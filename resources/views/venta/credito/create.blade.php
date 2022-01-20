@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Nuevo Credito</h3>           
        </div>
    </div>
    <form action="{{route('creditos.store')}}" method="POST" autocomplete="off">
    @csrf    
        <div class="row">
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="pagoinicial">Pago Inicial:</label>
                    <input type="number" name="pagoinicial" id="pagoinicial" class="form-control" placeholder="0" pattern="^[1-9]\d*(\.\d+)?$" value="{{old('pagoinicial')}}">
                    @error('pagoinicial')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="entidad_financiera">Entidad Financiera:</label>
                    <input type="text" name="entidad_financiera" id="entidad_financiera" class="form-control" placeholder="entidad_financiera..." value="{{old('entidad_financiera')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
                    @error('entidad_financiera')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="contrato_id">Contrato:</label>
                            <select name="contrato_id" id="contrato_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($contratos as $contrato)
                                    <option value="{{$contrato->id}}">{{$contrato->numero}}</option>    
                                @endforeach
                            </select>
                    @error('contrato_id')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>     

                        
            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="display: flex;justify-content: center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('contratos.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection