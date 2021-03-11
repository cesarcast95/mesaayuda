<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Usuario_rol extends Pivot
{
    protected $table = 'usuario_rol';
    protected $fillable = ['rol_id', 'user_id', 'estado'];
    protected $guarded = ['id'];
    public $incrementing = true;
    public $timestamps = true;
}
