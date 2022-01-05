<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_almacen extends Model
{
    protected $table='tipo_almacens';
    protected $fillable = ['tipo'];
    public $timestamps=false;

    public function almacen(){
        return $this->hasMany(Almacen::class,'tipo_almacen_id');
    }
}
