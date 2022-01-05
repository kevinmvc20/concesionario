<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='ventas';
    protected $fillable =['subtotal','descripcion','cantidad','fecha','codigo_venta','empleado_cliente_id'];
    public $timestamps = false;

    public function nota_venta(){
        return $this->hasMany(Nota_venta::class,'venta_id');
    }
    
    public function contrato(){
        return $this->hasOne(Contrato::class,'venta_id');
    }

    public function empleado_cliente(){
        return $this->belongsTo(Empleado_cliente::class,'empleado_cliente_id');
    }
}
