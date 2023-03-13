@extends('frontend.config.app')

@section('style')
    <style>
        .display {
            background-image: url(https://cdn.dribbble.com/userupload/4356547/file/original-291102d063a21bd3a3fdcd1ed2d8606a.gif);
            background-repeat: round;
            width: 100%;
            height: 50vh;
            background-repeat-y: no-repeat;
        }
    </style>
@endsection
@section('content')
<!-- Appointment Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <div class="bg-light text-center rounded p-5">
                    <h1 class="mb-5">Successfully Done</h1>
                    <hr>
                    <div class="mb-3 text-center">
                        <ul id="progressbar" style="display: flex;justify-content: center;">
                            <li class="prog-bar active" id="account"><strong>Book</strong></li>
                            <li class="prog-bar active" id="confirm"><strong>Finish</strong></li>
                        </ul>
                    </div>
                    <div class="info mt-3">
                        <div class="display">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->
@endsection

