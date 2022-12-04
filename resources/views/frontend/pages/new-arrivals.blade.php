@extends('layouts.app')

@section('title', 'New Arrivals Product')

@section('content')

    @if ($newArrivalsProducts)
        @foreach($newArrivalsProducts as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg"
                         data-setbg="{{asset($product->productImages[0]->image)}}">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li>
                                <button type="button"
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
                        <h6>{{ $product->name }}</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{ $product->selling_price }}</h5>
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
        @endforeach
    @endif

@endsection
