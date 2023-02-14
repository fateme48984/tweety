<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Tweet;
use App\Traits\Followable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
        'description',
        'background',
        'email_verified_at'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets() {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function timeline($withFriends = false) {
        if($withFriends) {
            $ids = $this->follows->pluck('id');
            $ids = $ids->push($this->id);
        } else {
            $ids = [$this->id];
        }

        return Tweet::whereIn('user_id', $ids)->with('user')
            ->withCount([
                'likes as likes' => function ($query) {
                    $query->where('liked',1);
                }
            ])
            ->withCount([
                'likes as dislikes' => function ($query) {
                    $query->where('liked',0);
                }
            ])
            ->latest()->get();
    }

    public function getAvatarAttribute($value): string
    {
        if(empty($value)) {
            return asset('storage/avatar/default-avatar.jpeg');
        }

        return asset('storage/avatar/'.$value);
    }

    public function getBackgroundAttribute($value): string
    {
        if(empty($value)) {
            return asset('storage/background/banner.jpg');
        }

        return asset('storage/background/'.$value);
    }
}
