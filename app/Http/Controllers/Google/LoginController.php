<?php

namespace App\Http\Controllers\Google;

use App\Http\Controllers\Controller;
use App\Model\GetUserSocial;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function responseGoogle(GetUserSocial $getUser) {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $systemUser = $getUser->getUserBySocId($user, 'google');
        auth()->login($systemUser, true);
        return redirect()->route('home.index');
    }
}
