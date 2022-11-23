@extends('layouts.app')
@section('title', 'Categories')
@section('content')

    @include('layouts.inc.frontend.breadcrumb')

    <div class="py-4">
        <div class="row justify-content-center">
            @forelse ($categories as $category)
                <div class="col-6 col-md-3">
                    <div class="card-header">
                        <a href="{{ url('/collections/'.$category->slug)  }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $category->name }}
                                    <img src="{{ $category->image }}">
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
@endsection
