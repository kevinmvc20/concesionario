<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden_compra extends Model
{
    protected $table ='orden_compras';
    protected $fillable = ['preciounitario', 'descripcion','proveedor_id','compra_id','vehiculo_id'];
    public $timestamps = false;
    
    public function compra(){
        return $this->belongsTo(Compra::class,'compra_id');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class,'vehiculo_id');
    }

}
