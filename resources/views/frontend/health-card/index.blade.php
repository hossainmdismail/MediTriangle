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
                        <li class="mb-1" style="list-style-type:inherit; ">Emergency Medical Treatment</li>
                        <li class="mb-1" style="list-style-type:inherit; ">Highly Experienced Doctors</li>
                        <li class="mb-1" style="list-style-type:inherit; ">Highest Success Rate</li>
                        <li class="mb-1" style="list-style-type:inherit; ">Telephone Service</li>
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
                    <form  method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ" class="name" placeholder="" required>
                                <label  class="form-label form-label-typ"> *Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="text" class="form-control form-control-typ" class="number" placeholder="" required>
                                <label  class="form-label form-label-typ"> *Phone Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <textarea type="text" class="form-control form-control-typ" class="address" placeholder="" required></textarea>
                                <label  class="form-label form-label-typ"> *Address     </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 mb-4 form-group form-group-typ">
                                <input type="number" class="form-control form-control-typ" class="address" placeholder="" required></input>
                                <label  class="form-label form-label-typ"> Passport/Nid Number</label>
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
