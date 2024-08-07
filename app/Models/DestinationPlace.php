<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_name',
        'description',
    ];
}
