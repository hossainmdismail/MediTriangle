@extends('frontend.config.app')

@section('content')
<div class="container my-5">
    <div class="row my-5">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('profile') }}" class="btn btn-primary w-100 my-2">Profile</a>
                    <a href="{{ route('profile.order') }}" class="btn btn-primary w-100 my-2">Order</a>
                    <form action="{{ route('logout') }}" method="post">
                    <button type="submit" class="btn btn-danger w-100 my-2">@csrf LogOut</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Profile</h5>
                    <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input style="background-color: #1ab8ae0f !important;" type="text" name="name" class="form-control py-3 border-0" value="{{ $data->name }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <input style="background-color: #1ab8ae0f !important;" type="text" name="number" class="form-control py-3 border-0" value="{{ $data->number }}" readonly>
                            </div>

                            <div class="col-12 mb-3">
                                <input style="background-color: #1ab8ae0f !important;" type="text" name="email" class="form-control py-3 border-0" value="{{ $data->email }}" readonly>
                            </div>

                            <div class="col-12 mb-3">
                                <input style="background-color: #1ab8ae0f !important;" type="text" name="address" class="form-control py-3 border-0" value="{{ $data->address }}" placeholder="Address">
                            </div>

                            <div class="col-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Password</h5>
                    <form action="{{ route('profile.password.reset') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input style="background-color: #1ab8ae0f !important;" type="password" name="old_password" class="form-control py-3 border-0 @error('old_password')is-invalid @enderror" placeholder="Old Password">
                                </div>

                                <div class="col-12 mb-3">
                                    <input style="background-color: #1ab8ae0f !important;" type="password" name="new_password" class="form-control py-3 border-0 @error('new_password')is-invalid @enderror" placeholder="New Password">
                                </div>

                                <div class="col-12 mb-3">
                                    <input style="background-color: #1ab8ae0f !important;" type="password" name="con_password" class="form-control py-3 border-0 @error('con_password')is-invalid @enderror" placeholder="Confirm Password">
                                </div>

                                <div class="col-12 mb-3">
                                    {{-- <a href="{{ route('profile.forget.pass') }}" style="color:#c5c5c5;font-size: 15px;">Forgot Password</a> --}}
                                </div>

                                <div class="col-12 mb-3 text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
