<?php

    use App\Http\Controllers\Admin\adminOrderController;
    use App\Http\Controllers\Admin\BannerController;
    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\ColorController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\DeliveryController;
    use App\Http\Controllers\Admin\ProductController;
    use App\Http\Controllers\Admin\SettingController;
    use App\Http\Controllers\Admin\SliderController;
    use App\Http\Controllers\Admin\UserController as UserControllerAdmin;
    use App\Http\Controllers\Frontend\CartController;
    use App\Http\Controllers\Frontend\CheckoutController;
    use App\Http\Controllers\Frontend\FrontendController;
    use App\Http\Controllers\Frontend\OrderController;
    use App\Http\Controllers\Frontend\UserController as UserControllerFrontend;
    use App\Http\Controllers\Frontend\WishlistController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\SocialController;
    use App\Http\Livewire\Admin\Brand\Index;
    use Illuminate\Support\Facades\Route;


    Auth::routes();

    Route::controller(FrontendController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/collections', 'categories')->name('category');
        Route::get('/collections/{category_slug}', 'products');
        Route::get('/collections/{category_slug}/{product_slug}', 'productView');
        Route::get('/collections/wishlist', 'wishlist')->name('wishlist');
        Route::get('search', 'searchProducts')->name('searchProducts');
        Route::get('/new-arrivals', 'newArrivals')->name('newArrivals');
        Route::get('/trending', 'trending')->name('trending');
        Route::get('/featured', 'featured')->name('featured');
        Route::get('thank-you', 'thanks');
    });

    Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
    Route::get('/callback/{provider}', [SocialController::class, 'callback']);

    Route::get('comments', \App\Http\Livewire\Comment::class);

    Route::middleware(['auth'])->group(function () {
        Route::get('wishlist', [wishListController::class, 'index'])->name('wishlist');
        Route::get('cart', [CartController::class, 'index'])->name('cart');
        Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
        Route::get('orders', [OrderController::class, 'index']);
        Route::get('orders/{orderId}', [OrderController::class, 'show']);
        Route::get('profile', [UserControllerFrontend::class, 'index']);
        Route::post('/updateProfile', [UserControllerFrontend::class, 'updateProfile'])->name('update.profile');
    });

    // Super Admin Routes
    Route::middleware(['auth', 'user-role:super-admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingController::class, 'store']);

        Route::resource('/users', UserControllerAdmin::class);

        Route::get('/profile', [ProfileController::class, 'index']);
        Route::post('/updateProfile', [ProfileController::class, 'updateProfile'])->name('update.profile');

//        Category
        Route::get('/category/get-slug', [CategoryController::class, 'getSlug'])
            ->name('category.slug');
        Route::resource('/category', CategoryController::class);
//        Brand
        Route::get('/brands', Index::class)->name('brand');

//        Product
        Route::get('/product-image/{product_image_id}/delete',
            [ProductController::class, 'destroyImage'])->name('deleteImage');
        Route::resource('/products', ProductController::class)->except('show');
        Route::post('/product-color/{prod_color_id}', [ProductController::class, 'updateProdColorQty']);
        Route::get('/product-color/{prod_color_id}/delete', [ProductController::class, 'deleteProdColorQty']);
        Route::get('/products/get-slug', [ProductController::class, 'getSlug'])->name('products.slug');

//        Color
        Route::resource('/colors', ColorController::class);

//        Slider
        Route::resource('/sliders', SliderController::class);
//        Banner
        Route::resource('/banner', BannerController::class);

//        Order
        Route::get('/order', [adminOrderController::class, 'index'])->name('orders.index');
        Route::get('/order/list', [adminOrderController::class, 'getOrder'])->name('orders.list');
        Route::get('/order/{orderId}', [adminOrderController::class, 'show'])->name('order.show');
        Route::put('/order/{orderId}',
            [adminOrderController::class, 'updateOrderStatus'])->name('order.updateOrderStatus');

        Route::get('/invoice/{orderId}', [adminOrderController::class, 'viewInvoice']);
        Route::get('/invoice/{orderId}/generate', [adminOrderController::class, 'generateInvoice']);
        Route::get('/invoice/{orderId}/mail', [adminOrderController::class, 'mailInvoice']);

        //Delivery
        Route::resource('/delivery', DeliveryController::class)->except('show');
        Route::get('/delivery/list', [DeliveryController::class, 'getDelivery'])->name('delivery.list');
        Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
    });




