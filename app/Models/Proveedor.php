<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    
    protected $table = 'proveedors';
    protected $fillable = ['nombre','direccion','telefono','email'];
    public $timestamps = false;

    public function orden_compra(){
        return $this->hasMany(Orden_compra::class,'proveedor_id');
    }
    
}
