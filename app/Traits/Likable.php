<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function like($user= null, $liked = true) {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function dislike($user = null) {
        $this->like($user, false);
    }

    public function isLikedBy(User $user): bool
    {
        //return $this->likes()->where('user_id', $user->id)->exists();
        return (bool)$user->likes()->where('tweet_id', $this->id)->where('liked',true)->count();
    }
    public function isDislikedBy(User $user): bool
    {
        return (bool)$user->likes()->where('tweet_id', $this->id)->where('liked',false)->count();
    }
}
