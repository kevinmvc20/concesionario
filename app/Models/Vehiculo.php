<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = ['nombre','precio','color','año','estado','nro_chasis','categoria_id','marca_id','almacen_id'];
    public $timestamps = false;

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function marca(){
        return $this->belongsTo(Marca::class,'marca_id');
    }

    public function orden_compra(){
        return $this->hasMany(Orden_Compra::class,'vehiculo_id');
    }

    public function nota_venta(){
        return $this->hasMany(Nota_venta::class,'vehiculo_id');
    }

    public function almacen(){
        return $this->belongsTo(Almacen::class,'almacen_id');
    }
}
