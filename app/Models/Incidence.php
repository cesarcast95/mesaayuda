<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    protected $table = 'incidence';
    protected $guarded = ['id'];
    protected $fillable = ['description',
        'score',
        'diagnostic',
        'evidence',
        'state_id',
        'device_id',
        'functionary_id',
        'usuario_id',
        'f_total',
        't_response',
        'create_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id', 'id');
    }
    public function device()
    {
        return $this->belongsTo('App\Models\Device', 'device_id', 'id');
    }
    public function functionary()
    {
        return $this->belongsTo('App\Models\PersonalData', 'functionary_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'usuario_id', 'id');
    }
}
