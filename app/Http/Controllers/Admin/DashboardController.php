<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Brand;
    use App\Models\Category;
    use App\Models\Order;
    use App\Models\Product;
    use App\Models\User;
    use Illuminate\Support\Carbon;

    class DashboardController extends Controller
    {
        public function index()
        {
            $totalProduct = Product::count();
            $totalCategories = Category::count();
            $totalBrands = Brand::count();

            $totalAllUsers = User::count();
            $totalUsers = User::where('role', 0)->count();
            $totalAdmin = User::where('role', 1)->count();

            $todayDate = Carbon::now()->format('Y-m-d');
            $thisMonth = Carbon::now()->format('m');
            $thisYear = Carbon::now()->format('Y');

            $totalOrder = Order::count();
            $todayOrder = Order::where('created_at', $todayDate)->count();
            $thisMonthOrder = Order::where('created_at', $thisMonth)->count();
            $thisYearOrder = Order::whereDate('created_at', $thisYear)->count();

            return view('admin.dashboard', compact(
                'totalOrder',
                'totalAdmin',
                'thisMonthOrder',
                'thisYearOrder',
                'totalAllUsers',
                'totalUsers',
                'totalBrands',
                'totalCategories',
                'totalProduct',
                'todayOrder',
            ));
        }
    }
