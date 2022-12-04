@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Color</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('admin.colors.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Color Code</label>
                            <input type="text" name="code" id="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Color Code</label> </br>
                            <input type="checkbox" name="status"> Checked=Hidden, UnChecked=Visible
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Color</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
