<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'api_locations';
    protected $fillable = [
        'id',
        'name',
        'lon',
        'lat',
    ];
    public $timestamps = false;
}
