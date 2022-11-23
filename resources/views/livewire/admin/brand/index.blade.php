<div>

    @include('livewire.admin.brand.modal-form')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All brand</h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="">Available brand Information</h4>
                <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary">Add Brand</a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>SLUG</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                @if($brand->category)
                                    {{ $brand->category->name }}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->status == '1' ? 'hidden' : 'visible' }}</td>
                            <td>
                                <a href="#" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal"
                                   data-bs-target="#updateBrandModal" class="btn btn-primary">Edit</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                   wire:click="deleteBrand({{$brand->id}})"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Brands Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex align-items-center flex-column px-4 pt-4">
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#name').change(function () {
            $("button[type='submit']").prop('disabled', true);
            $.ajax({
                url: '{{ route("admin.brand") }}',
                type: 'get',
                data: {name: $(this).val()},
                dataType: 'json',
                success: function (response) {
                    $("button[type='submit']").prop('disabled', false);
                    $("#slug").val(response.slug);
                }
            });
        });
    </script>

@endpush
