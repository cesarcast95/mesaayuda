<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryHardware extends Model
{
    protected $table = 'category_hardware';
    protected $fillable = ['name', 'description'];
    protected $guarded=['id'];
    public $timestamps = false;

    public function devices()
    {
        return $this->hasMany('App\Models\Device', 'id');
    }
}
