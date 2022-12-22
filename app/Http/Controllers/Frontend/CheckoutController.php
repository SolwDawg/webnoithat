<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use App\Models\Province;
    use App\Models\Wards;
    use Illuminate\Http\Request;

    class CheckoutController extends Controller
    {
        public function index()
        {
            return view('frontend.checkout.index');
        }
    }
