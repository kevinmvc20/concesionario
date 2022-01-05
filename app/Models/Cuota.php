<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuotas';
    protected $fillable= ['cantidad','monto','fecha','credito_id'];
    public $timestamps=false;


    public function credito(){
        return $this->belongsTo(Credito::class,'credito_id');
    }
}
