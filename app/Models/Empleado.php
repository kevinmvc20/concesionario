<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['usuario_id'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function compra(){
        return $this->hasMany(Compra::class,'empleado_id');
    }

    public function empleado_cliente(){
        return $this->hasMany(Empleado_cliente::class,'empleado_id');
    }
}
