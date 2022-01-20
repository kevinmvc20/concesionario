<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovimientoAlmacen extends Model
{
    use HasFactory;

    public function detalle_movimiento(){
        return $this->hasMany('App\Models\DetalleMovimientos');
    }
    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }
}
