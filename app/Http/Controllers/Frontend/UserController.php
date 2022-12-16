<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Validator;

    class UserController extends Controller
    {
        public function index()
        {
            return view('frontend.user.profile');
        }

        public function updateProfile(Request $request)
        {
            $validated = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
            ]);

            if (auth()->user()->profile_image == null) {
                $validate_image = Validator::make($request->all(), [
                    'profile_image' => ['required', 'image', 'max:1000']
                ]);
                if ($validate_image->fails()) {
                    return redirect()->back()->with('message', $validate_image->errors()->first());
                }
            }

            if ($validated->fails()) {
                return redirect()->back()->with('message', $validated->errors()->first());

            }

            if ($request->hasFile('profile_image')) {
                $imagePath = 'storage/'.auth()->user()->profile_image;
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $profile_image = $request->profile_image->store('profile_images', 'public');
            }

            auth()->user()->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'profile_image' => $profile_image ?? auth()->user()->profile_image,
            ]);
            return redirect()->back()->with('message', 'profile updated successfully.');
        }
    }
