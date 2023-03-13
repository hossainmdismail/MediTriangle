@extends('frontend.config.app')

@section('content')

    <!-- Search Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Find A Doctor</h5>
                <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
                <h5 class="fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
            </div>
            <form action="{{ route('doctor.find') }}" method="get">
            @csrf
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <select class="form-select border-primary w-5" name="department" style="height: 60px;">
                        <option selected>Department</option>
                        @foreach ($department as $departments)
                        <option value="{{ $departments->id }}">{{ $departments->department }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control border-primary w-50" placeholder="Keyword"> --}}
                    <button class="btn btn-dark border-0 w-25">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Search End -->


    <!-- Search Result Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                @if ($doctors != null)
                  @foreach ($doctors->take(5) as $doctor)
                    <div class="col-lg-6 team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3>{{ $doctor->name }}</h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4">{{ $doctor->con_department->department }}</h6>
                                    <p class="mb-2" style="border-bottom: 1px solid #1ab8ae33;"><i class="fa-solid fa-house-medical text-primary p-2"></i>{{ $doctor->con_hospital->hospital }}</p>
                                    <p class="mb-2" style="border-bottom: 1px solid #1ab8ae33;"><i class="fa-solid fa-stethoscope text-primary p-2"></i>{{ $doctor->career_title }}</p>
                                    <p class="m-0"><i class="fa-solid fa-book text-primary p-2"></i>{{ $doctor->speciality }}</p>
                                    <a class="btn btn-outline-dark btn-sm mt-3" href="{{ route('link.appoinment') }}">Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 text-center">
                    {{ $doctors->links('pagination::bootstrap-4') }}
                </div>

                @endif



            </div>
        </div>
    </div>
    <!-- Search Result End -->

@endsection
