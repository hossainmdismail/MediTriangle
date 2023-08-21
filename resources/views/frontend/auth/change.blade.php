@extends('frontend.config.app')

@section('content')
    <div class="container my-5">
        <div class="row my-5">
            <div class="col-md-6 m-auto my-5 ">
                <div class="card my-5">
                    <div class="card-body">
                        <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Forgot Password</h5>
                        <form action="{{ route('profile.forget.pass.change.confirme') }}" method="post">
                            @csrf
                            <input type="hidden" name="email" value="{{ $data }}">
                            <div class="mb-3">
                                <input style="background-color: #1ab8ae0f !important;" type="text" name="password"
                                    class="form-control py-3 border-0 @error('password') is-invalid @enderror"
                                    placeholder="New Password">
                            </div>

                            <div class="mb-3">
                                <input style="background-color: #1ab8ae0f !important;" type="text" name="con_password"
                                    class="form-control py-3 border-0 @error('con_password') is-invalid @enderror"
                                    placeholder="Confirm Password">
                            </div>

                            <div class=" text-end">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
