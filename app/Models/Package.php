<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_meta_id',
        'status',
        'package_name',
        'package_location',
        'actual_price',
        'payable_price',
        'tags',
        'infos',
        'images',
        'video',
        'intro_text',
        'body_text',
        'included_excluded',
        'tour_plan',
        'tour_map',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'tags' => 'array',
        'infos' => 'array',
        'images' => 'array',
        'included_excluded' => 'array',
        'tour_plan' => 'array',
    ];

    public function page_meta() {
        return $this->belongsTo(PageMeta::class);
    }
}
