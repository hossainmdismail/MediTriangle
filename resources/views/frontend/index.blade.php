@extends('frontend.config.app')

@section('content')

{{-- Banner --}}
<div style="background-image: url('{{ asset('uploads/banner/'.$banner->image) }}');" class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-8 text-center text-lg-start">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">{{ $banner->name }}</h5>
                <h1 class="display-1 text-white mb-md-4">{{ $banner->title }}</h1>
                <div class="pt-2">
                    <a href="{{ route('doctor.find') }}" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Find Doctor</a>
                    <a href="{{ route('link.appoinment') }}" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Banner End --}}
{{-- About Us --}}
<div class="container-fluid py-5">
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
</div>
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
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                    <h1 class="display-4">Make An Appointment For Your Family</h1>
                </div>
                <p class="text-white mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Book An Appointment</h1>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected="">Choose Department</option>
                                    <option value="1">Department 1</option>
                                    <option value="2">Department 2</option>
                                    <option value="3">Department 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected="">Select Doctor</option>
                                    <option value="1">Doctor 1</option>
                                    <option value="2">Doctor 2</option>
                                    <option value="3">Doctor 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Date" data-target="#date" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Time" data-target="#time" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Make An Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Appoinment End --}}
{{-- Health Card --}}
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Medical Packages</h5>
            <h1 class="display-4">Awesome Medical Programs</h1>
        </div>
        <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
            <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="{{ asset('frontend/img/price-1.jpg') }}" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">Pregnancy Care</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>49<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Year</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Emergency Medical Treatment</p>
                    <p>Highly Experienced Doctors</p>
                    <p>Highest Success Rate</p>
                    <p>Telephone Service</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div>
            <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="{{ asset('frontend/img/price-2.jpg') }}" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">Health Checkup</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>99<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Year</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Emergency Medical Treatment</p>
                    <p>Highly Experienced Doctors</p>
                    <p>Highest Success Rate</p>
                    <p>Telephone Service</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div>
            <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="{{ asset('frontend/img/price-3.jpg') }}" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">Dental Care</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>149<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Year</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Emergency Medical Treatment</p>
                    <p>Highly Experienced Doctors</p>
                    <p>Highest Success Rate</p>
                    <p>Telephone Service</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div>
            <div class="bg-light rounded text-center">
                <div class="position-relative">
                    <img class="img-fluid rounded-top" src="{{ asset('frontend/img/price-4.jpg') }}" alt="">
                    <div class="position-absolute w-100 h-100 top-50 start-50 translate-middle rounded-top d-flex flex-column align-items-center justify-content-center" style="background: rgba(29, 42, 77, .8);">
                        <h3 class="text-white">Operation & Surgery</h3>
                        <h1 class="display-4 text-white mb-0">
                            <small class="align-top fw-normal" style="font-size: 22px; line-height: 45px;">$</small>199<small class="align-bottom fw-normal" style="font-size: 16px; line-height: 40px;">/ Year</small>
                        </h1>
                    </div>
                </div>
                <div class="text-center py-5">
                    <p>Emergency Medical Treatment</p>
                    <p>Highly Experienced Doctors</p>
                    <p>Highest Success Rate</p>
                    <p>Telephone Service</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Health Card End --}}
<!-- Team Start -->
<div class="container-fluid py-5">z
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
            <h1 class="display-4">Qualified Healthcare Professionals</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative">
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
<!-- Team End -->
<!-- Search Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
            <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
            <h5 class="text-white fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
        </div>
        <form action="{{ route('doctor.find') }}" method="get">
            @csrf
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <select class="form-select border-primary w-75" name="department" style="height: 60px;">
                        <option value="0" selected>Department</option>
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
<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
            <h1 class="display-4">Our Latest Medical Blog Posts</h1>
        </div>
        <div class="row g-5">
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('frontend/img/blog-1.jpg') }}" alt="">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo  diam</a>
                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                            rebum clita rebum dolor stet amet justo</p>
                    </div>
                    {{-- <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                            <small>John Doe</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('frontend/img/blog-2.jpg') }}" alt="">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo  diam</a>
                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                            rebum clita rebum dolor stet amet justo</p>
                    </div>
                    {{-- <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                            <small>John Doe</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="bg-light rounded overflow-hidden">
                    <img class="img-fluid w-100" src="{{ asset('frontend/img/blog-3.jpg') }}" alt="">
                    <div class="p-4">
                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo  diam</a>
                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                            rebum clita rebum dolor stet amet justo</p>
                    </div>
                    {{-- <div class="d-flex justify-content-between border-top p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                            <small>John Doe</small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                            <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
