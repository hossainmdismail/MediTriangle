@extends('backend.config.app')
@section('content')
    <div class="container-fluid">
        <div class="layout-specing">
            <div class="row">
                <div class="col-md-8">
                    <div class="card border-0 shadow mt-4">
                        <div class="card-header"><h4>Role</h4></div>
                        <div class="card-body">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $key => $roles)

                                    <tr>
                                        <td><strong>{{ $key+1 }}</strong></td>
                                        <td>{{ $roles->name }}</td>
                                        <td>
                                            @foreach ($roles->getPermissionNames() as $permission)
                                            {{ $permission.' / ' }}
                                            @endforeach
                                        </td>
                                        @if (Auth::guard('admin_model')->user()->can('delete_options'))
                                        <td><a class="btn btn-sm btn-danger" href="{{ route('delete.role',$roles->id) }}">Delete</a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card border-0 shadow mt-4">
                        <div class="card-header"><h4>User Role</h4></div>
                        <div class="card-body">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">SL</th>
                                        <th>User</th>
                                        <th>Role</th>

                                            <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $key => $users)

                                    <tr>
                                        <td><strong>{{ $key+1 }}</strong></td>
                                        <td>{{ $users->name }}</td>
                                        <td>
                                            @forelse ($users->getRoleNames() as $permission)
                                            {{ $permission }}
                                            @empty
                                            Member
                                            @endforelse
                                        </td>
                                        @if (Auth::guard('admin_model')->user()->can('delete_options'))
                                            <td><a class="btn btn-sm btn-danger" href="{{ route('remove.role',$users->id) }}">Remove</a></td>
                                        @endif



                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4">
                    <div class="card border-0 shadow mt-4">
                        <div class="card-header"><h4>Add Permission</h4></div>
                        <div class="card-body">
                            <form action="{{ route('permission.store') }}" method="post">
                                @csrf
                                <div class="mt-3">
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card border-0 shadow mt-4">
                        <div class="card-header"><h4>Add Role</h4></div>
                        <div class="card-body">
                            <form action="{{ route('role.store') }}" method="post">
                                @csrf
                                <div class="mt-3">
                                    <input type="text" class="form-control" name="role_name" placeholder="Role Name">
                                </div>
                                <div class="form-group">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}
                                        </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card border-0 shadow mt-4">
                        <div class="card-header"><h4>Assign Role</h4></div>
                        <div class="card-body">
                            <form action="{{ route('assign.store') }}" method="post">
                                @csrf
                                <div class="mt-3">
                                    <select name="user_id" class="form-control" id="">
                                        <option value="">Select User</option>
                                        @foreach ($user as $users)
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <select name="role_id" class="form-control" id="">
                                        <option value="">Select Role</option>
                                        @foreach ($role as $roles)
                                        <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
