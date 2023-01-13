<?php

namespace App\Repositories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository {

    public function update(User $user, array $data)
    {
        if(!is_null($data['password'])) {
            $data['password'] =  Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if(isset($data['avatar'])) {
            $data['avatar'] = $this->updateImage($user, $data['avatar'],'avatar');
        }
        if(isset($data['background'])) {
            $data['background'] = $this->updateImage($user, $data['background'],'background');
        }

        $user->update($data);
    }

    private function updateImage(User $user, mixed $image, $key)
    {
        $oldImage = $user[$key];
        $imageName = time().'.'.$image->getClientOriginalExtension();

        if (Storage::putFileAs('public/'.$key, $image, $imageName)) {
            if(!empty($oldImage)) {
                Storage::delete("public/$key/".$oldImage);
            }
        } else {
            $imageName = '';
        }

        return $imageName;
    }
}
