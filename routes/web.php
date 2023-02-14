<?php

use App\Http\Controllers\ExploreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return View('welcome');
})->name('welcome');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::middleware('auth')->group( function() {
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store'])->name('tweets.like');
    Route::delete('/tweets/{tweet}/like', [TweetLikeController::class, 'destroy'])->name('tweets.dislike');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::post('/profile/{user:username}/follow', [FollowsController::class, 'store'])->name('user.follow');
    Route::get('/profile/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user:username}/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/explore', [ExploreController::class, 'index'])->name('tweet.explore');

});
Route::get('/profile/{user:username}', [ProfileController::class, 'show'])->name('profile.show');


