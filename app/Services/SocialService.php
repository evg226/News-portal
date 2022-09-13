<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\SocialContract;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements SocialContract
{


    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()
            ->where('email', '=', $socialUser->getEmail())
            ->first();
        if ($user === null) {
//            return route('register');
            $user = User::create([
                'name' => $socialUser->getName()?:$socialUser->getNickname(),
                'email' => $socialUser->getEmail(),
                'avatar' => $socialUser->getAvatar(),
                'password' => Hash::make(CarbonImmutable::now()),
            ]);
        } else {
            $user->name = $socialUser->getName()?:$socialUser->getNickname();
            $user->avatar = $socialUser->getAvatar();
        }
        if ($user->save()) {
            auth()->loginUsingId($user->id);
            return route('profile');
        }
//        throw new \Exception(__('auth.socialSaveFail'));
        return back()
            ->with('error', __('auth.socialSaveFail'));
    }
}
