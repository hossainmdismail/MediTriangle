
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
        @yield('blank')
        <!-- Main Js -->
        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/js/plugins.init.js') }}"></script>
        <script src="{{ asset('backend/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
