@extends('frontend.config.app')

@section('content')
<div class="container my-5">
    <div class="row my-5">
        <div class="col-md-6 m-auto my-5 ">
            <div class="card my-5">
                <div class="card-body">
                    <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Forgot Password</h5>
                    <form action="{{ route('profile.forget.pass.checkup') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input style="background-color: #1ab8ae0f !important;" type="text" name="email" class="form-control py-3 border-0 @error('email') is-invalid @enderror" placeholder="Email">
                    </div>

                    <div class=" text-end">
                        <button type="submit" class="btn btn-primary">Sent</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
