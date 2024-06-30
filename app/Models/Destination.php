<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PageMeta;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'title', // for banner
        'text',  // for banner
        'overview',
        'info',
        'tour_details',
        'map',
        'images',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'tour_details' => 'array',
        'images' => 'array',
    ];

}
