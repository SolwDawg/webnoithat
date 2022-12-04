@extends('layouts.admin')

@section('content')

    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="">Available Product Information</h4>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                     @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->category)
                                    {{ $product->category->name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary float-start m-1">Edit</a>
                                <form method="post" action="{{ route('admin.products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger m-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                     @empty
                         <tr>
                             <td colspan="7">No Products Available </td>
                         </tr>
                     @endforelse
                    </tbody>
                </table>

                <div class="d-flex align-items-center flex-column px-4 pt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
