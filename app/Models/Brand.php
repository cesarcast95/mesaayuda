<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    protected $fillable = ['name'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function brands()
    {
        return $this->hasMany('App\Models\Device',  'id');
    }
}
