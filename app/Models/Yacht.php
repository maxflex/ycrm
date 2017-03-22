<?php

namespace App\Models;

use Shared\Model;

class Yacht extends Model
{
    const UPLOAD_DIR = 'img/yachts/';

    protected $fillable = [
        'title',
        'desc',
        'photos',
        'price',
        'cabin_count',
        'room_count',
        'engine_count',
        'length',
        'horse_power',
        'rent_price',
        'year',
        'material'
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
