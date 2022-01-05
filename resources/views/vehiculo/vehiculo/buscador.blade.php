<form action="{{ route('vehiculos.index') }}" method="GET" autocomplete="off" role="search">
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" name="buscador" placeholder="Buscar..." value="{{ $buscador }}">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-info">Buscar</button>
            </span>
        </div>
    </div>
</form>