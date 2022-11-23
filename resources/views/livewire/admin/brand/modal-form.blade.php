<!-- Modals -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel1">Add brands</h3>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" name="" required id="" class="form-control">
                            <option value="">--Select Category--</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Brand Name</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name"
                                   wire:model.defer="name"/>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col mb-3">
                            <label for="slug" class="form-label">Brand Slug</label>
                            <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Name"
                                  wire:change.prevent="getSlug" wire:model.defer="slug"/>
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="status" wire:model.defer="status"
                               name="status"> Checked=Hidden, Un-Checked=Visible
                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Brands Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel1">Update brands</h3>
                <button
                    type="button"
                    class="btn-close"
                    wire:click="closeModal"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>

                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label>Select Category</label>
                                <select wire:model.defer="category_id" name="" required id="" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Brand Name</label>
                                <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name"
                                       wire:model.defer="name"/>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Brand Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Name"
                                       wire:model.defer="slug"/>
                                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nameBasic" class="form-label">Status</label>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="status" wire:model.defer="status"
                                       name="status"> Checked=Hidden, Un-Checked=Visible
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Brands Update Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel1">Delete brands</h3>
                <button
                    type="button"
                    class="btn-close"
                    wire:click="closeModal"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>

                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h4>Are you sure want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

