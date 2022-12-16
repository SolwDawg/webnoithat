@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">]
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div class="col-xl-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-information"
                                    aria-controls="navs-pills-top-information" aria-selected="true">
                                Information
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-seo"
                                    aria-controls="navs-pills-top-seo" aria-selected="false">
                                SEO
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-price"
                                    aria-controls="navs-pills-top-price" aria-selected="false">
                                Price
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-image"
                                    aria-controls="navs-pills-top-image" aria-selected="false">
                                Image
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-top-color"
                                    aria-controls="navs-pills-top-color" aria-selected="false">
                                Color
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-top-information" role="tabpanel">
                            <div class="mb-3">
                                <label class="control-label">Category</label>
                                <select class="form-select custom-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="slug">Product Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Brand</label>
                                <select class="form-select custom-select" name="brand">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Small Description (500words)</label>
                                <textarea class="form-control" name="small_description" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-seo" role="tabpanel">
                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title">
                            </div>
                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-price" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text"  class="form-control price_format" name="original_price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" class="form-control price_format" name="selling_price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="quantity">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-image" role="tabpanel">
                            <div class="mb-3">
                                <label>Upload Product Image</label>
                                <input type="file" multiple class="form-control" name="image[]">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-top-color" role="tabpanel">
                            <div class="row">
                                <label>Select Color</label>
                                @forelse($colors as $colorItem)
                                    <div class="col-md-3">
                                        <div class="p-2 border">
                                            Color: <input type="checkbox" name="colors[{{ $colorItem->id }}]"
                                                          value="{{ $colorItem->id }}"/> {{ $colorItem->name }}
                                            <br>
                                            Quantity: <input type="number"
                                                             name="colorquantity[{{ $colorItem->id }}]"
                                                             class="form-control"/>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <h1>No colors Found</h1>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#name').change(function () {
                $("button[type='submit]").prop('disabled', true);
                $.ajax({
                    url: '{{ route("admin.products.slug") }}',
                    type: 'get',
                    data: {name: $(this).val()},
                    dataType: 'json',
                    success: function (response) {
                        $("button[type='submit]").prop('disabled', false);
                        $("#slug").val(response.slug);
                    }
                });
            });
        });
    </script>

@endpush
