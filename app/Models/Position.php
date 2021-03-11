<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';
    protected $fillable = ['name', 'description', 'dependence_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function dependence()
    {
        return $this->belongsTo('App\Models\Dependence', 'dependence_id','id');
    }

    public function personaldatas()
    {
        return $this->hasMany('App\Models\PersonalData');
    }
}
