<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'api_prices';
    public $timestamps = false;
    protected $fillable = [
        'currency',
        'type',
        'dateFrom',
        'dateTo',
        'price',
        'yacht_id'
    ];

    public function setDatetoAttribute($value)
    {
        $this->attributes['dateFrom'] = fromDotDate($value);
    }

    public function setDatefromAttribute($value)
    {
        $this->attributes['dateTo'] = fromDotDate($value);
    }
}
