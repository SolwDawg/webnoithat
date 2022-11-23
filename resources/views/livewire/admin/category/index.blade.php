<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel1">Category Delete</h3>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h5>Are you sure want to delete this data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="">Available Category Information</h4>
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>
            </div>
            <div class="table-responsive text-nowrap my-2">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                   class="btn btn-primary">Edit</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                   wire:click="deleteCategory({{$category->id}})"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="d-flex align-items-center flex-column px-4 pt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide')
        });
    </script>

@endpush

<!-- Bootstrap Table with Header - Light -->
