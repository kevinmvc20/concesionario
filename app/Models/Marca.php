<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marcas';
    protected $fillable = ['nombre'];
    public $timestamps=false;

    
    public function Vehiculo(){
        return $this->hasMany(Vehiculo::class,'categoria_id');
    }
}
