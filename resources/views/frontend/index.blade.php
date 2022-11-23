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
                                    <p>{{ $sliderItem->description }}</p>
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

@endsection
