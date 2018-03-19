<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    protected $table = 'api_yachts';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'companyId',
        'baseId',
        'locationId',
        'yachtModelId',
        'draft',
        'cabins',
        'cabinsCrew',
        'berthsCabin',
        'berthsSalon',
        'berthsCrew',
        'berthsTotal',
        'wc',
        'wcCrew',
        'engines',
        'enginePower',
        'steeringTypeId',
        'sailTypeId',
        'sailRenewed',
        'genoaTypeId',
        'genoaRenewed',
        'commission',
        'deposit',
        'maxDiscount',
        'charterType',
        'picturesURL',
        'mainPictureUrl',
        'loa'
    ];

    public function setPicturesURLAttribute($val)
    {
        $this->attributes['picturesURL'] = implode(',', $val);
    }
}
