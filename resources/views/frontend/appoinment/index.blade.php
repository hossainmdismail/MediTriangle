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
      /* Custom CSS for styling */
  .form-group-typ {
      position: relative;
    }
    .form-control-typ {
      border: none;
      border-bottom: 1px solid #ced4da; /* Add border only at the bottom */
      border-radius: 0; /* No rounded border */
      padding-top: 1.5rem; /* Add space for label */

    }
    .form-label-typ {
      position: absolute;
      top: 28%;
      left: 1rem;
      pointer-events: none;
      transition: all 0.2s;
      color: #6c757d;
    }
    .form-control-typ:focus,
    .form-control-typ:not(:placeholder-shown) {
      outline: none; /* Remove the blue focus border */
      box-shadow: none; /* Remove any box shadow */
    }
    .form-control-typ:focus ~ .form-label-typ,
    .form-control-typ:not(:placeholder-shown) ~ .form-label-typ {
      font-size: 0.75rem;
      top: -0.5rem;
      color: #198754;

    }



</style>


@endsection
@section('content')


 <div class="container mt-5 py-5">
    <div class="row ">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header " style="background-color: #1d2a4d;">
                    <h3 class="text-white">Doctor Appointment</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.appoinment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row my-4">
                            <div class="col-md-6 mb-4">

                                <select class="form-select border-bottom  bg-white border-0 country @error('country_id') is-invalid border-bottom border-danger @enderror" name="country_id"  >
                                    <option value="" selected >Country </option>

                                    @foreach (App\Models\CountryModel::where('status', 1)->get() as $country)
                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6">
                                <select class="form-select border-bottom bg-white border-0 state @error('state_id') is-invalid border-bottom border-danger @enderror" id="state" name="state_id">
                                    <option value="{{old('state_id')}}" selected>{{old('state_id')}}City</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4">
                                <select class="form-select border-bottom bg-white border-0 hospital @error('hospital_id') is-invalid border-bottom border-danger @enderror" id="hospital" name="hospital_id">
                                    <option value="" selected>Hospital</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select border-bottom bg-white border-0 department @error('department_id') is-invalid border-bottom border-danger @enderror" id="departmentVal" name="department_id">
                                    <option value="" selected>Deparment</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ @error('name') is-invalid border-bottom border-danger @enderror" name="name" placeholder=""  value="{{ old('name') }}">
                                <label  class="form-label form-label-typ">Patient Name <span style="color: #f9a7a7; font-size:10px; " >(According Passport)</span> </label>
                            </div>
                        </div>
                        <div class="row mb-4">


                            <div class="col-md-6 mb-3 form-group form-group-typ">
                                <input type="text" name="phone" class="form-control form-control-typ @error('phone') is-invalid border-bottom border-danger @enderror"  placeholder=""  value="{{ old('phone') }}" >
                                <label  class="form-label form-label-typ">Phone Number</label>
                                @error('phone')
                                    <span class="text tex-sm text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class=" col-md-6 mb-3 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ @error('email') is-invalid border-bottom border-danger @enderror" name="email" placeholder="" value="{{ old('email') }}">
                                <label  class="form-label form-label-typ">Email <span style="color: #f9a7a7; font-size:10px; " >(Optional)</span></label>
                                @error('email')
                                <span class="text tex-sm text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Make An <span class="app_type">Appointment</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @php
    $date = date('Y-m-d');
