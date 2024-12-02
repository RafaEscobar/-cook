<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $date_birth
 * @property string|null $biography
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $commentPosts
 * @property-read int|null $comment_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $commentRecipes
 * @property-read int|null $comment_recipes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DailyMenu> $dailyMenus
 * @property-read int|null $daily_menus_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $followedUsers
 * @property-read int|null $followed_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $followers
 * @property-read int|null $followers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $likePosts
 * @property-read int|null $like_posts_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $recipes
 * @property-read int|null $recipes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $savePosts
 * @property-read int|null $save_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $saveRecipes
 * @property-read int|null $save_recipes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $scoreUsers
 * @property-read int|null $score_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $sharePosts
 * @property-read int|null $share_posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Recipe> $shareRecipes
 * @property-read int|null $share_recipes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TopUser> $topUsers
 * @property-read int|null $top_users_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDateBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

