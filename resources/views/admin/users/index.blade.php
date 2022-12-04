@extends('layouts.admin')

@section('content')

    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Users</h4>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="">Available User Information</h4>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add User</a>
            </div>
            <div class="card-body table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role == 'super-admin')
                                    <span class="badge bg-primary">Admin</span>
                                @elseif($user->role == 'user')
                                    <span class="badge bg-warning">User</span>
                                @elseif($user->role == 'manager')
                                    <span class="badge bg-success">Manager</span>
                                @else
                                    <span class="badge bg-secondary">None</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="btn btn-primary float-start m-1">Edit</a>
                                <form method="post" action="{{ route('admin.users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Are you sure, you want to delete this data?')"
                                            class="btn btn-danger m-1">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No User Available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex align-items-center flex-column px-4 pt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
