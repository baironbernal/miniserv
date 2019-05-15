<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTruck extends Model
{
    protected $fillable = [
        'name'
    ];

    public function trucks()
    {
        return $this->hasMany('App\Models\Trucks');
    }
}
