<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table= 'personas';
    protected $fillable=['ci','nombre','email','direccion','telefono'];
    public $timestamps = false;


    public function cliente(){
        return $this->hasOne(Cliente::class,'id_persona');    
      }
}


