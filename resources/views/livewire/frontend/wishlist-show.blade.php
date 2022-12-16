<div>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr class="text-center">
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($wishlist as $wishlistItem)
                                @if($wishlistItem->product)
                                    <tr>
                                        <td>
                                            <div class="product__cart__item__text">
                                                <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'. $wishlistItem->product->slug)}}">
                                                    <h4 class="text-center">{{ $wishlistItem->product->name }}</h4>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product__cart__item">
                                            <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'. $wishlistItem->product->slug)}}">
                                                <div class="product__cart__item__pic d-flex justify-content-center align-items-center">
                                                    <img src="{{ $wishlistItem->product->productImages[0]->image }}"
                                                         alt="{{ $wishlistItem->product->name }}" style="max-width: 200px;">
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <h5 class="text-center">{{ number_format($wishlistItem->product->selling_price, 0, ',', '.') }} VND</h5>
                                        </td>
                                        <td class="cart__price">{{ $wishlistItem->totalPrice }}</td>
                                        <td class="cart__close">
                                            <button type="button" class="rounded-circle border-0 bg-white"
                                                    wire:click="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td>No Wishlist Added</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ url('/collections') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</div>
