<?php

namespace App\Http\Controllers;

use Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        return $user;
        // $user->token;
    }
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        return $user;
        // $user->token;
    }
}