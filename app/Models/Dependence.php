<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    protected $table = 'dependence';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'ip1', 'ip2'];
    public $timestamps = false;

    public function positions()
    {
        return $this->hasMany('App\Models\Position', 'id');
    }

    public function devices()
    {
        return $this->hasMany('App\Models\Device', 'id');
    }
}
