<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\TweetRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public TweetRepository $tweetRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TweetRepository $tweetRepository)
    {
        $this->middleware('auth');
        $this->tweetRepository = $tweetRepository;
    }
}
