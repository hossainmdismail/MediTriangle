@extends('frontend.config.app')
@section('style')
<style>
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

<div class="container-fluid">
    <div class="container mt-3 py-5">
       <div class="row justify-content-around">
        <div class="col-lg-4 mb-4 px-2   ">
            <div class="bg-light rounded ">
                <div class="position-relative">
                    <img class="img-fluid rounded-top w-100 shadow-sm " src="{{ asset('frontend/img/price-1.jpg') }}" alt="">
                </div>
                <div class=" py-4 shadow-sm border-bottom rounded-bottom">
                    <h3 class="ms-4 display-6 text-primary">Benifits</h3>
                    <ul class="mt-3 ms-4">
                        @if ($healths)
                        @foreach(json_decode($healths->benifits) as $index => $benifit)
                            @if ($benifit !== null)

                                <li class="mb-1" style="list-style-type:inherit; ">{{$benifit}} </li>
                            @endif
                        @endforeach
                        @endif

                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-6  ">
            <div class="card">
                <div class="card-header " style="background-color: #1d2a4d;">
                    <h3 class="text-white">Apply Now</h3>
                </div>
                <div class="card-body">
                    <form  action="{{route('health.card.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ @error('name') border-bottom border-danger  @enderror" name="name" placeholder="" value="{{ old('name') }}" >
                                <label  class="form-label form-label-typ"> Name<span class="text-danger">*</span></label>
                                @error('name')
                                <span class="text-sm text-danger" > {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ @error('number') border-bottom border-danger  @enderror"  name="number" placeholder="" value="{{ old('number') }}" >
                                <label  class="form-label form-label-typ "> Phone Number<span class="text-danger">*</span></label>
                                @error('number')
                                    <span class="text-sm text-danger" > {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <textarea type="text" class="form-control form-control-typ @error('address') border-bottom border-danger  @enderror" name="address" placeholder="" >{{ old('address') }}</textarea>
                                <label  class="form-label form-label-typ">  Address<span class="text-danger">*</span>     </label>
                                @error('address')
                                    <span class="text-sm text-danger" > {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ @error('pass_nid_number') border-bottom border-danger  @enderror" name="pass_nid_number" placeholder="" value="{{ old('pass_nid_number') }}"></input>
                                <label  class="form-label form-label-typ"> Passport/Nid Number</label>
                                @error('pass_nid_number')
                                    <span class="text-sm text-danger" > {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       </div>
        {{-- <div class="row ">
            <div class="col-lg-5  my-4 px-2 py-4   shadow-sm border-bottom rounded-3   ">
                <h3 class="ms-3 text-primary">Benifits</h3>
                <ul class="mt-4 ms-4">
                    <li class="mb-1" style="list-style-type:inherit; ">Emergency Medical Treatment</li>
                    <li class="mb-1" style="list-style-type:inherit; ">Highly Experienced Doctors</li>
                    <li class="mb-1" style="list-style-type:inherit; ">Highest Success Rate</li>
                    <li class="mb-1" style="list-style-type:inherit; ">Telephone Service</li>
                </ul>
            </div>
        </div> --}}
    </div>
</div>

@endsection
