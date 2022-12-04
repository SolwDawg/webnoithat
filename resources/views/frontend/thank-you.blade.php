@extends('layouts.app')

@section('title', 'Thank you for Shopping')

@section('content')

    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(session('message'))
                        <h5 class="alert">{{ session('message') }}</h5>
                    @endif
                    <h4>Thank you for shopping</h4>
                    <a href="{{ route('category') }}" class="btn btn-primary">Shop now!</a>
                </div>
            </div>
        </div>
    </div>

@endsection
