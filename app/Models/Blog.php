<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_meta_id',
        'status',
        'blog_title',
        'intro_text',
        'blog_content',
        'category_id',
        'user_id',
        'featured_image',
        'tags',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
