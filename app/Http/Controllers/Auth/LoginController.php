<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Http\Request;

    class LoginController extends Controller
    {
        use AuthenticatesUsers;

        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }

        public function login(Request $request)
        {
            $input = $request->all();

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (auth()->attempt(['email' => $input["email"], 'password' => $input["password"]])) {
                if (auth()->user()->role == 'super-admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (auth()->user()->role == 'manager') {
                    return redirect()->route('manage.home');
                } else {
                    return redirect()->route('home');
                }
            } else {
                return redirect()->route('login')->with("error", "Incorrect email or password");
            }
        }
    }
