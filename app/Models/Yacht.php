<?php

namespace App\Models;

use Shared\Model;

class Yacht extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'photos',
    ];

    protected $commaSeparated = [
        'photos',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            foreach ($model->photos as $photo) {
                \Storage::delete('yachts/' . $photo);
            }
        });
    }
}
