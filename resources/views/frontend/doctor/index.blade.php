@extends('frontend.config.app')

@section('content')
    @php
        $filter = empty($_GET)? null:$_GET['department'];
    @endphp
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
                        <option value="">Department</option>
                        @foreach ($department as $departments)
                        <option value="{{ $departments->id }}" {{ $filter == $departments->id? 'selected':''}}>{{ $departments->department }}</option>
                        @endforeach
                    </select>
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
                @forelse ($doctors as $doctor)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <img class="card-img-top pb-3 rounded" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" alt="Card image" style="width:100%">
                            <h4 class="card-title">{{ $doctor->name }}</h4>
                            <p class="card-text text-primary">{{ $doctor->con_department->department }}</p>
                            <p class="card-text"><i class="fa-solid fa-house-medical text-primary p-2"></i>{{ $doctor->con_hospital->hospital }}</p>
                            <p class="card-text"><i class="fa-solid fa-stethoscope text-primary p-2"></i>{{ $doctor->career_title }}</p>
                            <a class="btn btn-outline-dark btn-sm mt-3" href="{{ route('link.appoinment') }}">Appointment</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12  text-center">
                        <i class="fa-solid fa-triangle-exclamation display-1 mb-4"></i>
                        <p class="text-secondary">No Data Found !</p>
                    </div>
                @endforelse
                <div class="col-12 text-center">
                    {{ $doctors->links('pagination::bootstrap-4') }}
                </div>

                @endif
            </div>
        </div>
    </div>

@endsection
