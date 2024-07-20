<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'package_name',
        'city',
        'country',
        'starting_price',
        'category_id',
        'duration',
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

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