@endphp --}}
<!-- Appointment Start -->
{{-- <div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <div class="bg-light text-center rounded p-5">
                    <h1 class="mb-5">Doctor <span class="app_type">Appointment</span></h1>
                    <hr>
                    <form action="{{ route('store.appoinment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mt-3" id="blocks_show">
                            <input type="hidden" name="appointment_type" value="1" id="">
                            <div class="col-12">
                                <select class="form-select bg-white border-0 country @error('country_id') is-invalid @enderror" name="country_id">
                                    <option value="" selected>Choose Country</option>
                                    @foreach (App\Models\CountryModel::where('status', 1)->get() as $country)
                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-12">
                                <select class="form-select bg-white border-0 state @error('state_id') is-invalid @enderror" id="state" name="state_id">
                                    <option value="{{old('state_id')}}" selected>{{old('state_id')}}State</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <select class="form-select bg-white border-0 hospital @error('hospital_id') is-invalid @enderror" id="hospital" name="hospital_id">
                                    <option value="" selected>Hospital</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <select class="form-select bg-white border-0 department @error('department_id') is-invalid @enderror" id="departmentVal" name="department_id">
                                    <option value="" selected>Deparment</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <select class="form-select bg-white border-0 doctor @error('doctor_id') is-invalid @enderror" id="doctors" name="doctor_id">
                                    <option value="" selected>Doctor</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless" id="doctor_info" style="margin-bottom: 0;border: 1px solid #19bdb2;">
                                </table>
                            </div>

                            <div class="col-12 text-start">
                                <label for="" class="py-2">Request a date</label>
                                <input type="date" name="appoinment_date" id="datepicker" class="form-control bg-white border-0 @error('appoinment_date') is-invalid @enderror" min="{{ $date }}">
                            </div>

                            <div class="col-12 ">
                                <input type="number" name="number" class="form-control bg-white border-0 @error('number') is-invalid @enderror nameblock" placeholder="Phone Number">
                            </div>

                            <div class="col-12 ">
                                <input type="text" name="passportname" class="form-control bg-white border-0 @error('passportname') is-invalid @enderror passportname" placeholder="Passport Name">
                            </div>
                            <div class="col-12">
                                <input type="text" name="passportnumber" class="form-control bg-white border-0 @error('passportnumber') is-invalid @enderror passportnumber" placeholder="Passport Number">
                            </div>


                            <div class="col-12">
                                <div class="col-12">
                                    <select class="form-select bg-white border-0 @error('gender') is-invalid @enderror" id="doctors" name="gender">
                                        <option value="" selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="number" name="age" class="form-control bg-white border-0 @error('age') is-invalid @enderror" placeholder="Age" min="1" max="120">
                            </div>

                            <div class="col-12 mb-3 text-start">
                                <label for="" class="p-2">Passport</label>
                                <input type="file" name="passport" class="form-control bg-white border-0 @error('passport') is-invalid @enderror">
                            </div>

                            <div class="col-12 mb-3 text-start">
                                <label for="" class="p-2">Report</label>
                                <input type="file" name="report[]" class="form-control bg-white border-0 @error('report') is-invalid @enderror" multiple>
                            </div>

                            <div class="col-12">
                                <textarea type="text" name="note" class="form-control bg-white border-0" placeholder="Note.." rows="3"></textarea>
                            </div>

                            <hr class="mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>If Anyone Attendant with you</h5>
                                <button type="button" class="btn btn-primary" id="plus">Add More</button>
                            </div>
                            <div class="row text-left border border-primary py-2 align-items-center mt-4">
                                <div class="col-12 col-sm-4">
                                    Attendant Name
                                </div>
                                <div class="col-12 col-sm-4">
                                    Passport Number
                                </div>
                                <div class="col-12 col-sm-4">
                                    Passport Photo
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between align-items-center g-3 medi">
                                <div class="col-12 col-sm-4">
                                    <input type="text" name="attendantName[]" class="form-control bg-white border-0 inp @error('attendantName') is-invalid @enderror" placeholder="Attendant Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <input type="text" name="attendantPassportNumber[]" class="form-control bg-white border-0 @error('attendantPassportNumber') is-invalid @enderror" placeholder="Passport Number" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <input type="file" name="attendantPassport[]" class="form-control bg-white border-0 @error('attendantPassport') is-invalid @enderror">
                                </div>
                            </div>

                             <div class="login-system">
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
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Make An <span class="app_type">Appointment</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Appointment End -->
@endsection

@section('script')

<script>
    $(document).on('click', '.inp', function () {
        $('#billings').css('display', 'block');
    });

    $(document).on('click', '#plus', function () {
        let inputNew = $('.medi:last').clone(true);
        inputNew.find('input').val('');
        inputNew.find('.del').remove(); // Remove existing delete button
        inputNew.append('<button class="del btn btn-danger btn-sm">Delete</button>'); // Append new delete button
        inputNew.insertAfter('.medi:last');
    });

    $(document).on('click', '.del', function () {
        $(this).parent('.medi').remove();
    });
</script>
{{-- Click --}}
<script>
    $('.payment').click(function(){
        $('#blocks_show').css('display','block');

        var chekced = $(this).val();
        if (chekced == 1 ) {
            $('.app_type').text('Appointment');
            $('.passportname').val('').attr('placeholder','Passport Name');
            $('.passportnumber').val('').attr('placeholder','Passport Number');
            $('.nameblock').css('display','block');
        }else if(chekced == 2){
            $('.app_type').text('Video Consultation');
            $('.passportname').val('').attr('placeholder','Patient Name');
            $('.passportnumber').val('').attr('placeholder','Whatsapp Number');
            $('.nameblock').css('display','none');
        }else{
            $('.app_type').text('Visa Invitaiton');
            $('.passportname').val('').attr('placeholder','Passport Name');
            $('.passportnumber').val('').attr('placeholder','Passport Number');
            $('.nameblock').css('display','block');
        }
        // if (chekced == 1 ) {
        //     $('.passport').css('display','block');
        //     $('.patient').css('display','none');
        // }else{
        //     $('.patient').css('display','block');
        //     $('.passport').css('display','none');
        // }
    });
</script>
{{-- Ajax --}}
<script>
    //Get State
    $('.country').change(function(){
        var country = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'{{ route('ajax.state') }}',
            data:{'country_id':country},
            success:function(data) {
                $('#state').html(data);
            }
        })
    });
    //Get Hospital
    $('.state').change(function(){
        var state = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'{{ route('ajax.department') }}',
            data:{'state_id':state},
            success:function(data) {
                $('#hospital').html(data);
            }
        })
    });
    //Get Department
    $('.hospital').change(function(){
        var hospital = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('ajax.hospital') }}',
            data:{'hospital_id':hospital},
            success:function(data) {
                $('#departmentVal').html(data);
            }
        })
    });
    //Get Doctor
    $('.department').change(function(){
        var department = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('ajax.doctor') }}',
            data:{'department_id':department},
            success:function(data) {
                $('#doctors').html(data);
            }
        })
    });
    //Get Doctor Information
    $('.doctor').change(function(){
        var doctor = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('ajax.doctor.info') }}',
            data:{'doctor_id':doctor},
            success:function(data) {
                $('#doctor_info').empty().append(data);
                console.log(data);
            }
        })
    });
</script>
@endsection

