<div>
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cart as $cartItem)
                                @if($cartItem->product)
                                    <tr>
                                        <td class="product__cart__item">
                                            <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                @if($cartItem->product->productImages)
                                                    <div class="product__cart__item__pic">
                                                        <img
                                                            src="{{ asset($cartItem->product->productImages[0]->image ) }}"
                                                            alt="">
                                                    </div>
                                                @else
                                                @endif
                                                <br>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $cartItem->product->name }}</h6>
                                                    <h5>$98.49</h5>
                                                </div>
                                            </a>
                                        </td>
                                        @if($cartItem->productColor)
                                            @if($cartItem->productColor->color)
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__text">
                                                        <h6>{{ $cartItem->productColor->color->name }}</h6>
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
                                        <td class="cart__price">{{ $cartItem->product->selling_price * $cartItem->quantity }}</td>
                                        @php
                                            $totalPrice += $cartItem->product->selling_price * $cartItem->quantity
                                        @endphp
                                        <td class="cart__close">
                                            <button type="button" wire:click="removeCartItem({{ $cartItem->id }})">
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
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>{{ $totalPrice }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</div>
