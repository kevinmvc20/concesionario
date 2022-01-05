<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_cliente extends Model
{
    protected $table='empleadoclientes';
    protected $fillable=['cliente_id','empleado_id'];
    public $timestamps = false;

    public function empleado(){
        return $this->belongsTo(Empleado::class,'empleado_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function venta(){
        return $this->hasMany(Venta::class,'empleado_cliente_id');
    }
}
