<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable= ['nombre'];
    public $timestamps = false;

    public function Vehiculo(){
        return $this->hasMany(Vehiculo::class,'categoria_id');
    }
}
