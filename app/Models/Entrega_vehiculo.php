<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega_vehiculo extends Model
{
    protected $table = 'entrega_vehiculos';
    protected $fillable = ['fecha','descripcion','contrato_id'];
    public $timestamps=false;

    public function contrato(){
        return $this->belongsTo(Contrato::class,'contrato_id');
    }
}
