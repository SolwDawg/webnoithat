@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit category</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Category</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $category->name }}"
                                       aria-describedby="defaultFormControlHelp" name="name">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" value="{{ $category->slug }}"
                                       aria-describedby="defaultFormControlHelp" name="slug">
                                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea id="description" class="form-control"
                                      name="description">{{ $category->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row mb-4 align-items-end-center">
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-check col-md-6 align-self-center">
                                <input class="form-check-input" type="checkbox" id="status"
                                       name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="defaultCheck1"> Status </label>
                            </div>
                            <div class="text-center mt-3">
                                <img class="py-3" src="{{ asset($category->image) }}"
                                     width="600px" alt="{{ $category->name }}"/>
                            </div>
                        </div>

                        <hr class="m-1">

                        <h2 class="my-4 text-center">SEO Tags</h2>

                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Meta title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                   aria-describedby="defaultFormControlHelp" value="{{ $category->meta_title }}">
                            @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Meta Keyword</label>
                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                   aria-describedby="defaultFormControlHelp" value="{{ $category->meta_keyword }}">
                            @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="meta_description">Meta Description</label>
                            <textarea id="meta_description" class="form-control"
                                      name="meta_description">{{ $category->meta_description }}</textarea>
                            @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row text-center justify-content-center">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#name').change(function () {
            $("button[type='submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route("admin.category.slug") }}',
                type: 'get',
                data: {name: $(this).val()},
                dataType: 'json',
                success: function (response) {
                    $("button[type='submit]").prop('disabled', false);
                    $("#slug").val(response.slug);
                }
            });
        });
    </script>
@endsection
