
<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from shreethemes.in/doctris/layouts/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jan 2023 07:51:27 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('brandicon1.png') }}">

        <!-- Css -->
        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/remixicon/fonts/remixicon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/%40iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        <link href="{{ asset('backend/css/style.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
{{--
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="index.html" class="btn btn-icon btn-primary"><i data-feather="home" class="icons"></i></a>
        </div> --}}

        <!-- Hero Start -->
        <section class="bg-home d-flex bg-light align-items-center" style="background: url('../assets/images/bg/bg-lines-one.png') center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <img src="../assets/images/logo-dark.png" height="22" class="mx-auto d-block" alt="">
                        <div class="card login-page shadow mt-4 rounded border-0">
                            <div class="card-body">
                                <h4 class="text-center">Register </h4>
                                <form action="{{ route('register2') }}" method="POST" class="login-form mt-4">
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

                                        {{-- <div class="col-md-12 my-3 " style="text-align: right">
                                            <a href="{{ route('role.link') }}">Manage User</a>
                                        </div> --}}

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
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- javascript -->
        <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>
        <!-- Main Js -->
        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/js/plugins.init.js') }}"></script>
        <script src="{{ asset('backend/js/app.js') }}"></script>

    </body>
</html>
