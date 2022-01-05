<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_contrato extends Model
{
    protected $table='tipo_contratos';
    protected $fillable = ['tipo','descripcion'];
    public $timestamps=false;

    public function contrato(){
        return $this->hasMany(Contrato::class,'tipo_contrato_id');
    }
}
