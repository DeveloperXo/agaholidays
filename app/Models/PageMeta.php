<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'status',
        'page_meta_title',
        'page_meta_description',
        'page_url',
        'page_name', // use to find a page
        'banner_title',
        'banner_text',
        'banner_image'
    ];

    public function page_meta() {
        return $this->belongsTo(pageMeta::class);
    }
}
