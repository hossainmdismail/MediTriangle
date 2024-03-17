<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $owners = App\Models\OwnerModel::where('status', 1)
            ->take(1)
            ->first();
        $socials = App\Models\SocialMediaModel::where('status', 1)
            ->get()
            ->take(5);
    @endphp

{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
{!! JsonLd::generate() !!}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!} --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  Favicon   --}}
    <link href="{{ $owners == null ? '' : $owners->logo }}" rel="icon">

    {{--  Google Web Fonts  --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    {{--  Icon Font Stylesheet  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    {{--  Libraries Stylesheet   --}}
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    {{--  Customized Bootstrap Stylesheet  --}}
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    {{--  Template Stylesheet  --}}
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/70b22ffbec.js" crossorigin="anonymous"></script>
    @yield('style')
</head>

<body>
    {{--  Topbar Start   --}}
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        @if ($owners != null)
                            <a class="text-decoration-none text-body pe-3" href=""><i
                                    class="bi bi-telephone me-2"></i>{{$owners->number }}</a>
                            <span class="text-body">|</span>
                            <a class="text-decoration-none text-body px-3" href=""><i
                                    class="bi bi-envelope me-2"></i>{{ $owners->email }}</a>
                        @endif

                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        @forelse ($socials as $social)
                            <a class="text-body px-2" href="{{ $social->link }}" target="_blank">
                                <i class="{{ $social->icon }}"></i>
                            </a>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  Topbar End   --}}

    {{--  Navbar Start  --}}
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img class="brandlogo" src="{{ asset('frontend/brand.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('link.appoinment') }}" class="nav-item nav-link">Doctor Appointment</a>
                        {{-- <a href="{{ route('link.appoinment') }}" class="nav-item nav-link">Appointment</a> --}}
                        <a href="{{ route('video.consultant.link') }}" class="nav-item nav-link">Doctor Video Consultant</a>
                        <a href="{{ route('link.visa') }}" class="nav-item nav-link">Visa Services</a>
                        {{-- <a href="{{ route('link.medicine') }}" class="nav-item nav-link">Medicine</a> --}}
                        <a href="{{route('health.card')}}" class="nav-item nav-link">Health Card</a>
                        <a href="blog.html" class="nav-item nav-link">Blog</a>
                        {{-- <a href="price.html" class="nav-item nav-link">Contact Us</a> --}}
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Medicine</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                <a href="team.html" class="dropdown-item">The Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="appointment.html" class="dropdown-item">Appointment</a>
                                <a href="search.html" class="dropdown-item">Search</a>
                            </div>
                        </div> --}}
                        {{-- @if (Auth::user())
                            <a href="{{ route('profile') }}" class="nav-item nav-link"><i
                                    class="fa-solid fa-right-to-bracket"></i></a>

                            <a href="{{ route('profile') }}" class="nav-item nav-link"><i class="fa-solid fa-user"></i></a>
                        @else
                            <span class="nav-item nav-link d-flex justify-content-center align-items-center ml-2">
                                <a href="{{ route('login') }}"
                                    class="btn btn-sm display-6 font-weight-normal bg-primary text-white">Login |
                                    SignUp</a>
                            </span>
                        @endif --}}
                        <span class="nav-item nav-link d-flex justify-content-center align-items-center ml-2">
                            <a href="{{ route('contact') }}"
                                class="btn btn-sm display-6 font-weight-normal bg-primary text-white me-2">
                                Contact Us </a>
                            {{-- <a href="{{ route('login') }}"
                                class="btn btn-sm display-6 font-weight-normal bg-primary text-white">
                                About Us </a> --}}
                        </span>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    {{--  Navbar End  --}}
    {{--  Marge Application  --}}
    @yield('content')
    {{--  Marge Application  --}}
    {{--  Footer Start   --}}
    <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Get In Touch</h4>
                    <p class="mb-4">Access your Health Records from the comfort of your home while seamlessly
                        maintaining a record of your medical conditions.</p>
                    @if ($owners != null)
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>{{ $owners->address }}
                        </p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>{{ $owners->email }}</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>{{ $owners->number }}</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>{{ $owners->landline }}</p>
                    @endif
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{route('home')}}"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="{{route('aboutus')}}"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Meet The
                            Team</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Latest
                            Blog</a>
                        <a class="text-light" href="{{route('contact')}}"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4
                        class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Others</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{route('privacypolicy')}}"><i class="fa fa-angle-right me-2"></i>Privacy And Policies</a>
                        <a class="text-light mb-2" href="{{route('terms')}}"><i class="fa fa-angle-right me-2"></i>Terms And Conditions</a>
                        <a class="text-light mb-2" href="{{route('hctc')}}"><i class="fa fa-angle-right me-2"></i>Health Card Terms And Conditions</a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4
                        class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Follow Us</h4>
                    {{-- <h4
                        class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Newsletter</h4> --}}
                    {{-- <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form> --}}
                    {{-- <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6> --}}
                    <div class="d-flex">
                        @forelse ($socials as $social)
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2"
                                href="{{ $social->link }}" target="_blank">
                                <i class="{{ $social->icon }}"></i>
                            </a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="text-md-start mb-md-0  ">
                    <p class="d-inline first_element"><a class="text-primary"
                            href="#">{{ $owners != null ? $owners->name : '' }}</a> &copy; All Rights Reserved.
                    </p>
                    <p class="float-end synex">Developed By <a class="text-primary"
                            href="https://synexdigital.com/" target="blank">Synex Digital</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    {{--  Footer End   --}}


    {{--  Back to Top   --}}
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    {{--  JavaScript Libraries   --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{--  Template Javascript  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    @if (session('succ'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('succ') }}'
            })
        </script>
    @endif
    @if (session('err'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'warning',
                title: '{{ session('err') }}'
            })
        </script>
    @endif
    @yield('script')
</body>

</html>
