<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        @auth
            <div class="offcanvas__top__hover">

                <span>{{ Auth::user()->name }}<i class="arrow_carrot-down"></i></span>
                <ul>
                    <li class="text-white">
                        <a href="{{ url('/profile') }}"
                           class="dropdown-item text-center align-middle h6 fw-bold">
                            Profile
                        </a>
                    </li>
                    <li class="text-white">
                        <a href="{{ url('/orders') }}"
                           class="dropdown-item text-center align-middle h6 fw-bold">
                            Order List
                        </a>
                    </li>
                    <li class="text-white">
                        <a class="dropdown-item align-middle h6 fw-bold" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        @else
            <div class="header__top__links">
                <a href="{{ route('login') }}">Sign in</a>
                <a href="#">FAQs</a>
            </div>
        @endif
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{ asset('assets/img/icon/search.png') }}" alt=""></a>
        <a class="nav-link" href="{{ route('cart') }}">
            <img src="{{ asset('assets/img/icon/cart.png') }}" alt="">
            <span class="badge badge-pill bg-danger text-white"><livewire:frontend.cart.cart-count/></span>
        </a>
        <a class="nav-link" href="{{ route('wishlist') }}">
            <img src="{{ asset('assets/img/icon/heart.png') }}" alt="">
            <span class="badge badge-pill bg-danger text-white"><livewire:frontend.wishlist-count/></span>
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->
<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        @auth
                            <div class="header__top__hover">
                                <span>{{ Auth::user()->name }}<i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li class="pt-2">
                                        <a href="{{ url('/profile') }}"
                                           class="dropdown-item text-center align-middle h6 fw-bold">
                                            Profile
                                        </a>
                                    </li>
                                    <li class="pt-2">
                                        <a href="{{ url('/orders') }}"
                                           class="dropdown-item text-center align-middle h6 fw-bold">
                                            Order List
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item align-middle h6 fw-bold" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Log Out') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="header__top__links">
                                <a href="{{ route('login') }}">Sign in</a>
                                <a href="#">FAQs</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-8 d-flex justify-content-between align-items-center">
                <div class="header__logo p-0">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/img/banner/Logo.png') }}" width="60px"
                                                  alt=""></a>
                </div>
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="{{ Request::is('collections') ? 'active' : '' }}">
                            <a href="{{ route('category') }}">Categories</a></li>
                        <li class="{{ Request::is('contact') ? 'active' : '' }}">
                            <a href=" ./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4 col-md-12 py-md-3 py-sm-3">
                <form action="{{ route('searchProducts') }}" method="GET" class="d-flex">
                    <input class="form-control mx-2" type="search" name="search" value="{{ Request::get('search') }}"
                           placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit"><img
                            src="{{ asset('assets/img/icon/search.png') }}" alt=""></button>
                </form>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="header__nav__option">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <img src="{{ asset('assets/img/icon/cart.png') }}" alt="">
                        <span class="badge badge-pill bg-danger text-white"><livewire:frontend.cart.cart-count/></span>
                    </a>
                    <a class="nav-link" href="{{ route('wishlist') }}">
                        <img src="{{ asset('assets/img/icon/heart.png') }}" alt="">
                        <span class="badge badge-pill bg-danger text-white"><livewire:frontend.wishlist-count/></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
