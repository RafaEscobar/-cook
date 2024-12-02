<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'date_birth',
        'email',
        'biography',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //! Consulta: usuarios que sigo
    public function followedUsers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');
    }

    //! Consulta: usuarios que me siguen
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');
    }

    public function scoreUsers()
    {
        return $this->belongsToMany(Recipe::class, 'user_scores');
    }

    public function commentRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_comments');
    }

    public function dailyMenus()
    {
        return $this->hasMany(DailyMenu::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function shareRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_shares');
    }

    public function saveRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_saves');
    }

    public function sharePosts()
    {
        return $this->belongsToMany(Post::class, 'post_shares', 'user_id', 'post_id');
    }

    public function commentPosts()
    {
        return $this->belongsToMany(Post::class, 'post_comments', 'user_id', 'post_id')
            ->withPivot('text')
            ->withPivot('id');
    }

    public function savePosts()
    {
        return $this->belongsToMany(Post::class, 'post_saves');
    }

    public function likePosts()
    {
        return $this->belongsToMany(Post::class, 'post_share');
    }

    public function topUsers()
    {
        return $this->hasMany(TopUser::class);
    }

    //* Determina sí este usuario ya sigue al usuario dado
    public function isFollowing($id)
    {
        return $this->followedUsers()->where('followed_id', $id)->exists();
    }

    //* Determina sí este usuario ya guardo el post
    public function isPostSaved($id)
    {
        return $this->savePosts()->where('post_id', $id)->exists();
    }

    //* Determina sí este usuario ya compartio el post
    public function isPostShared($id)
    {
        return $this->sharePosts()->where('post_id', $id)->exists();
    }
}
