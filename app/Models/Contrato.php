<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table='contratos';
    protected $fillable = ['numero','fecha','descripcion','venta_id','tipo_contrato_id'];
    public $timestamps=false;

    public function venta(){
        return $this->belongsTo(Venta::class,'venta_id');
    }

    public function tipo_contrato(){
        return $this->belongsTo(Tipo_contrato::class,'tipo_contrato_id');
    }

    public function entrega_vehiculo(){
        return $this->hasMany(Entrega_vehiculo::class,'contrato_id');
    }

    public function credito(){
        return $this->hasOne(Credito::class,'contrato_id');
    }
}
