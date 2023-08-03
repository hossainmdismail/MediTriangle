@extends('frontend.config.app')

@section('content')

    <!-- Search Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-4 mb-4">Video Consultant</h1>
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
                @foreach ($doctors as $doctor)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top pb-3 rounded" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" alt="Card image" style="width:100%">
                          <div class="d-flex justify-content-between">
                            <a href="#">
                                <h4 class="card-title">{{ $doctor->name }}</h4>
                            </a>
                            <p class="card-text text-primary font-weight-bold">{{ number_format($doctor->fee) }}৳</p>
                          </div>
                          <p class="card-text">{{ $doctor->con_department->department }}</p>
                          <p class="card-text text-dark"><i class="fa-solid fa-house-medical text-primary p-2"></i>{{ $doctor->con_hospital->hospital }}</p>
                          <a class="btn btn-outline-dark btn-sm mt-3" href="{{ route('video.consultant.take',$doctor->id) }}"><i class="fa-solid fa-video pe-2"></i>Take</a>
                        </div>
                      </div>
                </div>
                @endforeach
                <div class="col-12 text-center">
                    {{ $doctors->links('pagination::bootstrap-4') }}
                </div>

                @endif

                {{-- @if ($doctors != null)
                  @foreach ($doctors->take(5) as $doctor)
                    <div class="col-lg-6 team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-auto d-flex">
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

                @endif --}}



            </div>
        </div>
    </div>
    <!-- Search Result End -->

@endsection
