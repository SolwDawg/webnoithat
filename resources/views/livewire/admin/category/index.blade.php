<div>
    {{--    wire:ignore	Instructs Livewire to not update the element or its children when updating the DOM from a server request. Useful when using third-party JavaScript libraries within Livewire components.--}}
    {{--    wire:ignore.self	The "self" modifier restricts updates to the element itself, but allows modifications to its children.--}}
    {{--    Delete Categories Modals--}}
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
                {{--                Like the above example using `wire:submit.prevent` directly at the form opening tag will generate "readonly" properties for all html elements inside the form during the requests.--}}
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
    {{--    Delete Categories Modals--}}


    <!-- Table Categories -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session('message'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
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
                                   class="btn btn-primary me-3">Edit</a>
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
<!-- Table Categories -->

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide')
        });
    </script>
@endpush

