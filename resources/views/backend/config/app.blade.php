<!doctype html>
<html lang="en" dir="ltr">

<head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('brandicon1.png') }}">

        <!-- Css -->
        <link href="{{ asset('backend/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/remixicon/fonts/remixicon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/%40iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
        <!-- Style Css-->
        <link href="{{ asset('backend/css/style.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
        <script src="https://kit.fontawesome.com/70b22ffbec.js" crossorigin="anonymous"></script>

        @yield('style')
        <style>
            .icon{
                padding: 10px;
                font-size: 20px;
                border: 1px solid #e5e5e585;
                cursor: pointer;
                margin-bottom:5px;
            }
            #icon i{
                font-size: 40px;
            }
            #icon{
                text-align: center;
            }
        </style>
    </head>

    <body>
        <!-- Loader -->
        {{-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> --}}
        <!-- Loader -->

        @php
            $notificationsCount = App\Models\AppoinmentModel::where('notifications',0);

        @endphp

        <div class="page-wrapper doctris-theme toggled">
            <!-- sidebar-wrapper -->
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
                    <div class="sidebar-brand">
                        <a href="{{ route('admin.dashboard') }}">
                            <img src="../assets/images/logo-dark.png" height="22" class="logo-light-mode" alt="">
                            <img src="../assets/images/logo-light.png" height="22" class="logo-dark-mode" alt="">
                            <span class="sidebar-colored">
                                <img src="../assets/images/logo-light.png" height="22" alt="">
                            </span>
                        </a>
                    </div>

                    <ul class="sidebar-menu">
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house me-2 d-inline-block"></i> Dashboard</a></li>
                        <li><a href="{{ route('user.data.appointment') }}"><i class="fa-regular fa-calendar-check"></i></i> Appointment</a></li>
                        <li><a href="{{ route('user.data.visaInvitaion') }}"><i class="fa-brands fa-cc-visa"></i> Visa Invitation</a></li>
                        <li><a href="{{ route('user.data.videoInvitaion') }}"><i class="fa-solid fa-video"></i> Video Consultation</a></li>
                        <li><a href="{{ route('admin.medicine.link') }}"><i class="fa-solid fa-capsules"></i> Medicine</a></li>
                        <li><a href="{{ route('user.data.videoInvitaion') }}"><i class="fa-solid fa-address-card"></i> Card</a></li>

                        <li class="sidebar-dropdown">
                            <a href="javascript:void(0)"><i style="margin-right:10px" class="fa-solid fa-database"></i> DataBase <span style="margin-left:10px" class="badge bg-warning me-2 mt-2">important</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{ route('d.country') }}">Country</a> </li>
                                    <li><a href="{{ route('d.state') }}">State</a> </li>
                                    <li><a href="{{ route('d.hospital') }}">Hospital</a> </li>
                                    <li><a href="{{ route('d.department') }}">Department</a> </li>
                                    <li><a href="{{ route('embassy.index') }}">Embassy</a> </li>
                                    <li><a href="{{ route('visatype.index') }}">Passport Type</a> </li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li><a href="appointment.html"><i class="fa-solid fa-user-doctor"></i>Doctors</a></li> --}}

                        <li class="sidebar-dropdown">
                            <a href="javascript:void(0)"><i style="margin-right:10px" class="fa-solid fa-user-doctor"></i> Doctors</a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{ route('doctor.link') }}">Add Doctor</a></li>
                                    <li><a href="{{ route('doctor.manage') }}">Manage Doctor</a></li>

                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="javascript:void(0)"><i style="margin-right:10px" class="fa-solid fa-tv"></i>Owner </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{ route('owner.link') }}">Website Info</a></li>
                                    <li><a href="{{ route('d.social') }}">Social Media</a></li>
                                    <li><a href="{{ route('d.service') }}">Service</a></li>
                                    <li><a href="{{ route('d.about') }}">About</a></li>
                                    <li><a href="{{ route('d.banner') }}">Banner</a></li>
                                    {{-- <li><a href="error.html">404 !</a></li>
                                    <li><a href="thankyou.html">Thank you...!</a></li> --}}
                                </ul>
                            </div>
                        </li>

                        {{-- <li><a href="" target="_blank"><i class="uil uil-window me-2 d-inline-block"></i>Landing page</a></li> --}}
                    </ul>
                    <!-- sidebar-menu  -->
                </div>
                <!-- Sidebar Footer -->
                <ul class="sidebar-footer list-unstyled mb-0">
                    <li class="list-inline-item mb-0 ms-1">
                        <a href="#" class="btn btn-icon btn-pills btn-soft-primary">
                            <i class="fa-solid fa-arrows-turn-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- Sidebar Footer -->
            </nav>
            <!-- sidebar-wrapper  -->
            <!-- sidebar-wrapper  -->

            <!-- Start Page Content -->
            <main class="page-content bg-light">
                <div class="top-header">
                    <div class="header-bar d-flex justify-content-between border-bottom">
                        <div class="d-flex align-items-center">
                            <a href="#" class="logo-icon">
                                <img src="../assets/images/logo-icon.png" height="30" class="small" alt="">
                                <span class="big">
                                    <img src="../assets/images/logo-dark.png" height="22" class="logo-light-mode" alt="">
                                    <img src="../assets/images/logo-light.png" height="22" class="logo-dark-mode" alt="">
                                </span>
                            </a>
                            <a id="close-sidebar" class="btn btn-icon btn-pills btn-soft-primary ms-2" href="#">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                            <div class="search-bar p-0 d-none d-lg-block ms-2">
                                <div id="search" class="menu-search mb-0">
                                    <form role="search" method="get" id="searchform" class="searchform">
                                        <div>
                                            <input type="text" class="form-control border rounded-pill" name="s" id="s" placeholder="Search Keywords...">
                                            <input type="submit" id="searchsubmit" value="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0">
                            {{-- <li class="list-inline-item mb-0 ms-1">
                                <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <div class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="settings" class="fea icon-sm"></i></div>
                                </a>
                            </li> --}}

                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-icon btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail" class="fea icon-sm"></i></button>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $notificationsCount->count() + App\Models\MedicineBillings::where('status',0)->count() }}<span class="visually-hidden">unread mail</span></span>

                                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow rounded border-0 mt-3 px-2 py-2" data-simplebar style="height: 320px; width: 300px;">
                                        @if ($notificationsCount->where('appointment_type',1)->count() != 0)
                                            <a href="{{ route('user.data.appointment') }}" class="d-flex align-items-center justify-content-between py-2">
                                                <div class="d-inline-flex position-relative overflow-hidden">
                                                    <img src="{{ Avatar::create('Appointment') }}" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                                    <small class="text-dark mb-0 d-block text-truncat ms-3">New Appointment <b class="badge bg-soft-primary">{{ $notificationsCount->where('appointment_type',1)->count()}}</b> <br> <small class="text-primary fw-normal d-inline-block">{{ $notificationsCount->where('appointment_type',1)->orderBy('id', 'DESC')->first()->created_at->diffForHumans() }}</small></small>
                                                </div>
                                            </a>
                                        @endif

                                        @if (App\Models\AppoinmentModel::where('notifications',0)->where('appointment_type',2)->count() != 0)
                                            <a href="{{ route('user.data.videoInvitaion') }}" class="d-flex align-items-center justify-content-between py-2">
                                                <div class="d-inline-flex position-relative overflow-hidden">
                                                    <img src="{{ Avatar::create('Video Consultation') }}" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                                    <small class="text-dark mb-0 d-block text-truncat ms-3">Video Consultation <b class="badge bg-soft-primary">{{ App\Models\AppoinmentModel::where('notifications',0)->where('appointment_type',2)->count()}}</b> <br> <small class="text-primary fw-normal d-inline-block">{{ App\Models\AppoinmentModel::where('notifications',0)->where('appointment_type',2)->orderBy('id', 'DESC')->first()->created_at->diffForHumans() }}</small></small>
                                                </div>
                                            </a>
                                        @endif

                                        @if (App\Models\AppoinmentModel::where('notifications',0)->where('appointment_type',3)->count() != 0)
                                            <a href="{{ route('user.data.visaInvitaion') }}" class="d-flex align-items-center justify-content-between py-2">
                                                <div class="d-inline-flex position-relative overflow-hidden">
                                                    <img src="{{ Avatar::create('Visa Invitation') }}" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                                    <small class="text-dark mb-0 d-block text-truncat ms-3">Visa Invitation <b class="badge bg-soft-primary">{{ App\Models\AppoinmentModel::where('notifications',0)->where('appointment_type',3)->count()}}</b> <br> <small class="text-primary fw-normal d-inline-block">{{ App\Models\AppoinmentModel::where('notifications',0)->where('appointment_type',3)->orderBy('id', 'DESC')->first()->created_at->diffForHumans() }}</small></small>
                                                </div>
                                            </a>
                                        @endif

                                        @if (App\Models\MedicineBillings::where('status',0)->count() != 0)
                                            <a href="{{ route('admin.medicine.link') }}" class="d-flex align-items-center justify-content-between py-2">
                                                <div class="d-inline-flex position-relative overflow-hidden">
                                                    <img src="{{ Avatar::create('Visa Invitation') }}" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                                    <small class="text-dark mb-0 d-block text-truncat ms-3">Medicine <b class="badge bg-soft-primary">{{ App\Models\MedicineBillings::where('status',0)->count()}}</b> <br> <small class="text-primary fw-normal d-inline-block">{{ App\Models\MedicineBillings::where('status',0)->orderBy('id', 'DESC')->first()->created_at->diffForHumans() }}</small></small>
                                                </div>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item mb-0 ms-1">
                                <div class="dropdown dropdown-primary">
                                    <button type="button" class="btn btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('backend/images/doctors/01.jpg') }}" class="avatar avatar-ex-small rounded-circle" alt=""></button>
                                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                        <a class="dropdown-item d-flex align-items-center text-dark" href="profile.html">
                                            <img src="{{ asset('backend/images/doctors/01.jpg') }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <div class="flex-1 ms-2">
                                                <span class="d-block mb-1">Calvin Carlo</span>
                                                <small class="text-muted">Orthopedic</small>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-dark" href="index.html"><span class="mb-0 d-inline-block me-1"><i class="uil uil-dashboard align-middle h6"></i></span> Dashboard</a>
                                        <a class="dropdown-item text-dark" href="dr-profile.html"><span class="mb-0 d-inline-block me-1"><i class="uil uil-setting align-middle h6"></i></span> Profile Settings</a>
                                        <div class="dropdown-divider border-top"></div>
                                        <a class="dropdown-item text-dark" href="{{ route('admin.logout') }}"><span class="mb-0 d-inline-block me-1"><i class="uil uil-sign-out-alt align-middle h6"></i></span> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Modals Delete--}}
                <div class="modal fade" id="LoginForm" tabindex="-1" aria-labelledby="LoginForm-title" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded shadow border-0">
                            <div class="modal-header border-bottom">
                                <h5 class="modal-title" id="LoginForm-title">Are You Sure?</h5>
                                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-3 rounded box-shadow">
                                    <p class="text-muted mb-0">Do you really want to delete those records? This process cannot be undone</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">Close</button> --}}
                                <a href="" id="delete_confirm" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modals end --}}

                {{-- Modals Two --}}


                @yield('content')
                <!-- Footer Start -->
                <footer class="bg-footer-color shadow py-3">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-sm-start text-center">
                                    <p class="mb-0 text-muted"><script>document.write(new Date().getFullYear())</script> © MediTriangle. Designed By <a href="https://www.linkedin.com/in/md-ismail-hossain-911a96236" target="_blank" class="text-secondary">Khaalifa</a>.</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </footer><!--end footer-->
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
        <!-- page-wrapper -->

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end shadow border-0" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header p-4 border-bottom">
                <h5 id="offcanvasRightLabel" class="mb-0">
                    <img src="../assets/images/logo-dark.png" height="22" class="light-version" alt="">
                    <img src="../assets/images/logo-light.png" height="22" class="dark-version" alt="">
                </h5>
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="uil uil-times fs-4"></i></button>
            </div>
            <div class="offcanvas-body p-4 px-md-5">
                <div class="row">
                    <div class="col-12">
                        <!-- Style switcher -->
                        <div id="style-switcher">
                            <div>
                                <ul class="text-center style-switcher list-unstyled mb-0">
                                    <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light" onclick="setTheme('style-rtl')"><img src="../assets/images/layouts/light-dash-rtl.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light" onclick="setTheme('style')"><img src="../assets/images/layouts/light-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark" onclick="setTheme('style-dark-rtl')"><img src="../assets/images/layouts/dark-dash-rtl.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">RTL Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark" onclick="setTheme('style-dark')"><img src="../assets/images/layouts/dark-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">LTR Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4" onclick="setTheme('style-dark')"><img src="../assets/images/layouts/dark-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Dark Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4" onclick="setTheme('style')"><img src="../assets/images/layouts/light-dash.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Light Version</span></a></li>
                                    <li class="d-grid"><a href="https://shreethemes.in/doctris/layouts/landing/index.html" target="_blank" class="mt-4"><img src="../assets/images/layouts/landing-light.png" class="img-fluid rounded-md shadow-md d-block mx-auto" style="width: 240px;" alt=""><span class="text-dark fw-medium mt-3 d-block">Landing Page</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end Style switcher -->
                    </div><!--end col-->
                </div><!--end row-->
            </div>

            <div class="offcanvas-footer p-4 border-top text-center">
                <ul class="list-unstyled social-icon social mb-0">
                    <li class="list-inline-item mb-0"><a href="https://1.envato.market/doctris-template" target="_blank" class="rounded"><i class="uil uil-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.behance.net/shreethemes" target="_blank" class="rounded"><i class="uil uil-behance align-middle" title="behance"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://shreethemes.in/" target="_blank" class="rounded"><i class="uil uil-globe align-middle" title="website"></i></a></li>
                </ul><!--end icon-->
            </div>
        </div>
        <!-- Offcanvas End -->

        <!-- javascript -->
        <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('backend/js/admin-apexchart.init.js') }}"></script>
        <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>
        <!-- Main Js -->
        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/js/plugins.init.js') }}"></script>
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        {{-- Modals For View --}}
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
