<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

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

    // Personas que sigen al usuario
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');
    }

    // Personas a las que el usuario sigue
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
        return $this->belongsToMany(Post::class, 'post_shares');
    }

    public function commentPosts()
    {
        return $this->belongsToMany(Post::class, 'post_comments');
    }

    public function savePosts()
    {
        return $this->belongsToMany(Post::class, 'post_save');
    }

    public function topUsers()
    {
        return $this->hasMany(TopUser::class);
    }
}
