<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State_device extends Model
{
    protected $table = 'state_device';
    protected $fillable = ['name'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function devices()
    {
        return $this->hasMany('App\Models\Device', 'id');
    }
}
