@extends('frontend.config.app')
@section('style')
<style>
    .pay-circle {
        width: 20px;
        height: 20px;
        margin-right: 8px;
        border-style: solid;
        border: 2px solid #d8dce7;
        border-radius: 50%;
        background: #d8dce7;
        box-shadow: inset 0px 0px 0px 5px white;
    }
    .pay-checkbox {
        display: flex;
        border: 1px solid #1272a2;
        border-radius:15px;
        background-color: #fcfcfd;
        padding: 33px 0 33px 30px;
        align-items: center;
        font-size: 15px;
        color:#1272a2;
        font-weight: 500;
        min-height: 100px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -ms-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }
    .pay-checkbox > img {
        padding: 0 8px 0 14px;
    }
    /* dollar */
    .dollarinp input[type="radio"] {
        display: none;
        &:not(:disabled) ~ label {
        cursor: pointer;
        }
        &:disabled ~ label {
        color: hsla(150, 5%, 75%, 1);
        border-color: hsla(150, 5%, 75%, 1);
        box-shadow: none;
        cursor: not-allowed;
        }
    }
    input[type="radio"]:checked + label {
        background: radial-gradient(#60babe70,1px, transparent);
        border: 2.5px solid #60babe;
        color:#1475A5;
        transition: 0.1s ease-in-out ;
        box-shadow: ;
        &::after {
        color: hsla(215, 5%, 25%, 1);
        font-family: FontAwesome;
        border: 2px solid hsla(150, 75%, 45%, 1);
        content: "\f00c";
        font-size: 24px;
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        height: 50px;
        width: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
        background: white;
        box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
        }
    }
    .dollarinp label {
        cursor: pointer;
    }
    .dollarinp label {
        height: 100%;
        display: block;
        background: white;
        border-radius: 20px;
        padding: 1rem;
        margin-bottom: 1rem;
        //margin: 1rem;
        text-align: center;
        box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
        position: relative;
        transition: 1s ease-in ;
    }
    .dollarinp .d {
        margin: 10px 0px;
    transform: translate();
    }
    .cstm-fileinput {
        position: absolute;
        left: -9999999px;
        opacity: 0;
    }
    /* #blocks_show {
        display: none;
    }
    .patient {
        display: none;
    }
    .passport {
        display: none;
    } */
</style>
@endsection
@section('content')

@php
    $date = date('Y-m-d');
@endphp
<!-- Appointment Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <div class="bg-light text-center rounded p-4">
                    <h1 class="mb-5">Video Consultation</h1>
                    <hr>
                    <form action="{{ route('video.consultant.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mt-3" id="blocks_show">

                            {{-- Country --}}
                            <div class="col-12">
                                <div class="row my-4 text-start">
                                    <div class="col-12 col-sm-4">
                                        <img class="w-100" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" alt="" srcset="">
                                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                    </div>
                                    <div class="col-12 col-sm-8">
                                        <h5>{{ $doctor->name }}</h5>
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td class="text-dark">Department </td>
                                                <td class="w-100">{{ $doctor->con_department->department }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Hospital</td>
                                                <td class="w-100">{{ $doctor->con_hospital->hospital }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Fee</td>
                                                <td class="w-100">{{ number_format($doctor->fee) }} ৳</td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Vat</td>
                                                <td class="w-100">{{ number_format($doctor->vat) }} %</td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Total</td>
                                                <th class="w-100 text-primary">{{ number_format( $doctor->fee+(($doctor->vat/100)*$doctor->fee)) }} ৳</th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <input type="text" name="name" class="form-control bg-white border-0 @error('name') is-invalid @enderror nameblock" placeholder="Name" value="{{ old('name') }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <input type="text" name="number" class="form-control bg-white border-0 @error('number') is-invalid @enderror number" placeholder="Whatsapp Number" value="{{ old('number') }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <select class="form-select bg-white border-0 @error('gender') is-invalid @enderror" name="gender">
                                    <option value="" selected>Gender</option>
                                    <option value="Male" @if('Male' == old('gender'))  selected @endif>Male</option>
                                    <option value="Female" @if('Female' == old('gender'))  selected @endif>Female</option>
                                    <option value="Others" @if('Others' == old('gender'))  selected @endif>Others</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <input type="number" name="age" class="form-control bg-white border-0 @error('age') is-invalid @enderror age" placeholder="Age" value="{{ old('age') }}">
                            </div>

                            {{-- Appoinment Date --}}
                            <div class="col-12 text-start">
                                <label for="" class="py-2">Request a date</label>
                                <input type="date" name="request_date" id="datepicker" class="form-control bg-white border-0 @error('request_date') is-invalid @enderror" min="{{ $date }}" value="{{ old('request_date') }}">
                                <span class="  fw-lighter  text-danger ms-2 mt-2">Doctor Video Consultation Is Subject To Doctor Availability</span>
                            </div>


                            {{-- File --}}
                            <div class="col-12 mb-3 text-start">
                                <label for="" class="p-2">Report / Prescription <span style="color: #f9a7a7; font-size:10px; " >(PDF ONLY)</span></label>
                                <input type="file" name="report" class="form-control bg-white border-0 @error('report') is-invalid @enderror" value="{{ old('passport') }}">
                                @error('report')
                                    <span class="text-sm text-danger" > {{$message}} </span>
                                @enderror
                            </div>
                            {{-- Doctor --}}
                            <div class="col-12">
                                <textarea type="text" name="note" class="form-control bg-white border-0" placeholder="Note.." rows="3">{{ old('note') }}</textarea>
                            </div>

                            {{-- user info --}}
                            {{-- <div class="login-system">
                                @if (!Auth::user())
                                <div id="userinfo" class="mt-5">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button name="submit" value="0" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Registration</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button name="submit" value="1" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Login</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                            <div class="row mt-3">
                                                <div class="col-12 mb-3">
                                                    <input type="text" name="newNumber" class="form-control bg-white border-0 @error('number') is-invalid @enderror" value="{{ old('number') }}" placeholder="01XXXXXXXXX">

                                                </div>
                                                <div class="col-12 mb-3">
                                                    <input type="text" name="email" class="form-control bg-white border-0" value="{{ old('email') }}" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row mt-3 justify-content center">
                                                <div class="col-6">
                                                    <p><a href="{{ route('login') }}">Click here</a> If you already have an account!</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @else

                                @endif
                            </div> --}}
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Make An <span class="app_type">Appointment</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->
@endsection

@section('script')
<script>
    $('.inp').click(function () {
        $('#billings').css('display','block');
    });
    $('#plus').click(function () {
        let inputNew = $('.medi:last').clone(true);
        $(inputNew).insertAfter('.medi:last');
    });
</script>
{{-- Click --}}
<script>

</script>
@endsection

