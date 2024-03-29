<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet) {
        $tweet->like();
        return back();
    }

    public function destroy(Tweet $tweet) {
        $tweet->dislike();
        return back();
    }
}
