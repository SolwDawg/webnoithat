@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Banner</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Banner</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $banner->title }}">
                            @error('title') <small class="text-danger">*{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Link to shop</label>
                            <textarea name="url" class="form-control" id="url" rows="3">{{ $banner->url }}</textarea>
                            @error('url') <small class="text-danger">*{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control mb-3" name="image" id="image">
                            @error('image') <small class="text-danger">*{{ $message }}</small> @enderror
                            <div class="text-center">
                                <img class="text-center p-2" src ="{{ asset("$banner->image") }}" style="max-width:500px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label> </br>
                            <input type="checkbox" name="status" {{ $banner->status == '1' ? 'Checked' : '' }} id="status"> Checked=Hidden,UnChecked=Visible
                        </div>
                        <div class="row text-center justify-content-center">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
