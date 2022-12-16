@extends('layouts.app')
@section('title', 'Categories')
@section('content')

    @include('layouts.inc.frontend.breadcrumb')

    <div class="container py-3 py-md-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Our Categories</h2>
            </div>
            @forelse ($categories as $category)
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 p-4">
                    <div class="card product__item">
                        <a href="{{ url('/collections/'.$category->slug)  }}" class="p-2">
                            <div class="product__item__pic set-bg"
                                 data-setbg="{{ $category->image }}">
                            </div>
                            <div class="py-4 text-center">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <h5 class="text-center">No Category found</h5>
            @endforelse
        </div>
    </div>
@endsection
