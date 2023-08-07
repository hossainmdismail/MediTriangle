@extends('backend.config.app')

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <img src="../assets/images/logo-dark.png" height="22" class="mx-auto d-block" alt="">
                <div class="card login-page shadow mt-4 rounded border-0">
                    <div class="card-body">
                    {{-- Lots of work need to do here --}}
                        @if (session('error'))
                            {{ session('error') }}
                        @endif
                        <h4 class="text-center">Add User</h4>
                        <form action="{{ route('register') }}" method="POST" class="login-form mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First Name" name="name" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required="">
                                    </div>
                                </div>

                                <div class="col-md-12 my-3 " style="text-align: right">
                                    <a href="{{ route('role.link') }}">Manage User</a>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!---->
            </div> <!--end col-->
        </div><!--end row-->
    </div>
</div>
@endsection
