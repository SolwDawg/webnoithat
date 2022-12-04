<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
              <span class="app-brand-logo">
                    <img src="{{ asset('assets/img/banner/Logo.png') }}" width="50px">
              </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Solw</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner pt-4">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <!-- Categories -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Account Settings">Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.category.index') }}" class="menu-link">
                        <div data-i18n="Account">All Categories</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.category.create') }}" class="menu-link">
                        <div data-i18n="Notifications">Add Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Brands -->
        <li class="menu-item">
            <a href="{{ route('admin.brand') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-store-alt"></i>
                <div>Brands</div>
            </a>
        </li>
        <!-- Products -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                <div data-i18n="Account Settings">Product</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.products.index') }}" class="menu-link">
                        <div data-i18n="Account">All Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.products.create') }}" class="menu-link">
                        <div data-i18n="Notifications">Add Product</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Brands -->
        <li class="menu-item">
            <a href="{{ route('admin.orders.index') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-receipt'></i>
                <div>Orders</div>
            </a>
        </li>

        <!-- Colors -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-palette"></i>
                <div data-i18n="Account Settings">Color</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.colors.index') }}" class="menu-link">
                        <div data-i18n="Account">All Color</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.colors.create') }}" class="menu-link">
                        <div data-i18n="Notifications">Add Color</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Sliders -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-slideshow"></i>
                <div data-i18n="Account Settings">Slider</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.sliders.index') }}" class="menu-link">
                        <div data-i18n="Account">All Slider</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.sliders.create') }}" class="menu-link">
                        <div data-i18n="Notifications">Add Slider</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Setting website -->
        <li class="menu-item">
            <a href="{{ route('admin.settings') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-cog'></i>
                <div>Setting website</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
