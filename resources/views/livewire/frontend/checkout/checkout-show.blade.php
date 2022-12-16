<div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="fullname" wire:model.defer="fullname">
                                        @error('fullname') <small class="text-danger">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Number Phone<span>*</span></p>
                                <input type="text" wire:model.defer="phone" name="phone">
                                @error('phone') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="checkout__input">
                                <p>Email Address<span>*</span></p>
                                <input type="email" name="email" wire:model.defer="email">
                                @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            {{--                            <form action="" method="POST">--}}
                            {{--                                @csrf--}}
                            {{--                                <select class="form-select" wire:model="city">--}}
                            {{--                                    <option>Default select</option>--}}
                            {{--                                    @foreach($city as $ci)--}}
                            {{--                                        <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </select>--}}

                            {{--                                @if(!is_null($city))--}}
                            {{--                                    <select class="form-select" wire:model="province">--}}
                            {{--                                        <option>Default select</option>--}}
                            {{--                                        @foreach($province as $prov)--}}
                            {{--                                            <option value="{{ $prov->maqh }}">{{ $prov->name_province }}</option>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </select>--}}
                            {{--                                @endif--}}
                            {{--                            </form>--}}
                            {{--                            <p>{{ $selectedCity }}</p>--}}
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" wire:model.defer="address"
                                       class="checkout__input__add">
                                @error('address') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="pincode" wire:model.defer="pincode">
                                @error('pincode') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="button" wire:click="codOrder" class="site-btn"
                                            wire:click="codOrder">Cash on
                                        Delivery
                                    </button>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <br/>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="#home" class="nav-link active" role="tab"
                                               data-toggle="tab">Home</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#profile" class="nav-link" role="tab" data-toggle="tab">About
                                                Us</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#about" class="nav-link" role="tab" data-toggle="tab">Contact
                                                Us</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link disabled">Disabled</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">1</div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">2</div>
                                        <div role="tabpanel" class="tab-pane fade" id="about">3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($this->totalProductAmount != '0')
                        @else
                            <div>
                                <h4>No items cart to checkout</h4>
                                <a href="{{ route('category') }}">Shop now</a>
                            </div>
                        @endif
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($carts as $cartItem)
                                        <li>
                                            {{ $cartItem->product->name }}
                                            <span>{{ number_format($cartItem->product->selling_price, 0, ',', '.') }}  VND</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <ul class="checkout__total__all">
                                    <li>Total
                                        <span>{{ number_format($this->totalProductAmount, 0, ',', '.') }} VND</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</div>

@push('script')

    <script
        src="https://www.paypal.com/sdk/js?client-id=AfyBKnn3wlbM31fh5cOQkI8BkIAtvBzEj_mtZWQ-zTbrwtrVGbIYt-XKFl2Nt4IcsEO5KWETmdLwJN1W&currency=USD"></script>

    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '77.44' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function (orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>

@endpush
