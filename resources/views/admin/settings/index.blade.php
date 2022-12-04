@extends('layouts.admin')

@section('title', 'Settings website')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> CONFIG WEBSITE</h4>
        <div class="row">
            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf
                @if(session('message'))
                    <div class="alert alert-success py-3">{{ session('message') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-1">Website</h4>
                        <small class="text-muted float-end">Input information</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}"
                                       class="form-control"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website URL</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }} "
                                       class="form-control"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ $setting->title ?? '' }}"/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                       value="{{ $setting->meta_keywords ?? '' }}"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control"
                                          rows="8">{{ $setting->meta_description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-1">Website - Information</h4>
                        <small class="text-muted float-end">Input information</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control"
                                          rows="8">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 1</label>
                                <input type="text" name="phone1" class="form-control"
                                       value="{{ $setting->phone1 ?? '' }}"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 2</label>
                                <input type="text" name="phone2" class="form-control"
                                       value="{{ $setting->phone2 ?? '' }}"/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>email 1</label>
                                <input type="text" name="email1" class="form-control"
                                       value="{{ $setting->email1 ?? '' }}"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>email 2</label>
                                <input type="text" name="email2" class="form-control"
                                       value="{{ $setting->email2 ?? '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-1">Website - Social Media</h4>
                        <small class="text-muted float-end">Input information</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook(Optional)</label>
                                <input type="text" name="facebook" class="form-control"
                                       value="{{ $setting->facebook ?? '' }}"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control"
                                       value="{{ $setting->instagram ?? '' }}"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube</label>
                                <input type="text" name="youtube" class="form-control"
                                       value="{{ $setting->youtube ?? '' }}"/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Twitter</label>
                                <input type="text" name="twitter" class="form-control"
                                       value="{{ $setting->twitter ?? '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center justify-content-center">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
