<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'category_name',
        'category_type',
        'intro_text',
        'image',
        'meta_title',
        'meta_description'
    ];
}
