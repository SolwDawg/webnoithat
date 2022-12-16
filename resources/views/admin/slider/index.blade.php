@extends('layouts.admin')

@section('content')

    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sliders</h4>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="">Available Slider </h4>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Add New Slider</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 table-striped">
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{!!   $slider->description !!}</td>
                                <td class="image-cell" style="width: 250px">
                                    <img src="{{ asset("$slider->image") }}" style="max-width: 100%;">
                                </td>
                                <td>{{ $slider->status == 0 ? 'Visible' : 'Hidden' }}</td>
                                <td>
                                    <a href="{{ route('admin.sliders.edit',$slider->id) }}"
                                       class="btn btn-primary float-start">Edit</a>
                                    <form method="POST" action="{{ route('admin.sliders.destroy',$slider->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ms-1" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
