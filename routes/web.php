<?php

    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\ColorController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\Admin\SliderController;
    use App\Http\Controllers\Frontend\CartController;
    use App\Http\Controllers\Frontend\FrontendController;
    use App\Http\Controllers\Frontend\WishlistController;
    use App\Http\Controllers\HomeController;
    use App\Http\Livewire\Admin\Brand\Index;
    use Illuminate\Support\Facades\Route;


    Auth::routes();

    Route::get('/', [FrontendController::class, 'index']);
    Route::get('/collections', [FrontendController::class, 'categories'])->name('category');
    Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
    Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productView']);
    Route::get('/collections/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

    Route::middleware(['auth'])->group(function () {
        Route::get('wishlist', [wishListController::class, 'index']);
        Route::get('cart', [CartController::class, 'index']);
    });

    Route::middleware(['auth', 'user-role:user'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('home');
    });

    Route::middleware(['auth', 'user-role:manager'])->group(function () {
        Route::get('/manager/home', [App\Http\Controllers\HomeController::class, 'managerHome'])->name('manage.home');
    });

    // Super Admin Routes
    Route::middleware(['auth', 'user-role:super-admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//        Category
        Route::get('/category/get-slug', [CategoryController::class, 'getSlug'])
            ->name('category.slug');
        Route::resource('/category', CategoryController::class);
        Route::get('/category/get-slug', [CategoryController::class, 'getSlug'])->name('category.slug');

//        Brand
        Route::get('/brands', Index::class)->name('brand');

//        Product
        Route::get('/product-image/{product_image_id}/delete',
            [ProductController::class, 'destroyImage'])->name('deleteImage');
        Route::resource('/products', ProductController::class);
        Route::post('/product-color/{prod_color_id}', [ProductController::class, 'updateProdColorQty']);
        Route::get('/product-color/{prod_color_id}/delete', [ProductController::class, 'deleteProdColorQty']);
        Route::get('/products/get-slug', [ProductController::class, 'getSlug'])->name('products.slug');

//        Color
        Route::resource('/colors', ColorController::class);

//        Slider
        Route::resource('/sliders', SliderController::class);
    });




