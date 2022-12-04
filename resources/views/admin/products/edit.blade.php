@extends('layouts.admin')

@section('content')

    <div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                  enctype="multipart/form-data">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>
                @csrf
                @method('PUT')
                @if (session('message'))
                    <h5 class="alert alert-success mb-2"> {{ session('message') }} </h5>
                @endif
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
                                    <select class="form-control custom-select" name="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" class="form-control" value="{{ $product->slug }}" name="slug">
                                </div>
                                <div class="mb-3">
                                    <label class="control-label">Brand</label>
                                    <select class="form-control custom-select" name="brand">
                                        @foreach($brands as $brand)
                                            <option
                                                value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Small Description (500words)</label>
                                    <textarea class="form-control" name="small_description"
                                              rows="4">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"
                                              rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-seo" role="tabpanel">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" value="{{ $product->meta_title }}"
                                           name="meta_title">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" name="meta_description"
                                              rows="4">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea class="form-control" name="meta_keyword"
                                              rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-price" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Original Price</label>
                                            <input type="text" class="form-control"
                                                   value="{{ $product->original_price }}" name="original_price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Selling Price</label>
                                            <input type="text" class="form-control"
                                                   value="{{ $product->selling_price }}" name="selling_price">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" value="{{ $product->quantity }}"
                                                   name="quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox"
                                                   name="trending" {{ $product->trending == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Featured</label>
                                            <input type="checkbox"
                                                   name="featured" {{ $product->featured == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox"
                                                   name="status" {{ $product->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-image" role="tabpanel">
                                <div class="mb-3">
                                    <label>Upload Product Image</label>
                                    <input type="file" multiple class="form-control" name="image[]">
                                </div>
                                <div class="mb-3">
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}"
                                                         style="width: 80px; height: 80px"
                                                         class="me-3"/>
                                                    <a href="{{ route('admin.deleteImage', $image->id) }}"
                                                       class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-top-color" role="tabpanel">
                                <div class="mb-3">
                                    <label>Select Color</label>
                                    <div class="row">
                                        @forelse($colors as $colorItem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
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

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Color Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->productColors as $prodColor)
                                            <tr class="prod-color-tr">
                                                <td>
                                                    @if($prodColor->color)
                                                        {{ $prodColor->color->name }}
                                                    @else
                                                        No color found
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="text" value="{{ $prodColor->quantity}}"
                                                               class="productColorQuantity form-control"/>
                                                        <button type="button" value="{{ $prodColor->id}}"
                                                                class="updateProductColorBtn btn btn-primary">Update
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" value="{{ $prodColor->id}}"
                                                            class="deleteProductColorBtn btn btn-danger">Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function () {
                let product_id = "{{ $product->id }}";
                let prod_color_id = $(this).val();
                let qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                let data = {
                    'product_id': product_id,
                    'qty': qty,
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function (response) {
                        alert(response.message);
                    }
                })
            });
            $(document).on('click', '.deleteProductColorBtn', function () {
                let prod_color_id = $(this).val();
                let thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function (response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                });
            });
        });
    </script>

@endsection
