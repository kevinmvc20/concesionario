<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable=['id_persona'];
    public $timestamps = false;

    public function persona(){
        return $this->belongsTo(Persona::class,'id_persona');
    }

    public function empleado_cliente(){
        return $this->hasMany(Empleado_cliente::class,'cliente_id');
    }
}
