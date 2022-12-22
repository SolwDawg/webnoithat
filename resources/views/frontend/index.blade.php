@extends('layouts.app')
@section('title', 'Home page')
@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            @foreach ($sliders as $key => $sliderItem)
                <div class="hero__items set-bg" data-setbg="@if ($sliderItem->image)
                        {{ asset("$sliderItem->image") }}
                @endif">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6>{{ $sliderItem->title }}</h6>
                                    <h2>{{ $sliderItem->title }}</h2>
                                    <p>{!!  $sliderItem->description !!}</p>
                                    <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic" style="width: 370px; height: 370px">
                            <img src="{{ asset('assets/img/banner/ikea-desk.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Ikea Desk Collection</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('assets/img/banner/pegboard.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Pegboard Ikea</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic" style="width: 370px; height: 370px">
                            <img src="{{ asset('assets/img/banner/loa-edifier.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Edifier Speaker</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All Product</li>
                        <li data-filter=".new-arrivals">New Arrivals</li>
                        <li data-filter=".featured">Hot Sales</li>
                        <li data-filter=".trendings">Trending</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                {{--    Arrival Section--}}
                @if ($newArrivalsProducts)
                    @foreach($newArrivalsProducts as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
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
                    @endforeach
                @endif
                {{--    Arrival Section--}}

                {{--    Trending Section--}}
                @if ($trendingProducts)
                    @foreach($trendingProducts as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix trendings">
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
                                        <h5 class="h6 py-2">{{ number_format($product->selling_price, 0, ',', '.') }}
                                            VNĐ</h5>
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
                    @endforeach
                @endif
                {{--    Trending Section--}}

                {{--    featured Section--}}
                @if ($featureProducts)
                    @foreach($featureProducts as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix featured">
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
                                        <h5 class="h6 py-2">{{ number_format($product->selling_price, 0, ',', '.') }}
                                            VNĐ</h5>
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
                    @endforeach
                @endif
                {{--    featured Section--}}
            </div>
            <div class="d-flex align-items-center flex-column px-4 pt-4">
                <a class="primary-btn" href="{{ route('category') }}">View More</a>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
