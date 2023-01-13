<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Repositories\TweetRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{

    private TweetRepository $tweetRepository;

    public function __construct(TweetRepository $tweetRepository) {
        $this->tweetRepository = $tweetRepository;
    }

    public function index()
    {
        $tweets = Auth()->user()->timeline(true);
    //    dd($tweets->toArray());
       // $followings = Auth()->user()->follows;
        return view('tweets.index' ,[
            'tweets' => $tweets,
         //   'followings' => $followings,
        ]);
    }

    public function create()
    {
        //
    }


    public function store(TweetRequest $request)
    {
        $this->tweetRepository->createTweet(Auth::user(), $request->validated());
        return redirect()->route('home');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
