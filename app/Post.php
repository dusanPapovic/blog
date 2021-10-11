<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'body', 'is_published'];

    public static function unpublished()
    {
        return self::with('comments')->where('is_published', false);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // svi modeli su dostupni u bilo kom modelu i ne mora da se inportuje(use)
    }
}
