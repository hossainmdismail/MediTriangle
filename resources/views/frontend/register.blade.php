@extends('frontend.config.app')

@section('style')
    <style>

    /*======================
        404 page
    =======================*/


    .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
    }
    .page_404  img{ width:100%;}
    .four_zero_four_bg{
    background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height: 400px;
        background-position: center;
    }
    .four_zero_four_bg h1{
    font-size:80px;
    }
    .four_zero_four_bg h3{
                font-size:80px;
                }

                .link_404{
        color: #fff!important;
        padding: 10px 20px;
        background: #3CBDB2;
        margin: 20px 0;
        display: inline-block;}
        .contant_box_404{ margin-top:-50px;}
    </style>
@endsection
@section('content')
    <div class="container">
        @if (Auth::user())
        <section class="page_404">
            <div class="container">
                <div class="row">
                <div class="col-sm-12 mt-5">
                <div class="col-sm-10 col-sm-offset-1 m-auto  text-center">
                <div class="four_zero_four_bg">
                    <h1 class="text-center ">404</h1>
                </div>

                <div class="contant_box_404">
                <h3 class="h2">
                Look like you're lost
                </h3>

                <p>the page you are looking for not avaible!</p>

                <a href="{{ route('home') }}" class="link_404">Go to Home</a>
            </div>
                </div>
                </div>
                </div>
            </div>
        </section>
        @else
        <div class="row mt-5">
            <div class="col-md-6 mt-5 mb-5 m-auto">
                <div class="bg-light rounded p-5">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-white mb-4">Create Account</h4>
                    <form action="{{ route('user.access.register') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control bg-white border-0 @error('name') is-invalid @enderror" placeholder="Name" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" name="email" class="form-control bg-white border-0 @error('email') is-invalid @enderror" placeholder="example@yahoo.com" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="number" name="number" class="form-control bg-white border-0 @error('number') is-invalid @enderror" placeholder="01XXXXXXXXX" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="password" name="password" class="form-control bg-white border-0 @error('password') is-invalid @enderror" placeholder="Password" style="height: 55px;">
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                            <input type="checkbox" name="remember" id="remember" class="d-none form-check-input" checked>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
