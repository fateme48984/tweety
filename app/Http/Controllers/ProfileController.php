<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;

class ProfileController extends Controller
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function show(User $user) {
        $tweets = $user->timeline();
        return View('profiles.show', compact('user','tweets'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user);
        return View('profiles.edit', compact('user'));
    }

    public function update(UserRequest $userRequest, User $user) {
        $this->userRepository->update($user, $userRequest->validated());

        return redirect()->route('profile.show',$user);
    }
}
