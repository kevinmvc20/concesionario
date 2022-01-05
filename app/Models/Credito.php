<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table='creditos';
    protected $fillable = ['pagoinicial','entidad_financiera','fecha','contrato_id'];
    public $timestamps=false;

    public function contrato(){
        return $this->belongsTo(Contrato::class,'contrato_id');
    }

    public function cuota(){
        return $this->hasMany(Cuota::class,'credito_id');
    }
}
