<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function index() {
        return view(
            'tweets.explore',
        [
            'users' => User::paginate(50)
        ]);
    }
}
