<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\User as UserOAuth;

class GetUserSocial extends Model
{
    public function getUserBySocId(UserOAuth $user, string $socName)
    {
        $userInSystem = User::query()
            ->where('id_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();

        if (empty($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => $user->getEmail(),
                'password' => '',
                'is_admin' => 0,
                'id_soc' => $user->getId(),
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar() : '',
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
