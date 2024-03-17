@extends('frontend.config.app')

@section('content')

{{-- Banner --}}
<div class="owl-carousel team-carousel position-relative">
    @forelse ($banner as $banners)
    <div class="container ">
    <div  class=" mb-5 hero-header">
        <div>
            <img src="{{ asset('uploads/banner/'.$banners->image) }}" alt="">
        </div>
            <div class="row justify-content-start py-5">
                <div class="col-lg-8 text-center text-lg-start">
                    {{-- <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">{{ $banners->name }}</h5> --}}
                    {{-- <h1 class="display-1 text-white mb-md-4">{{ $banners->title }}</h1> --}}
                    {{-- <div class="pt-2">
                        <a href="{{ route('doctor.find') }}" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Find Doctor</a>
                        <a href="{{ route('link.appoinment') }}" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Appointment</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse


</div>

{{-- Banner End --}}

{{-- Buttons --}}
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="pt-2">
                        <a href="{{ route('doctor.find') }}" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Treatment</a>
                        <a href="{{ route('link.appoinment') }}" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Appointment</a>
                    </div>
            </div>
        </div>
    </div>
</div>
{{-- Health Card --}}

{{-- About Us --}}
{{-- <div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="{{ asset('uploads/about/'.$about->photo) }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                    <h1 class="display-4">{{ $about->title }}</h1>
                </div>
                <p>{{ $about->description }}</p>
                <div class="row g-3 pt-3">
                    @forelse ($services->take(3) as $service)
                    <div class="col-sm-3 col-6">
                        <div class="bg-light text-center rounded-circle py-4">
                            <i class="{{ $service->icon }} text-primary mb-3" style="font-size: 35px"></i>
                            <h6 class="mb-0">{{ explode(' ',$service->service)[0] }}<small class="d-block text-primary">{{ count(explode(' ',$service->service)) > 1?explode(' ',$service->service)[1]:'unknown' }}</small></h6>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- About Us End --}}
{{-- Our Service --}}
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
            <h1 class="display-4">Excellent Medical Services</h1>
        </div>
        <div class="row g-5">
            @forelse ($services->take(6) as $service)
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon mb-4">
                        <i class="{{ $service->icon }} text-white" style="font-size: 35px"></i>
                    </div>
                    <h4 class="mb-3">{{ $service->service }}</h4>
                    <p class="m-0">{{ $service->short_description }}</p>
                    {{-- <a class="btn btn-lg btn-primary rounded-pill" href="">
                        <i class="bi bi-arrow-right"></i>
                    </a> --}}
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
{{-- Oure Service End --}}
{{-- Appoinment --}}
<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Hospitals </h5>
            <h1 class="display-4">Our Hospitals In Bangladesh</h1>
        </div>
        <div class="owl-carousel hospital-carousel position-relative">
           @if (!$hospitalbd == null)
            @foreach($hospitalbd as $data)
                    <div class="col-lg-12 ">
                        <div class="card">
                            <img src="{{asset('uploads/hospitalimage.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h6 class="card-title">{{$data->con_state->state}}</h6>
                            <h3 class="text-center" > {{$data->hospital}} </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
           @endif


        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Hospitals </h5>
            <h1 class="display-4">Our Hospitals In Abroad</h1>
        </div>
        <div class="owl-carousel hospital-carousel position-relative">
            @if (!$hospitalind == null)
            @forelse($hospitalind as $data)
                <div class="col-lg-12 ">
                    <div class="card">
                        <img src="{{asset('uploads/hospitalimage.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h6 class="card-title">{{$data->con_state->state}}</h6>
                        <h3 class="text-center" > {{$data->hospital}} </h3>
                        </div>
                    </div>
                </div>
            @empty
                NOT DATA TO SHOW
            @endforelse
            @endif



        </div>
    </div>
</div>
<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
            <h1 class="display-4">Qualified Healthcare Professionals</h1>
        </div>
        <div class="owl-carousel doctor-carousel position-relative">
            @foreach ($doctors->take(5) as $doctor)
            <div class="team-item">
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
                        </div>
                        {{-- <div class="d-flex mt-auto border-top p-4">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
{{-- Health Card --}}
<div class="container-fluid py-5">
    <div class="container ">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Health Card</h5>
            <h1 class="display-4">Awesome Medical Programs</h1>
        </div>
        <div class=" col-lg-5 col-md-12 custom-p m-auto" style="padding: 0 45px 45px 45px;">
            @if ($healths )
            <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="{{ asset('frontend/img/price-1.jpg') }}" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">{{$healths->name}}</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">৳</small>{{$healths->price}}<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Year</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5 ">
                    @foreach(json_decode($healths->benifits) as $index => $benifit)
                        @if ($benifit !== null)
                            <p> {{$benifit}} </p>
                        @endif
                    @endforeach
                    <a href="{{route('health.card')}}" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div>
            @endif


        </div>
    </div>
</div>
{{-- Health Card End --}}
{{-- How we Work --}}
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">How We Work</h5>
            <h1 class="display-4">How We Work</h1>
        </div>
        <div class="image_block">
            <img src="{{ asset('website-template-preview-347911.jpg') }}" alt="" srcset="" style="width: 100%">
        </div>
        <div >
           <video class="w-100"
           autoplay
           muted
           loop
           playsinline
           >
           <source src="{{ asset('uploads/video/demo.mp4') }} " type="video/mp4">
        </video>
        </div>
    </div>
</div>
{{-- How we Work --}}



@endsection
@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>

@endsection
