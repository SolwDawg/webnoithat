<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="{{ route('category')  }} ">Shop</a>
                            <span>{{ $product->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="
                                    {{ asset($product->productImages[0]->image) }}">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    @if($product->productImages->count() > 1)
                                        <div class="product__thumb__pic set-bg"
                                             data-setbg="{{ asset($product->productImages[1]->image) }}">
                                        </div>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    @if($product->productImages->count() > 2)
                                        <div class="product__thumb__pic set-bg"
                                             data-setbg="{{ asset($product->productImages[2]->image) }}">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    @if($product->productImages)
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="">
                                    @else
                                        No Image Added
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                @if($product->productImages->count() > 0)
                                    <div class="product__details__pic__item">
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                @if($product->productImages->count() > 1)
                                    <div class="product__details__pic__item">
                                        <img src="{{ asset($product->productImages[1]->image) }}" alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                @if($product->productImages->count() > 2)
                                    <div class="product__details__pic__item">
                                        <img src="{{ asset($product->productImages[2]->image) }}" alt="">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{ $product->name }}</h4>
                            @if($product->selling_price == $product->original_price)
                                <h3>{{ number_format($product->selling_price, 0, ',', '.') }}VNĐ</h3>
                            @else
                                <h3>
                                    <span>{{ number_format($product->original_price, '0',',','.') }}VNĐ</span>
                                    {{ number_format($product->selling_price, 0, ',', '.') }}VNĐ
                                </h3>
                            @endif
                            <p>{{ $product->small_description }}</p>
                            <div class="product__details__option">
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    @if ($product->productColors->count() > 0)
                                        @if($product->productColors)
                                            @foreach($product->productColors as $colorItem)
                                                <label for="sp-4" class="c-9"
                                                       style="background: {{ $colorItem->color->code }}">
                                                    <input type="radio" id="sp-4" name="colorSelection"
                                                           wire:click="colorSelected({{ $colorItem->id }})"
                                                           value="{{ $colorItem->id }}"/>
                                                </label>
                                            @endforeach
                                        @endif
                                        <div>
                                            @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                                <h5 class="mt-3 p-2 bg-danger text-white">Out stock</h5>
                                            @elseif($this->prodColorSelectedQuantity > 0)
                                                <h5 class="mt-3 p-2 bg-success text-white">In stock</h5>
                                            @endif
                                        </div>
                                    @else
                                        @if ($product->quantity)
                                            <h5 class="mt-3 p-2 bg-success text-white">In stock</h5>
                                        @else
                                            <h5 class="mt-3 p-2 bg-danger text-white">Out stock</h5>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty-4 d-flex" style="width: 140px">
                                        <button type="button" class="fa fa-angle-up btn"
                                                wire:click="incrementQuantity"></button>
                                        <input type="text" wire:model="quantityCount"
                                               value="{{ $this->quantityCount }}">
                                        <button type="button" class="fa fa-angle-down btn"
                                                wire:click="decrementQuantity"></button>
                                    </div>
                                </div>
                                <a href="#" class="primary-btn">Buy now</a>
                            </div>
                            <div class="product__details__btns__option">
                                <button type="button" class="bg-white border-0"
                                        wire:click="addToWishList({{ $product->id }})">
                                    <i class="fa fa-heart text-danger"></i> Add To WishList
                                </button>
                                <button type="button" class="bg-white border-0"
                                        wire:click="addToCart({{ $product->id }})">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                       role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                        Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                        information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">

                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                                a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                                $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                                worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                            pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                                a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                                $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                                worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                @foreach($category->relatedProducts as $relatedProduct)
                    @if($relatedProduct->brand == "$product->brand")
                        <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                            <div class="product__item sale">
                                <div class="product__item__pic set-bg"
                                     data-setbg="{{asset($relatedProduct->productImages[0]->image)}}">
                                    <span class="label">New</span>
                                    <ul class="product__hover">
                                        <li>
                                            <button type="button"
                                                    wire:click="addToWishList({{ $relatedProduct->id }})"><img
                                                    src="{{ asset('assets/img/icon/heart.png') }}" alt="">
                                            </button>
                                        </li>

                                        <li>
                                            <a href="{{ url('/collections/'.$relatedProduct->category->slug.'/'.$relatedProduct->slug) }}"><img
                                                    src="{{ asset('assets/img/icon/search.png') }}" alt=""></a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $relatedProduct->name }}</h6>
                                    <a href="#" class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>{{ $relatedProduct->selling_price }}</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->
</div>

