<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopUser extends Model
{
    protected $fillable = [
        'amount_recipes',
        'amount_followers',
        'average_recipe',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
