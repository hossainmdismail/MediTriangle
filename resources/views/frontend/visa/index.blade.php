@extends('frontend.config.app')
@section('content')
<!-- Appointment Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <div class="bg-light text-center rounded p-5">
                    <h1 class="mb-5">Visa Invitation</h1>
                    <hr>
                    <div class="mb-3">
                        <ul id="progressbar">
                            <li class="prog-bar active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Personal</strong></li>
                            <li id="payment"><strong>Payment</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                    </div>
                    <form action="{{ route('store.appoinment') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-white border-0 country @error('country_id') is-invalid @enderror" name="country_id" style="height: 55px;">
                                    <option value="" selected>Choose Country</option>
                                    @foreach (App\Models\CountryModel::where('status', 1)->get() as $country)
                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                    @endforeach

                                </select>
                            </div>
                            {{-- State --}}
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-white border-0 state @error('state_id') is-invalid @enderror" id="state" name="state_id" style="height: 55px;">
                                    <option value="{{old('state_id')}}" selected>{{old('state_id')}}---</option>
                                </select>
                            </div>
                            {{-- Hospital --}}
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-white border-0 hospital @error('hospital_id') is-invalid @enderror" id="hospital" name="hospital_id" style="height: 55px;">
                                    <option value="" selected>---</option>
                                </select>
                            </div>
                            {{-- Department --}}
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-white border-0 department @error('department_id') is-invalid @enderror" id="departmentVal" name="hospital_id" style="height: 55px;">
                                    <option value="" selected>---</option>
                                </select>
                            </div>
                            {{-- Doctor --}}
                            <div class="col-12">
                                <select class="form-select bg-white border-0 @error('department_id') is-invalid @enderror" id="doctors" name="doctor_id" style="height: 55px;">
                                    <option value="" selected>---</option>
                                </select>
                            </div>
                            {{-- Doctor --}}
                            <div class="col-12">
                                <textarea type="text" name="note" class="form-control bg-white border-0" placeholder="Note.." rows="5"></textarea>
                            </div>
                            {{-- user info --}}
                            {{-- <div id="userinfo" class="mt-5">

                                <h4>Patient Details</h4>
                                <hr class="mt-3">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name" class="form-control bg-white border-0" placeholder="Patient Name" style="height: 55px">
                                    </div>

                                    <div class="col-12 col-sm-6 mb-3">
                                        <input type="number" name="number" class="form-control bg-white border-0" placeholder="Patient Number" style="height: 55px">
                                    </div>

                                    <div class="col-12 col-sm-6 mb-3">
                                        <input type="number" name="age" class="form-control bg-white border-0" placeholder="Patient Name" style="height: 55px">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Apply</button>
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
    var countryVal = '';
    console.log(countryVal);
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
                countryVal = data;
            }
        })
    });

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
</script>
@endsection

