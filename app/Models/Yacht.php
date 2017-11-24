<?php

namespace App\Models;

use Shared\Model;

class Yacht extends Model
{
    const UPLOAD_DIR = 'img/yachts/';
    const TYPES = ['катер', 'моторная яхта', 'парусная яхта'];
    const BODIES = ['алюминий', 'стеклопластик'];

    protected $fillable = [
        "name",
        "price",
        "location",
        "guests_capacity",
        "staff_capacity",
        "skipper_required",
        "length",
        "width",
        "draught",
        "water_capacity",
        "gas_capacity",
        "type",
        "body",
        "year",
        "beds",
        "cabins",
        "staff_cabins",
        "toilets",
        "engine",
        "power",
        "motors",
        "max_speed",
        "cruising_speed",
        "fuel_consumption",
        "grot",
        "genuya",
        "spinaker",
        "genaker",
        "grot_trap",
        "description",
    ];

    protected $commaSeparated = [
        'photos',
    ];

    protected static function boot()
    {
        static::deleted(function ($model) {
            foreach ($model->photos as $photo) {
                \Storage::delete(self::UPLOAD_DIR . $photo);
            }
        });
    }
}
