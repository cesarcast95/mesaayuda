<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso_rol extends Model
{
    protected $table = 'permiso_rol';
    protected $fillable = ['rol_id', 'permiso_id',];
    protected $guarded = ['id'];// campo q no se dejara modificar nunca
    public $timestamps = true;

}
