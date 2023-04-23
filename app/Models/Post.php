<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PostCategory;

class Post extends Model
{
    use HasFactory;

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}
