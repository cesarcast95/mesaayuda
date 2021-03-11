<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';
    protected $fillable = ['name', 'description'];
    protected $guarded = ['id'];// campo q no se dejara modificar nunca
    public $timestamps = false;


    public function dependences()
    {
        return $this->hasMany('App\Models\Incidence', 'id');
    }
}
