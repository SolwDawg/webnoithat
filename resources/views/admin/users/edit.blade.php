@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"/>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="text"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    readonly
                                    value="{{ $user->email }}"
                                    aria-describedby="basic-default-email2"
                                />
                                <span class="input-group-text" id="basic-default-email2">@gmail.com</span>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" id="password" value="{{ $user->password }}" name="password"/>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Select Role</label>
                            <select id="defaultSelect" class="form-select" name="role">
                                <option>Select Role</option>
                                <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $user->role == '2' ? 'selected' : '' }}>manager</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
