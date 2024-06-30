<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_meta_id',
        'status',
        'category_name',
        'intro_text',
        'image',
        'meta_title',
        'meta_description'
    ];
}
