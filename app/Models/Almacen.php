<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacens';
    protected $fillable = ['stock','tipo_almacen_id'];
    public $timestamps = false;

    public function tipo_almacen(){
        return $this->belongsTo(Tipo_almacen::class,'tipo_almacen_id');
    }

    public function vehiculo(){
        return $this->hasMany(Almacen::class, 'almacen_id');
    }

}
