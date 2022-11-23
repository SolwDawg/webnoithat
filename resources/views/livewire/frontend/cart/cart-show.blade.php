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
                                                <div class="pro-qty-2">
                                                    <input type="text" value="{{ $cartItem->quantity }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ $cartItem->product->selling_price }}</td>
                                        <td class="cart__close"><i class="fa fa-close"></i></td>
                                    </tr>
                                @endif
                            @empty
                                <div>No cart available</div>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
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
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</div>
