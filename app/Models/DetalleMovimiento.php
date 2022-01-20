<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMovimiento extends Model
{
    use HasFactory;

    public function movimiento_almacen(){
        $this->belongsTo('App\Models\MovimientoAlmacen');
    }
    public function almacen(){
        $this->hasMany('App\Models\Almacen');
    }
}
