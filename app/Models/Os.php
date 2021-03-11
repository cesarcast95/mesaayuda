<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
    protected $table = 'os';
    protected $fillable = ['name'];
    protected $guarded=['id'];

    public function categories()
    {
        return $this->hasMany('App\Models\Device',  'id');
    }
}
