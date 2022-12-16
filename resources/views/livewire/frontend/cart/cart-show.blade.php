<div>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cart as $cartItem)
                                @if($cartItem->product)
                                    <tr>
                                        <td class="product__cart__item">
                                            <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}"
                                               class="d-flex">

                                                @if($cartItem->product->productImages)
                                                    <div class="product__cart__item__pic" style="width: 100px">
                                                        <img
                                                            src="{{ asset($cartItem->product->productImages[0]->image ) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                <div class="product__cart__item__text">
                                                    <h5 class="align-items-center">{{ $cartItem->product->name }}</h5>
                                                </div>
                                            </a>
                                        </td>

                                        <td class="product__cart__item">
                                            <div class="product__cart__item__text">
                                                <h5>{{ number_format($cartItem->product->selling_price, 0, ',', '.') }}
                                                    VND</h5>
                                            </div>
                                        </td>

                                        @if($cartItem->productColor)
                                            @if($cartItem->productColor->color)
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__text">
                                                        <h5>{{ $cartItem->productColor->color->name }}</h5>
                                                    </div>
                                                </td>
                                            @endif
                                        @endif

                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-3 d-flex justify-content-center">
                                                    <button type="button" wire:loading.attr="disabled"
                                                            wire:click="decrementQuantity({{ $cartItem->id }})"
                                                            class="fa fa-angle-left dec qtybtn"></button>
                                                    <input type="text" value="{{ $cartItem->quantity }}">
                                                    <button type="button" wire:loading.attr="disabled"
                                                            wire:click="incrementQuantity({{ $cartItem->id }})"
                                                            class="fa fa-angle-right inc qtybtn"></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__text">
                                                <h5>{{ number_format($cartItem->product->selling_price * $cartItem->quantity, 0, ',', '.') }} VND
                                                </h5>
                                            </div>

                                        </td>
                                        @php
                                            $totalPrice += $cartItem->product->selling_price * $cartItem->quantity
                                        @endphp
                                        <td class="cart__close">
                                            <button type="button" class="rounded-circle border-0 bg-white"
                                                    wire:click="removeCartItem({{ $cartItem->id }})">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td><h5 class="text-center">No Cart Added</h5></td>
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
                <div class="col-lg-12 py-5 d-flex">
                    <div class="cart__discount col-lg-4">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total col-lg-8">
                        <h6>Cart total</h6>
                        <div class="checkout__order__products">Product <span>Price</span></div>
                        <ul class="checkout__total__products">
                            @foreach($cart as $cartItem)
                                <li>
                                    {{ $cartItem->product->name }}
                                    <span>{{ number_format($totalPrice, 0, ',', '.') }}  VND</span>
                                </li>
                            @endforeach
                        </ul>
                        <hr class="p-0" style="background: #111111">
                        <ul>
                            <li>Total <span>{{ number_format($totalPrice, 0, ',', '.') }}  VND</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</div>
