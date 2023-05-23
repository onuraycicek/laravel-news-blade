<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;
    protected $fillable = [
        'title',
        'content',
        'image',
        'author_id',
        'category_id',
        'status',
    ];

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function getImageAttribute($image)
    {
        if(!$image) {
            return asset('assets/img/default.jpg');
        }

        if(!filter_var($image, FILTER_VALIDATE_URL)) {
            return asset('storage/' . $image);
        }
        return $image;
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::slug($this->title)
        );
    }
}
