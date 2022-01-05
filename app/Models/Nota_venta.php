<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota_venta extends Model
{
    protected $table='nota_ventas';
    protected $fillable=['precio_unitario','vehiculo_id','venta_id'];
    public $timestamps = false;

    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id');
    }

    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class,'vehiculo_id');
    }
}
