<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Exception;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Laravel\Socialite\Facades\Socialite;

    class SocialController extends Controller
    {
        public function redirect($provider)
        {
            return Socialite::driver($provider)->redirect();
        }

        public function callback($provider)
        {
            $driverUser = Socialite::driver($provider)->user();

            $user = User::updateOrCreate([
                'email' => $driverUser->email,
            ], [
                'name' => $driverUser->name,
                'password' => '',
                'provider' => $provider,
                'provider_id' => $driverUser->id
            ]);

            Auth::login($user);

            return redirect('/');
        }
    }
