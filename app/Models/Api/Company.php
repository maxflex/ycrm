<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'api_companies';
    protected $fillable = [
        'id',
        'name',
        'address',
        'city',
        'zip',
        'countryId',
        'phone',
        'fax',
        'vatcode',
        'web',
        'email',
        'pac',
    ];
    public $timestamps = false;
}
