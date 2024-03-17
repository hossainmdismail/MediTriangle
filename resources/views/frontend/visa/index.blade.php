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

    .input-default {
        /* Your styles here */
    border-radius: 0 !important;  /* Example */
         /* Example */
    }
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
                    <h3 class="text-white">Visa Invitation Form</h3>
                </div>
                <form action="{{ route('store.visa') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class=" mb-4 ">
                            <label  class="form-label "> Name</label><span class="text-danger">*</span> <span style="color: #f9a7a7; font-size:10px; " >(According Passport)</span>
                            <input type="text" class="form-control input-default" name="name"   placeholder="" required>
                        </div>
                        <div class="row mb-3">
                            <div class=" col-6 mb-3 form-group ">
                                <label  class="form-label ">Email</label>
                                <input type="text" class="form-control input-default " name="email" placeholder="" >
                            </div>
                            <div class="col-6 mb-3 form-group">
                                <label  class="form-label form-label">Phone Number</label><span class="text-danger">*</span>
                                <input type="number" min="0" name="phone" class="form-control input-default "   placeholder="" required>
                            </div>

                        </div>
                        <div class=" mb-3 ">
                            <label  class="form-label "> Passport Copy</label><span class="text-danger">*</span>
                            <input type="file" class="form-control input-default" name="passport"   placeholder="" required>
                        </div>
                        <div class=" mb-4 ">
                            <label  class="form-label "> Medical Report</label><span class="text-danger">*</span > <span style="color: #f9a7a7; font-size:10px; ">(PDF ONLY)</span>
                            <input type="file" class="form-control input-default" name="prescription"   placeholder=""  multiple>
                            @error('prescription')
                                <span class="text-sm text-danger"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center ">
                            <h5 >If Anyone Attendant with you</h5>
                            <button type="button" class="btn btn-primary" id="plus">Add More</button>
                        </div>
                        <div class="row   g-3 medi mt-1">
                            <div class="col-4 ">
                                <label for="" class="form-label" > Attendant Name</label>
                                <input type="text" name="attendantName[]" class="form-control form-control bg-white input-default  inp @error('attendantName.*') is-invalid @enderror" placeholder="Name">
                            </div>
                            <div class="col-4 ">
                                <label for="" class="form-label" > Passport Number</label>
                                <input type="text" name="attendantPassportNumber[]" class="form-control input-default bg-white  @error('attendantPassportNumber.*') is-invalid @enderror" placeholder=" Number" >
                            </div>
                            <div class="col-4 ">
                                <label for="" class="form-label" > Passport Copy <span style="color: #f9a7a7; font-size:10px; ">(IMAGE ONLY)</span> </label>
                                <input  type="file"   name="attendantPassport[]" class="form-control bg-white input-default  @error('attendantPassport.*') is-invalid @enderror">
                            </div>

                        </div>
                        <div class="col-12 mt-4">
                            <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
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
                    <h1 class="mb-5">Visa Invitation Form</h1>
                    <hr>
                    <form action="{{ route('store.visa') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mt-3" id="blocks_show">
                            <input type="hidden" name="appointment_type" value="2" id="">


                             <div class="col-sm-12 col-lg-6">
                                <select class="form-select bg-white border-0 country @error('country_id') is-invalid @enderror" name="country_id">
                                    <option value="" selected>Choose Country</option>
                                    @foreach (App\Models\CountryModel::where('status', 1)->get() as $country)
                                    <option value="{{ $country->id }}" @if($country->id == old('country_id'))  selected @endif>{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>
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
                                <input type="date" name="request_date" id="datepicker" class="form-control bg-white border-0 @error('request_date') is-invalid @enderror" min="{{ $date }}" value="{{ old('request_date') }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <input type="text" name="name" class="form-control bg-white border-0 @error('name') is-invalid @enderror nameblock" placeholder="Name" value="{{ old('name') }}">
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <input type="text" name="number" class="form-control bg-white border-0 @error('number') is-invalid @enderror number" placeholder="Phone Number" value="{{ old('number') }}">
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <input type="text" name="email" class="form-control bg-white border-0 @error('email') is-invalid @enderror email" placeholder="example@gmail.com" value="{{ old('email') }}">
                            </div>



                            <div class="col-sm-12 col-lg-6">
                                <select class="form-select bg-white border-0 @error('visaType') is-invalid @enderror" name="visaType">
                                    <option value="" selected>Visa Type</option>
                                    @foreach (App\Models\VisaType::where('status', 1)->get() as $visaType)
                                    <option value="{{ $visaType->id }}" @if($visaType->id == old('visaType'))  selected @endif>{{ $visaType->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <select class="form-select bg-white border-0 @error('embassy') is-invalid @enderror" name="embassy">
                                    <option value="" selected>Embassy</option>
                                    @foreach (App\Models\Embassy::where('status', 1)->get() as $embassy)
                                    <option value="{{ $embassy->id }}" @if($embassy->id == old('embassy'))  selected @endif>{{ $embassy->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-12 mb-3 text-start">
                                <label for="" class="p-2">Passport Photo</label>
                                <input type="file" name="passport" class="form-control bg-white border-0 @error('passport') is-invalid @enderror" value="{{ old('passport') }}">
                            </div>

                            <div class="col-12 mb-3 text-start">
                                <label for="" class="p-2">Prescription</label>
                                <input type="file" name="prescription[]" class="form-control bg-white border-0 @error('prescription') is-invalid @enderror" value="{{ old('prescription') }}" multiple>
                            </div>


                            <div class="col-12">
                                <textarea type="text" name="note" class="form-control bg-white border-0" placeholder="Note.." rows="3">{{ old('note') }}</textarea>
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
                                                    <input type="text" name="newEmail" class="form-control bg-white border-0" value="{{ old('email') }}" placeholder="Email">
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
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
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
    $('.inp').click(function () {
        $('#billings').css('display','block');
    });
    $('#plus').click(function () {
        let inputNew = $('.medi:last').clone(true);
        $(inputNew).insertAfter('.medi:last');
    });
</script>


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
            }
        })
    });
</script>
@endsection

