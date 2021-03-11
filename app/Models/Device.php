<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'device';
    protected $fillable = ['code',
        'operative_system',
        'state',
        'name',
        'observaciones',
        'serie',
        'licencia',
        'categoryHW_id',
        'dependence_id',
        'os_id',
        'state_device_id',
        'personal_id',
        'brand_id',
        'create_at',
        'updated_at'];
    protected $guarded=['id'];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryHardware', 'categoryHW_id', 'id');
    }
    public function dependence()
    {
        return $this->belongsTo('App\Models\Dependence', 'dependence_id', 'id');
    }
    public function os()
    {
        return $this->belongsTo('App\Models\Os', 'os_id', 'id');
    }
    public function state_device()
    {
        return $this->belongsTo('App\Models\State_device', 'state_device_id', 'id');
    }
    public function personal_data()
    {
        return $this->belongsTo('App\Models\PersonalData', 'personal_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }
}
