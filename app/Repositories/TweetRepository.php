<?php

namespace App\Repositories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TweetRepository {

    public function createTweet(User $user, array $data)
    {
        Tweet::create([
            'user_id' => $user->id,
            'body' => $data['body']
        ]);
    }
}
