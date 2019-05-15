<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'name',
        'mark',
        'license_plate',
        'type_truck_id',
        'weight',
    ];

    public function typeTruck()
    {
        return $this->belongsTo('App\Models\TypeTruck');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
