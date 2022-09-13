<?php

namespace App\Http\Controllers;

use App\Services\Contracts\SocialContract;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymphonyRedirectResponse;
use \Illuminate\Http\RedirectResponse;


class SocialController extends Controller
{
    public function redirect(string $driver): SymphonyRedirectResponse|RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, SocialContract $social):
    \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        return redirect(
            $social->loginAndGetRedirectUrl(
                Socialite::driver($driver)->user()
            ));
    }
}
