@extends('frontend.config.app')

@section('content')
    @php
        $filter = empty($_GET)? null:$_GET['department'];
    @endphp
    <!-- Search Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-5 mt-5 mb-4">Doctor Video Consultant</h1>
            </div>
            <form action="{{ route('video.consultant.link') }}" method="get">
            @csrf
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <select class="form-select border-primary w-5" name="department" style="height: 60px;">
                        <option value=""disabled selected>Request For Doctor Video Consultation</option>
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
