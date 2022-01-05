<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = ['subtotal','cantidadtotal','fecha','empleado_id'];
    public $timestamps = false;

    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id');
    }

    public function orden_compra(){
        return $this->hasMany(Orden_compra::class,'compra_id');
    }
}
