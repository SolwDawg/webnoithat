<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class UserController extends Controller
    {
        public function index()
        {
            return view('frontend.user.profile');
        }

        public function updateUserProfile(Request $request)
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->update([
                'name' => $request->username,
            ]);
            $user->userDetail()->updateOrCreate([
                [
                    'user_id' => $user->id,
                ],
                [
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]
            ]);
        }

    }
