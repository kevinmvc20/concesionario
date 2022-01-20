<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacoras';
    protected $fillable=['apartado','accion','implicado','fecha','id_user','nombre_usuario'];
    public $timestamps = false;

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }
}
