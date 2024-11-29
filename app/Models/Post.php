<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'post_category_id'
    ];

    public function shareByUsers()
    {
        return $this->belongsToMany(User::class, 'post_shares')->withTimestamps();
    }

    public function commentByUsers()
    {
        return $this->belongsToMany(User::class, 'post_comments', 'post_id', 'user_id')
            ->withPivot('text')
            ->withTimestamps();
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'post_saves')->withTimestamps();
    }

    public function likesByUsers()
    {
        return $this->belongsToMany(User::class, 'post_likes')->withTimestamps();
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
