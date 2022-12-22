<div>
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                @if($category->brands)
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__brand">
                                                    <ul>
                                                        @foreach($category->brands as $brandItem)
                                                            <label class="d-block">
                                                                <input type="checkbox" wire:model="brandInputs"
                                                                       value="{{ $brandItem->name }}"/> {{ $brandItem->name }}
                                                            </label>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                        </div>
                                        <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__price">
                                                    <ul>
                                                        <li><input type="radio" name="priceSort" wire:model="priceInput"
                                                                   value="high-to-low"/> High to Low
                                                        </li>
                                                        <li><input type="radio" name="priceSort" wire:model="priceInput"
                                                                   value="low-to-high"/> Low to High
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card product__item p-2">
                                    <div class="product__item__pic set-bg"
                                         data-setbg="{{asset($product->productImages[0]->image)}}">
                                        <ul class="product__hover">
                                            <li>
                                                <button type="button"
                                                        class="border-0 p-0"
                                                        wire:click="addToWishList({{ $product->id }})"><img
                                                        src="{{ asset('assets/img/icon/heart.png') }}" alt="">
                                                </button>
                                            </li>

                                            <li>
                                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}"><img
                                                        src="{{ asset('assets/img/icon/search.png') }}" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h5>{{ $product->name }}</h5>
                                        @if($product->selling_price == $product->original_price)
                                            <h5 class="h6 py-2">{{ number_format($product->selling_price, 0, ',', '.') }}VNĐ</h5>
                                        @else
                                            <h5 class="h6 py-2">
                                                <span style="color: #b7b7b7;
                                                                    font-weight: 400;
                                                                    text-decoration: line-through;
                                                }">{{ number_format($product->original_price, '0',',','.') }}VNĐ</span>
                                                {{ number_format($product->selling_price, 0, ',', '.') }}VNĐ
                                            </h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <div class="p-2">
                                    <h4> No Products Available for {{ $category->name }}</h4>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
