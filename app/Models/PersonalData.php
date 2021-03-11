<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    protected $table = 'personal_data';
    protected $fillable = ['name', 'last_name', 'position_id', 'user_id', 'f_total', 'f_response', 'create_at', 'updated_at'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function devices()
    {
        return $this->hasMany('App\Models\Device', 'id');
    }
}
