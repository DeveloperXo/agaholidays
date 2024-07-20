<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'country_id',
        'city_code',
        'description',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
